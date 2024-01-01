<?php 
$serverName = "localhost";
$connectionOptions = array(
    "Database" => "hastane",
    "Uid" => "LAPTOP-P4GFCGMO\SQLEXPRESS", // SQL Server kullanıcı adınız
    "PWD" => "Dgüven4343." // SQL Server şifreniz
);

$baglanti = sqlsrv_connect($serverName, $connectionOptions);

if(!$baglanti) {
    die(print_r(sqlsrv_errors(), true));
}

// Karakter setini belirleme işlemi (UTF-8)
$sql = "SET NAMES 'utf8'";
$query = sqlsrv_query($baglanti, $sql);

if($query === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>
