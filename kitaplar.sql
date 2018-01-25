-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 Oca 2018, 21:45:41
-- Sunucu sürümü: 5.7.14
-- PHP Sürümü: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kutuphane`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitaplar`
--

CREATE TABLE `kitaplar` (
  `id` int(11) NOT NULL,
  `kitapAdi` varchar(45) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kitapYazar` varchar(45) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `alinanYil` int(11) NOT NULL,
  `basTar` date NOT NULL,
  `bitTar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

--
-- Tablo döküm verisi `kitaplar`
--

INSERT INTO `kitaplar` (`id`, `kitapAdi`, `kitapYazar`, `alinanYil`, `basTar`, `bitTar`) VALUES
(1, 'Çırpınıp İçinde Döndüğüm Deniz', 'Hüseyin Kaya', 2013, '2011-11-20', '2018-11-20'),
(2, 'Söz Mühendisi', 'Hasan Çap', 2016, '2016-01-20', '2016-01-29'),
(3, 'İntibah', 'Namık Kemal', 2011, '2011-05-22', '2011-05-29'),
(4, 'Nar Ağacı', 'Nazan Bekiroğlu', 2014, '2018-01-03', '2018-01-24');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kitaplar`
--
ALTER TABLE `kitaplar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kitaplar`
--
ALTER TABLE `kitaplar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
