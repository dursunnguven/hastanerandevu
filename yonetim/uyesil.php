<!DOCTYPE html>
<html>
<head>
	<title>Üye Silme Sayfası</title>

	<!-- Yönlendirme -->
	<meta http-equiv="refresh" content="5;URL=uyelistele.php">
	<!-- Yönlendirme -->

</head>
<body>
	<font face="Arial" size="4">
		<center><br>

			<?php
			$silinecekID = $_GET['id'];

			$serverName = "localhost"; // SQL Server sunucu adı veya IP adresi
			$connectionOptions = array(
				"Database" => "hastane", // Veritabanı adı
				"Uid" => "LAPTOP-P4GFCGMO\SQLEXPRESS", // Kullanıcı adı
				"PWD" => "Dgüven4343." // Şifre
			);

			$conn = sqlsrv_connect($serverName, $connectionOptions);

			if (!$conn) {
				die(print_r(sqlsrv_errors(), true));
			}

			$query = "DELETE FROM kullanicilar WHERE id = ?";
			$params = array($silinecekID);

			$result = sqlsrv_query($conn, $query, $params);

			if ($result === false) {
				echo "Bir sorun oluştu! Üye silinemedi";
			} else {
				echo $silinecekID . " Nolu Üye Başarıyla silindi";
			}

			sqlsrv_close($conn);
			?>

			<br>

			<!-- Geri sayım -->
			<script>
				var i = 5; // Geri sayımın başlıyacağı süre

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
