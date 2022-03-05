<?php 

  /**
   * 
   * 
   * 
   * @description | Exceptions sınıfını dahil ediyoruz
   * @serkankuyu [serkan.kuyu@hotmail.com.tr]
   * @siyahklasor.com/magaza [Pazaryeri Mağaza Simülasyonu]
   * 
   *
   *
   */

  require_once 'classes/Exceptions.php';



  /**
   * 
   * 
   * 
   * @description | Json dosyasına yeni ürünler ekleniyor
   * @serkankuyu [serkan.kuyu@hotmail.com.tr]
   * @siyahklasor.com/magaza [Pazaryeri Mağaza Simülasyonu]
   * 
   *
   *
   */

  if(Circle::actions("action", "add")){

    $out = array('error' => false);

    $json_string = file_get_contents("products.json");
    $json        = json_decode($json_string, true);

    if(!empty(Input::get('id')) && !empty(Input::get('name'))){


      $json[] = array(

       "id"           => Input::get('id'), 
       "name"         => Input::get('name'), 
       "cost"         => Circle::change_point(Input::get('cost')),
       "urlHB"        => Circle::clear_url(Input::get('urlHB')),
       "commissionHB" => Circle::change_point(Input::get('commissionHB')),
       "cargoHB"      => Circle::change_point(Input::get('cargoHB')),
       "priceHB"      => Input::get('priceHB'),
       "urlTY"        => Circle::clear_url(Input::get('urlTY')),
       "commissionTY" => Circle::change_point(Input::get('commissionTY')),
       "cargoTY"      => Circle::change_point(Input::get('cargoTY')),
       "priceTY"      => Input::get('priceTY'),
       "urlGG"        => Circle::clear_url(Input::get('urlGG')),
       "commissionGG" => Circle::change_point(Input::get('commissionGG')),
       "cargoGG"      => Circle::change_point(Input::get('cargoGG')),
       "priceGG"      => Input::get('priceGG'),
       "status"       => 1,
     );



      $json_veri = json_encode($json, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK);
      file_put_contents('products.json', $json_veri);


      $out['error'] = true;
      $out['message'] = "success";

    }else{

      $out['error'] = 1;

    }





    header("Content-type: application/json");
    echo json_encode($out);
    die();


  }

