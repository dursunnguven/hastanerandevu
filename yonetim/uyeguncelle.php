<!DOCTYPE html>
<html>
<head>
	<title></title>

	<!-- yönlendirme -->
	<meta http-equiv="refresh" content="5;URL=uyelistele.php">
	<!-- yönlendirme -->

</head>
<body>
	<font face="Arial" size="4">
		<center><br>
		<?php
		$guncelleeid = $_GET['id'];

		$kadi = $_POST['kadi'];
		$adsoyad = $_POST['adsoyad'];
		$mail = $_POST['mail'];
		$sifre = $_POST['sifre'];
		$bolum = $_POST['bolum'];
		$mesaj = $_POST['mesaj'];
		$durum = $_POST['durum'];

		include("vtbaglan.php"); //vtbaglan.php sayfasındaki tüm kodları bu sayfaya çağırdık

		// güncelleme için SQL sorgumuzu yazıyoruz.
		$sql = "UPDATE kullanicilar SET kadi=?, adsoyad=?, mail=?, sifre=? WHERE id=?";
		$params = array($kadi, $adsoyad, $mail, $sifre, $guncelleeid);
		$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);

		// sorgumuzu çalıştırıyoruz
		$sonuc = sqlsrv_query($conn, $sql, $params, $options);

		if ($sonuc !== false) {
			echo "Üye Bilgileri Başarıyla güncellendi";
		} else {
			echo "Bir problem oluştu, verileri kontrol ediniz";
		}
		?>
		<br>

		<!-- Geri sayım -->
		<script>
			var i = 5; // Geri sayımın başlayacağı süre
			function saydir() {
				i--;
				var eleman = document.getElementById("gerisayim");
				eleman.innerHTML = i + " saniye sonra listeye yönlendirileceksiniz.";
			}
			setInterval("saydir()", 1000);
		</script>

		<div id="gerisayim"></div>

		<!-- Geri sayım  -->
		<a href=uyelistele.php>Şimdi Git</a>

		</center>
	</font>
</body>
</html>
