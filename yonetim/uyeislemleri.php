<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<style type="text/css">
.btn {
	background-color: white;
	border: 2px solid #09F;
	border-radius:8px;
	color: #09F;
	padding: 16px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 12pt;
	font-family:Verdana;
	margin: 4px 2px;
	transition:all 0.4s;	
	-webkit-transition:all 0.4s;
	-moz-transition:all 0.4s;
	-o-transition:all 0.4s;
}
.btn:hover{
	box-shadow: 0 4px 8px 0 gray, 0 6px 20px 0 gray;
	}
</style> 
</head>

<body>
	<CENTER>
		<font face="arial">
<?php
include("vtbaglan.php");
session_start();

// SQL Server bağlantı bilgileri
$serverName = "localhost";
$connectionOptions = array(
    "Database" => "hastane",
    "Uid" => "LAPTOP-P4GFCGMO\SQLEXPRESS",
    "PWD" => "Dgüven4343."
);
$conn = sqlsrv_connect($serverName, $connectionOptions);

if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
}

if(!isset($_SESSION["login"]))
{
	echo "Bu sayfayı görüntüleme yetkiniz yok!<br>";
	echo "<a href=index.php>Giriş Sayfası</a>";
}
else
{
	echo '<br><img src="images/logo.jpg" width="280px"><br><br><h2>ÜYE İŞLEMLERİ</h2><br>
		


		<a href=uyelistele.php class="btn">📄Üyeleri Görüntüle-Güncelle-Sil📄</a><br>

		<a href=kayitol.php class="btn">➕Yeni Üye Oluştur➕</a><br>
		
		<a href=yenisifre.php class="btn">🔑Şifreyi Değiştir🔑</a><br>

		<a href=giris.php class="btn">👈Geri Git👈</a><br>';

	echo '<a href=cikis.php class="btn"><font color="red">❌Çıkış Yap❌</font></a>';
		
	sqlsrv_close($conn);
}
?>
</font>
</CENTER>
</body>
</html>
