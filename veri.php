<?php


$servername = "localhost";
 $username = "root";
 $password = "";
 // Veritabanı bağlantımızı yapıyoruz.
try {
    @$baglanti = new PDO("mysql:host=$servername;dbname=kutuphane", $username, $password);
    // set the PDO error mode to exception
  @$baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Baglantı Başarılı."; 
    }
catch(PDOException $e)
    {
    echo "Baglantı yapılamadı.: " . $e->getMessage();
    }
@$baglanti->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");// Türkçe karakter sorunu olmaması için utf8'e çeviriyoruz.

?>
