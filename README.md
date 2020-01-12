## Api For Relax Musics App

<p>
    Api login, register methodları için laravel passport paketi kullanıldı.
</p> 
<p>
    Register' da personal token oluşturulmakta. Bu token expire olana kadar 
    tum login yapılması gereken requestlerde header' a eklenerek gönderilmeli.
</p>
<p>
    Hata mesajları tek bir yerden kontrol edilmekte. Laravel' in bize sunmuş olduğu Handler
    içerisinde hata mesajları yakalandı ve geri dönüş sağlandı.
</p>
<p>
    Api' ye gelen isteklerin tamamı iki response ile geri dönüldü. Burada trait içerisinde 
    iki method bulunmakta. Biri başarılı geri dönüş diğeri ise başarısız geri dönüşler
    için kullanıldı. 
</p>
<p>
    Validation için laravel request kullanıldı. Model geri dönüşlerinde 
    bir standart olması için laravel resource kullanıldı.   
</p>
<p>
    Token kontrolü için middleware kullanılmadı. 
    Bu kontrol laravel passport tarafından header içerisinde token kontrolü yapılarak sağlanmakta.
</p>
<p>
    Ekran görüntülerinde ihtiyaç olmayan methodlarda bulunmakta.
</p>
<p>
    Uygulama ayarları için settings tablosu oluşturuldu. Bu tabloda versiyon bilgisi,
    dil dosyası versiyon bilgisi tutulabilir ve uygulama ilk açıldığında çağrılacak
    methoda status 1 ise gönderilebilir. Bu settings bilgileri uygulamanın ilk açılacağı 
    category listesine eklendi.
</p>
<p>
    Projede fotoğraf ve ses dosyaları kaydetmek için aws s3 kullanıldı. Bu kısmın çalışması için 
    .env dosyasında configure edilmesi gerekmekte.
</p>

## Start App

<p>
    docker-compose up -d    
</p>
<p>
    composer update
</p>
<p>
    php artisan passport:install
</p>
