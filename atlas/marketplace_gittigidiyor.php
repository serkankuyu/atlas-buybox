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

	if(!empty($field['urlGG'])){

/**
 * 
 * @description URL kontrolü
 *
 */

$_url = $field['urlGG'];

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



	$agent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.117 Safari/537.36";

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
	$result = $html_base->find('div.boxContent',0);

	if(!empty($result)){

    // Product Name
		@$_product_name = $result->find('h1.title',0)->plaintext;

		// Product Img
		@$_product_img = $result->find('div.img-cover img',0)->src;

        // First Price
		@$_product_first_price = $result->find('span#sp-price-highPrice',0)->plaintext;
		$_explode_first_price  = explode("TL", $_product_first_price);
		$_explode_f_price      = $_explode_first_price[0];


        // Third Price 
		@$_product_third_price = $result->find('div#sp-price-lowPrice', 0)->plaintext;
		$_explode_third_price  = explode("TL", $_product_third_price);
		$_explode_t_price      = $_explode_third_price[0];

       // Discount Price 
		@$_product_discount_price = $result->find('div#price div#sp-price-discountPrice', 0)->plaintext;
		$_explode_discount_price  = explode("TL", $_product_discount_price);
		$_explode_d_price    = $_explode_discount_price[0];		

        // Seller Store
		@$_seller_store = $result->find('li.member-name',0)->plaintext;
		$_sellet_explode = explode(" ", $_seller_store);
		$_seller_store_name = $_sellet_explode[54];




    // SKU
		$urlExplodeS = explode("_spp_", $base);
		$urlExplodeP = explode("_pdp_", $base);

		if(strpos($base, "_spp_") !== false){

			$sku   = $urlExplodeS[1];
			$sku == 'undefined' ? " " : $urlExplodeS[1];

		}elseif(strpos($base, "_pdp_") !== false){

			$sku   = $urlExplodeP[1];
			$sku == 'undefined' ? " " : $urlExplodeP[1];

		}else{
			$sku = "Bilinmiyor";
		}



        /**
		 * 
		 * 
		 * @description Fiyatı $price değişkenine atıyoruz
		 * 
		 */

        if(!empty(trim($_explode_d_price))){

        	$price_array = explode(".", $_explode_d_price);
        	$price       = $price_array[0].$price_array[1];

        }elseif(!empty(trim($_explode_f_price)) && !empty(trim($_explode_t_price))){

        	$price_array = explode(".", $_explode_t_price);
        	$price       = $price_array[0].$price_array[1];

        }else{

        	$price_array = explode(".", $_explode_f_price);
        	$price       = $price_array[0].$price_array[1];

        }


        $_count_base = [$base];
        for( $i = 0; $i < count($_count_base); $i++ ){

        	$gittigidiyor[] = array(

        		"seller"          => trim($_seller_store_name), 
        		"productName"     => trim($_product_name), 
        		"productSKU"      => $sku,
        		"productUrl"      => $base,
        		"productImg"      => trim($_product_img),
        		"productsID"      => $field['id'],
        		"GGPrice"         => $price,
        		"dataDate"        => date('d.m.Y H:i:s')
        	);


        }

        $json_veri = json_encode($gittigidiyor, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK);
        file_put_contents('marketplace/gittigidiyor.json', $json_veri);

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
