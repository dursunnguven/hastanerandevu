<?php
include("vtbaglan.php");

$iptalid = $_GET['id'];
$durum = "İptal Edilmiş";

// Güncelleme için SQL sorgumuzu yazıyoruz.
$sql = "UPDATE randevular SET durum = ? WHERE id = ?";
$params = array($durum, $iptalid);

// Sorgumuzu çalıştırıyoruz
$stmt = sqlsrv_query($baglanti, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

     <!-- Diğer başlık (title) ve head içeriği buraya gelecek -->

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- Diğer HTML kodları buraya gelecek -->

     <center>
          <br><br><br><br>
          <h2>Randevu İptali</h2>
          <br>
          <?php
          if ($stmt > 0) {
               echo "Randevunuz iptal edilmiştir.";
          } else {
               echo "Randevunuz iptal edilemedi.";
          }
          ?>
          <br><br>
          <br>
          <a href="../index.html" class="iletisimbutonu">Çıkış</a>
          <br><br><br>
     </center>

     <!-- Diğer HTML kodları buraya gelecek -->

     <!-- FOOTER ve SCRIPTS kısmı buraya gelecek -->

</body>
</html>
