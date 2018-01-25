<?php
	include("veri.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz. 
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>BİLGİLERİ DÜZENLE</title>
		<link href="anasayfa.css" rel="stylesheet" />
	</head>
	<body>
		<?php 
			$sorgu = $baglanti->query("SELECT * FROM kitaplar WHERE id =".(int)$_GET['id']); //id değeri ile düzenlenecek verileri veritabanından alacak sorgu
			$sonuc =$sorgu->fetch(PDO::FETCH_ASSOC); //sorgu çalıştırılıp veriler alınıyor
		?>
		<div class="container">
			<div class="tasarim">
				<form action="" method="post">
					<table class="tablo">
						<tr>
						<tr>
							<td>KİTAP ADI</td>
							<td><input type="text" name="kAdi" class="form-tasarim" value="<?php echo $sonuc['kitapAdi']; // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>" ></td>
						</tr>
						<tr>
							<td>KİTAP YAZARI</td>
							<td><input type="text" name="kYazar" class="form-tasarim" value="<?php echo $sonuc['kitapYazar']; // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>"></td>
						</tr>				
						<tr>
							<td>ALINAN YIL</td>
							<td><input type="text" name="aYil" class="form-tasarim" value="<?php echo $sonuc['alinanYil']; // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>"></td>
						</tr>
						<tr>
							<td>BASLANGIÇ TARİHİ</td>
							<td><input type="date" name="bTar" class="form-tasarim" value="<?php echo $sonuc['basTar']; // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>"></td>
						</tr>
						<tr>
							<td>BİTİŞ TARİHİ</td>
							<td><input type="date" name="biTar" class="form-tasarim"value="<?php echo $sonuc['bitTar']; // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>" ></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" class="btn btn-primary" value="KAYDET"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
				<?php 
					if ($_POST) { // Post olup olmadığını kontrol ediyoruz.
						$kAdi=$_POST['kAdi'];//sayfa yenilendikten sonra post edilen değerleri değişkenlere atıyoruz.
						$kYazar=$_POST['kYazar'];
						$aYil=$_POST['aYil'];
						$bTar=$_POST['bTar'];
						$biTar=$_POST['biTar'];
						if ($kAdi<>"" && $kYazar<>"" && $aYil<>"" && $bTar<>"" && $biTar<>"") { // Veri alanlarının boş olmadığını kontrol ettiriyoruz.
							if ($baglanti->query("UPDATE kitaplar SET kitapAdi = '$kAdi', kitapYazar = '$kYazar', alinanYil = '$aYil', basTar = '$bTar', bitTar = '$biTar' WHERE id =".$_GET['id'])) // Veri güncelleme sorgumuzu yazıyoruz.
							{
								header("location:ekle.php"); // Eğer güncelleme sorgusu çalıştıysa ekle.php sayfasına yönlendiriyoruz.
							}
							else
							{
								echo "Hata oluştu"; // id bulunamadıysa veya sorguda hata varsa hata yazdırıyoruz.
							}
						}
					}
				?>
	</body>
</html>