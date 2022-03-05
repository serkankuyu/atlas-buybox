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

	if(!empty($field['urlHB'])){

/**
 * 
 * @description URL kontrolü
 *
 */

$_url = $field['urlHB'];

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

	 // One Data Get
	$result = $html_base->find('div.productDetailContent',0);

	if(!empty($result)){


    // Product Name
		@$_product_name = $result->find('h1.product-name',0)->plaintext;

	// Img
		@$_product_img = $result->find('div#productDetailsCarousel img.product-image', 0)->src;

    // First Price
		@$_product_first_price = $result->find('del.product-old-price',0)->plaintext;
    // Second Price 
		@$_product_second_price = $result->find('div.price-container span.price', 0)->plaintext;
    // Third Price 
		@$_product_third_price = $result->find('div.extra-discount-price', 0)->plaintext;
    // Seller Store
		@$_seller_store = $result->find('div.seller-container span.seller',0)->plaintext;
		@$_explode_one = explode("Satıcı:", $_seller_store);
		@$_seller_store_name = trim($_explode_one[1]);
    // Comment Review
		@$_comment_reviews = $result->find('div#comments-container', 0)->plaintext;
		
       // Discount Total
		/*@$_discount_rate = $result->find('span.extra-discount-size', 0)->plaintext;

		$_explode_discount = explode("%", $_discount_rate);
		$_dis_rate  = trim($_explode_discount[1]);*/



    // Reviews
		$_explode = explode(" ", $_comment_reviews);
		$_reviews = $_explode[40];

    // First Price Explode TL
		$_explode_price_first = explode(" ", $_product_first_price);
		$_price_first = $_explode_price_first[0];

    // Second Price Explode TL
		$_explode_price_second = explode(" ", $_product_second_price);
		$_price_second = $_explode_price_second[22] . $_explode_price_second[23];

    /* Third Price Explode TL
		$_explode_price_third = explode(" ", $_product_third_price);
		$_price_third = $_explode_price_third[22];*/


        // Tek fiyatın geçerli olduğu durumda
		if(!empty($_price_second))
		{
			$_this_price = $_price_second;
		}

         // İki fiyatın geçerli olduğu durumda
		if(!empty($_price_first))
		{
			$_this_price = $_price_second;

		}

        /* Üç fiyatın geçerli olduğu durumda
		if(!empty($_price_first) AND !empty($_price_second))
		{
			$_this_price = $_product_third_price;

		}*/

		$_explode_tr   = explode(".", $_this_price);
		$_this_price_2 = $_explode_tr[0].$_explode_tr[1];

		$_TL = explode("TL", $_this_price_2);


        // SKU
		$sku = "";
		$urlExplode  = explode("-p-", $base);
		$sku1        = $urlExplode[1];
		$skuExplode  = explode("?", $sku1);
		$sku         .= $skuExplode[0];


		$_count_base = [$base];
		for( $i = 0; $i < count($_count_base); $i++ ){


			$gittigidiyor[] = array(

				"seller"          => trim($_seller_store_name), 
				"productName"     => trim($_product_name), 
				"productSKU"      => $sku,
				"productUrl"      => $base,
				"productImg"      => trim($_product_img),
				"productsID"      => $field['id'],
				"HBPrice"         => $_TL[0],
				"dataDate"        => date('d.m.Y H:i:s')
			);


		}


		$json_veri = json_encode($gittigidiyor, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK);
		file_put_contents('marketplace/hepsiburada.json', $json_veri);

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
