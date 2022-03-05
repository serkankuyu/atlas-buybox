<?php

/**
 * 
 * @description Simple Dom HTML kütüphanesi
 * @website https://simplehtmldom.sourceforge.io/
 * 
 */
require 'classes/Curl.php';


/**
 * 
 * @description Location for Date() function
 *
 */

date_default_timezone_set('Europe/Istanbul');

/**
 * 
 * @description Türkçe karakterleri ingilizceye çeviriyoruz
 *
 */

function replace_tr($text) {
	$text = trim($text);
	$search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ');
	$replace = array('c','c','g','g','i','i','o','o','s','s','u','u','-');
	$new_text = str_replace($search,$replace,$text);
	return $new_text;
} 

/**
 * 
 * @description Hata bilgilendirme array
 *
 */

$out = array('error' => false);



/**
 * 
 * @description Listeden veri çekiyoruz
 *
 */

$json_string = file_get_contents("products.json");
$json        = json_decode($json_string, true);

foreach($json as $field){

	if(!empty($field['urlTY'])){

/**
 * 
 * @description URL kontrolü
 *
 */

$_url = $field['urlTY'];

$_url_explode = explode('https://www.', $_url);
$_x           = $_url_explode[1];

$_x_explode = explode('.com', $_x);
$_url_real  = trim($_x_explode[0]);

/**
 * 
 * @description URL
 *
 */

$_base_explode = explode("?", $_url);
$base          = $_base_explode[0];


if(!empty($base)){



	$agent = "Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0";

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($curl, CURLOPT_HEADER, 1);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_URL, $base);
	curl_setopt($curl, CURLOPT_REFERER, $base);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_USERAGENT, $agent);
	$str     = curl_exec($curl);
	$headers = curl_getinfo($curl);
	curl_close($curl);

    // Create a DOM object
	$html_base = new simple_html_dom();

    // Load HTML from a string
	$html_base->load($str);

	       // Product
	$result = $html_base->find('div.flex-container div.product-container',0);

	if(!empty($result)){

 // Product Name
		@$_product_name = $result->find('h1.pr-new-br',0)->plaintext;

    // Product Img
		@$_product_img  = $result->find('img', 0)->src;

        // First Price
		@$_product_first_price = $result->find('div.pr-bx-nm span.prc-org',0)->plaintext;
		$_explode_first_price = explode("TL", $_product_first_price);
		$_explode_f_price = $_explode_first_price[0];

		// Second Price
		@$_product_second_price = $result->find('div.pr-bx-nm span.prc-slg',0)->plaintext;
		$_explode_second_price = explode("TL", $_product_second_price);
		$_explode_s_price = $_explode_second_price[0];

		// Third Price
		@$_product_third_price = $result->find('div.pr-bx-pr-dsc span.prc-dsc', 0)->plaintext;
		$_explode_third_price = explode("TL", $_product_third_price);
		$_explode_t_price = $_explode_third_price[0];


        // Seller Store
		@$_seller_store = $result->find('div.merchant-box-wrapper',0)->plaintext;
		$_seller_explode = explode("Satıcı : ", $_seller_store );
		$_seller_store_name = $_seller_explode[1];





      // SKU
		$urlExplode = explode("-p-", $base);
		$sku        = $urlExplode[1];


        /**
		 * 
		 * 
		 * @description Fiyatı $price değişkenine atıyoruz
		 * 
		 */

        if(!empty(trim($_explode_t_price))){

        	$price_array = explode(".", $_explode_t_price);
        	$price       = $price_array[0].$price_array[1];

        }elseif(!empty(trim($_explode_s_price))){

        	$price_array = explode(".", $_explode_s_price);
        	$price       = $price_array[0].$price_array[1];

        }elseif(!empty(trim($_explode_f_price))){

        	$price_array = explode(".", $_explode_f_price);
        	$price       = $price_array[0].$price_array[1];

        }else{
        	$price = 0;
        }



        $_count_base = [$base];
        for( $i = 0; $i < count($_count_base); $i++ ){


        	$trendyol[] = array(

        		"seller"          => trim($_seller_store_name), 
        		"productName"     => trim($_product_name), 
        		"productSKU"      => $sku,
        		"productUrl"      => $base,
        		"productImg"      => trim($_product_img),
        		"productsID"      => $field['id'],
        		"TYPrice"         => $price,
        		"dataDate"        => date('d.m.Y H:i:s')
        	);

        }


        $json_veri = json_encode($trendyol, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK);
        file_put_contents('marketplace/trendyol.json', $json_veri);





        $html_base->clear(); 
        unset($html_base);

        sleep(0.30);


    }else{

/**
 * 
 * @description Hata Kayıt
 *
 */

if($headers['http_code'] != 200){
	echo 'hata var';
}


} # @desc : if koşulu ($result) son basamak



} # @desc : if koşulu ($base) son basamak




} # @desc : if son basamak
} # @desc : Foreach son basamak






$out['message'] = 'success';
header("Content-type: application/json");
echo json_encode($out);
die();

