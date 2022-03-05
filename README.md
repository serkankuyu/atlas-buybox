# Başkangıç
Atlas - Buybox Takibi

Hepsiburada, Trendyol ve Gittigidiyor pazaryerlerinin buybox listesini kontrol etmektedir. 
Web tabanlı olan programda aşağıdaki özellikler yer almaktadır.

- Buybox takibi
- Buybox fiyat önerisi
- Buybox'a göre maliyet hesaplaması
- Hakediş hesaplama


# Dökümantasyon

Sistem gereksinimleri;
- PHP 7.0 ve üzeri
- Vuejs javascript framework
- Hosting veya localhost programları

Not : Sistemin çalışması için herhangi bir veritabanına ihtiyaç yoktur. xampp ve benzeri bir localhostunuzda bile rahatlıkla çalıştırabilirsiniz. 
  Öneri, istek sırasında "Timeout"a düşmeyecek bir localde çalıştırmalısınız.
  
 #### products.json
 Yeni bir ürün eklemek istediğinizde <code>products.json</code> dosyasına ekleme yapmanız gerekmektedir. Eklemeyi isterseniz <code>+</code> işaretine tıkladığında açılan pop-up'tan yapabilir ya da klasörün içerisine aşağıdaki örnekte olduğu gibi element yerleştirebilirsiniz.
 
 ```
     {
        "id": 963524,
        "name": "Philips Gc5037\/80 Azur Elite Buharlı Ütü GC5037\/80",
        "cost": 999,
        "urlHB": "https://www.hepsiburada.com/philips-gc5037-80-azur-elite-optimaltemp-teknolojili-buharli-utu-p-HBV0000080A6R",
        "commissionHB": 12.98,
        "cargoHB": 25.99,
        "priceHB": 1800,
        "urlTY": "https://www.trendyol.com/philips/gc5037-80-azur-elite-buharli-utu-p-994767",
        "commissionTY": 11.9,
        "cargoTY": 25,
        "priceTY": 1750,
        "urlGG": "https://www.gittigidiyor.com/elektrikli-ev-aletleri\/utu-utu-masasi/utu/philips-azur-elite-gc503780-siyah_spp_26650?id=689576046",
        "commissionGG": 11.5,
        "cargoGG": 35.5,
        "priceGG": 1999,
        "status": 1
    }
 ```
 
 <table>
  <trhead>
    <tr>
      <td>Parametre</td>
      <td>Tür</td>
      <td>Açıklama</td>
    </tr>
        
  </trhead>
    <trbody>
    <tr>
      <td>id</td>
      <td>string</td>
      <td>Ürünün sizdeki stok kodu<br><small>Biglilerin eşleşmesi için önemlidir</small></td>
    </tr>
     <tr>
      <td>name</td>
      <td>string</td>
      <td>Ürün adı</td>
    </tr>
     <tr>
      <td>cost</td>
      <td>int</td>
      <td>Maliyet</td>
    </tr>  
    <tr>
      <td>urlHB</td>
      <td>string</td>
      <td>Hepsiburada ürünün listelendiği url adresi</td>
    </tr>
    <tr>
      <td>commissionHB</td>
      <td>float</td>
      <td>Hepsiburada komisyon oranı</td>
    </tr>
     <tr>
      <td>cargoHB</td>
      <td>float</td>
      <td>Hepsiburada kargo fiyatı</td>
    </tr>
       <tr>
      <td>priceHB</td>
      <td>int</td>
      <td>Hepsiburada satış fiyatınız</td>
    </tr>    
       <tr>
      <td>urlTY</td>
      <td>string</td>
      <td>Trendyol ürünün listelendiği url adresi</td>
    </tr>
    <tr>
      <td>commissionTY</td>
      <td>float</td>
      <td>Trendyol komisyon oranı</td>
    </tr>
     <tr>
      <td>cargoTY</td>
      <td>float</td>
      <td>Trendyol kargo fiyatı</td>
    </tr> 
    <tr>
      <td>priceTY</td>
      <td>int</td>
      <td>Trendyol satış fiyatınız</td>
    </tr>
    <tr>
      <td>urlGG</td>
      <td>string</td>
      <td>Gittigidiyor ürünün listelendiği url adresi</td>
    </tr>
    <tr>
      <td>commissionGG</td>
      <td>float</td>
      <td>Gittigidiyor komisyon oranı</td>
    </tr>
     <tr>
      <td>cargoGG</td>
      <td>float</td>
      <td>Gittigidiyor kargo fiyatı</td>
    </tr> 
     <tr>
      <td>priceGG</td>
      <td>int</td>
      <td>Gittigidiyor satış fiyatınız</td>
    </tr>
      <tr>
      <td>status</td>
      <td>int</td>
      <td>Okumayı durdur(0)-başlat(1)</td>
    </tr>   
  </trbody>
  </table>
  
  # Değişim Günlüğü
  ####05.03.2022 v1.0.0
  - Buybox takibi
  - Buybox'a göre fiyat önerisi
  - Buybox'a göre maliyet hesaplaması
  - Hakediş hesaplaması
 
