<?php 


class Circle{





/**
 * 
 * 
 * @description XML sayfalarını çekiyoruz
 * @note  Sınıf içerisinde simple_load_file fonksiyonu çalışmıyor
 * 
 *
 */

public static function getXML($xmlName){

	$simplexml_load_file = file_get_contents('xml/'.$xmlName.'.xml');
	$xmlDoc = new \SimpleXMLElement($simplexml_load_file);
	return $xmlDoc;

}


/**
 * 
 * 
 * @description GET metodu ile kontrol ediyoruz
 * 
 * 
 */

public static function actions($item, $data){

	$action = $_GET[$item];

	if(isset($action) && $action == $data){
		return true;
	}
}


/**
 * 
 * 
 * @description Pazaryeri URL adreslerini temizliyoruz
 * 
 * 
 */


public static function clear_url($url){

	$explode = explode("?", $url);
	return $explode[0];
}


/**
 * 
 * 
 * @description Virgülü nokta ile değiştiriyoruz
 * 
 * 
 */

public static function change_point($commission){

	if(strstr($commission, ",") == true){

		$point  = explode(",",$commission);
		$result = $point[0].'.'.$point[1];

	}else{

		$result = $commission;

	}


	return $result;

}


}


class Input{

	public static function exists($type = 'post'){

		switch($type) {

			case 'post':
			return (!empty($_POST)) ? true : false;
			break;

			case 'get':
			return (!empty($_GET)) ? true : false;
			break;
			default:

			return false;
			break;

		}
	}


	public static function get($item){

		if(isset($_POST[$item])){

			return $_POST[$item];

		}else if(isset($_GET[$item])){

			return $_GET[$item];
		}

		return '';
	}
}