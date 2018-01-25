<?php
include("veri.php");//veritabanı bağlantımızı sayfamıza ekliyoruz.
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>BENİM KÜTÜPHANEM</title>
		<link href="anasayfa.css" rel="stylesheet" />
	</head>
	<body>
	<form id="form1" runat="server">
    <div>
	<!--ekranda yazmasını istediğim metin ve görünüm düzenikodu -->
        <div class="anasayfa">
            <div class="baslik">
                <h1>BENİM KÜTÜPHANEM </h1></div>
            <div class="duzen">
                <div class= "sol">
                    <h2>Evinde kitaplarınla geçireceğin soğuk havalar için bir kütüphane kurmaya ne dersin?</h2>
                    <p>
                       Çayını, kahveni alıp kitaplarının keyfini çıkarmanın tam zamanı! Bir kitabın kokusu, bir kitabın dokusu ne iyi geliyor insana. Açıyorsun bir sayfa, alıyor içine çekiyor seni. Sonra ne dert kalıyor, ne tasa. Kütüphanelerde gezerken diyorum ki ne çok kitap, keşke hepsi benim olsa. Bir de o kitapların evinde, evinin en güzel köşesinde dursalar ne güzel olurdu değil mi? 
                   </p>
                </div>
                <div class ="sag">
                    <h2>Peki elindeki kitapları bir düzene koymak ister misin?</h2>
                     <p>
                        Evet dediğinizi duyar gibiyim. Öncelikle elindeki kitapların adını yazarını ve senin için önemli ise aldığın tarihi kayıt ederek başlayabiliriz. Okumaya başladığın kitapların adını, okumaya başladığın tarihi, okumayı bitirdiğin tarihleri ekleyerek ne kadar sürede okumayı tamamladığını görmek seni de mutlu edecektir. Bu mutluluğuna katkıda bulunmak istiyorum. 
                    </p>
                </div>
            </div>
		</form>	
		<div class="container">
			<div class="tasarim">
				<form action="" method="post">
					<table class="tablo">
						<tr>
							<td>KİTAP ADI</td>
							<td><input type="text" name="kAdi" class="form-tasarim" ></td>
						</tr>
						
						<tr>
							<td>KİTAP YAZARI</td>
							<td><input type="text" name="kYazar" class="form-tasarim" ></td>
						</tr>
						<tr>
							<td>ALINAN YIL</td>
							<td><input type="text" name="aYil" class="form-tasarim" ></td>
						</tr>						
						<tr>
							<td>BASLANGIÇ TARİHİ</td>
							<td><input type="date" name="bTar" class="form-tasarim" ></td>
						</tr>						
						<tr>
							<td>BİTİŞ TARİHİ</td>
							<td><input type="date" name="biTar" class="form-control" ></td>
						</tr>						
						<tr>
							<td></td>
							<td><input class="ekleme"  type="submit" value="EKLE"></td>
						</tr>									
					</table>					
				</form>
				<?php
					if($_POST) { //sayfada post olup olmadığını kontrol ediyoruz.
						$kAdi=$_POST['kAdi'];//sayfa yenilendikten sonra post edilen değerleri değişkenlere atıyoruz.
						$kYazar=$_POST['kYazar'];
						$aYil=$_POST['aYil'];
						$bTar=$_POST['bTar'];
						$biTar=$_POST['biTar'];						
						if($kAdi<>"" && $kYazar<>"" && $aYil<>"" && $bTar<>"" && $biTar<>""){//veri alanlarının dolu olup olmadığı kontrol ediliyor.
							if($baglanti->query("insert into kitaplar(kitapAdi, kitapYazar, alinanYil, basTar, bitTar) values ('$kAdi','$kYazar','$aYil','$bTar','$biTar')")){//veri ekleme sorgumuzu yazıyoruz.
								echo "Veri Ekleme Başarılı..";
							}else{
								echo "Veri Ekleme Başarısız.. ";
							}
						}
					}	
				?>
			</div>
			<div class="tasarim">
				<table class="tablo">
					<tr>
					<!-- tablo başlıklarına yazı tipi ekledim -->
						<th>  KİTAP NO  </th>
						<th>  KİTAP ADI </th>
						<th>  KİTAP YAZARI </th>
						<th>  ALINAN YIL </th>
						<th>  BAŞLANGIÇ TARİHİ </th>
						<th>  BİTİŞ TARİHİ </th>
					</tr>
					<?php 
						$sorgu = $baglanti->query("SELECT * FROM kitaplar"); // notlistesi tablosundaki tüm verileri çekiyoruz.
						while ($sonuc=$sorgu->fetch(PDO::FETCH_ASSOC)){
							$id=$sonuc['id'];
							$kAdi=$sonuc['kitapAdi'];
							$kYazar=$sonuc['kitapYazar'];
							$aYil=$sonuc['alinanYil'];
							$bTar=$sonuc['basTar'];
							$biTar=$sonuc['bitTar'];
					?>
							<tr>
								<td><?php echo $id;?></td>
								<td><?php echo $kAdi;?></td>
								<td><?php echo $kYazar;?></td>
								<td><?php echo $aYil;?></td>
								<td><?php echo $bTar;?></td>
								<td><?php echo $biTar;?></td>
								<td><a href="duzenle.php?id=<?php echo $id; ?>" class="btn btn-primary">DÜZENLE</a></td>
								<td><a href="sil.php?id=<?php echo $id; ?>" class="btn btn-danger">SİL</a></td>
							</tr>
					<?php
						}
					?>
				</table>
			</div>
		</div>
	</body>
</html>