<?php
include("vtbaglan.php");
session_start(); // oturum açma işlemini başlatıyoruz

$kadi = $_POST['kadi'];  // formdan gelen veriyi değişkene atıyoruz
$adsoyad = $_POST['adsoyad'];
$mail = $_POST['mail'];
$sifre = $_POST['sifre'];
$kod = $_POST['kod'];

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
    // SQL Server'a veritabanına ekleme sorgusu
    $sql = "INSERT INTO uyeler (kadi, adsoyad, mail, sifre, kod) VALUES (?, ?, ?, ?, ?)";
    
    // Parametre değerleri
    $params = array($kadi, $adsoyad, $mail, $sifre, $kod);

    // Sorguyu hazırla ve çalıştır
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        $_SESSION["login"] = "true";
        $_SESSION["user"] = $kadi;
        $_SESSION["pass"] = $sifre;
        header("location:giris.php");
    }

    // Bağlantıyı kapat
    sqlsrv_close($conn);
} else {
    echo "Bağlantı hatası: " . sqlsrv_errors();
}
?>
