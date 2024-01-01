<?php
session_start();

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
    // Oturumu sonlandır
    session_unset();
    session_destroy();
    
    echo "Başarıyla çıkış yapıldı. <br> Giriş sayfasına yönlendiriliyorsunuz.";
    header("refresh:2; url=index.php");
} else {
    echo "Bağlantı hatası: " . sqlsrv_errors();
}
?>
