<?php
include("vtbaglan.php");
session_start(); // oturum açma işlemini başlatıyoruz
$kadi = $_POST['kadi'];  // formdan gelen veriyi değişkene atıyoruz
$sifre = $_POST['sifre']; // formdan gelen veriyi değişkene atıyoruz

$sql = "SELECT * FROM kullanicilar WHERE kadi = ? AND sifre = ?";
$params = array($kadi, $sifre);

// sqlsrv_query kullanarak sorguyu çalıştırma
$query = sqlsrv_query($baglanti, $sql, $params);

if ($query) {
    $rowCount = sqlsrv_has_rows($query);

    if ($rowCount) {
        $_SESSION["login"] = "true";
        $_SESSION["user"] = $kadi;
        $_SESSION["pass"] = $sifre;
        header("location:giris.php");
    } else {
        echo "Kullanıcı adı veya şifre yada ikiside hatalı. <br> Giriş sayfasına yönlendiriliyorsunuz.";
        header("refresh:2;url=index.php");
    }
} else {
    echo "Sorgu hatası: " . sqlsrv_errors();
}

// sqlsrv_close kullanarak bağlantıyı kapatma
sqlsrv_close($baglanti);
?>
