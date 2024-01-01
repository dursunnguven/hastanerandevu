<?php
include("vtbaglan.php");
session_start(); //oturum açma işlemini başlatıyoruz

$kadi = $_POST['kadi'];  //formdan gelen veriyi değişkene atıyoruz
$sifre = $_POST['sifre']; //formdan gelen veriyi değişkene atıyoruz

// SQL Server bağlantısı için gerekli bilgiler
$serverName = "localhost";
$connectionOptions = array(
    "Database" => "hastane",
    "Uid" => "LAPTOP-P4GFCGMO\SQLEXPRESS",
    "PWD" => "Dgüven4343."
);

// SQL Server bağlantısı
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn) {
    // SQL Server sorgusu
    $query = "SELECT * FROM kullanicilar WHERE kadi = ? AND sifre = ?";
    
    // Parametre değerleri
    $params = array($kadi, $sifre);

    // Sorguyu hazırla ve çalıştır
    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Sorgu sonuçlarını kontrol et
    if (sqlsrv_has_rows($stmt)) {
        $_SESSION["login"] = "true";
        $_SESSION["user"] = $kadi;
        $_SESSION["pass"] = $sifre;
        header("location:giris.php");
    } else {
        echo "Kullanıcı adı veya şifre hatalı. <br> Giriş sayfasına yönlendiriliyorsunuz.";
        header("refresh:2 ; url=index.php");
    }

    // Bağlantıyı kapat
    sqlsrv_close($conn);
} else {
    echo "Bağlantı hatası: " . sqlsrv_errors();
}
?>
