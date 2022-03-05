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
 ```
     {
        "id": 963524,
        "name": "Philips Gc5037\/80 Azur Elite Buharlı Ütü GC5037\/80",
        "cost": 999,
        "price": "",
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
 
