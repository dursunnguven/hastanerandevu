<?php
include("vtbaglan.php");

if ($_POST) {
    $adsoyad = $_POST['adsoyad'];
    $telno = $_POST['telno'];
    $email = $_POST['email'];
    $randevutarih = $_POST['randevutarih'];
    $bolum = $_POST['bolum'];
    $mesaj = $_POST['mesaj'];
    $kayittarihi = date('d.m.Y');
    $ipadresi = $_SERVER["REMOTE_ADDR"];
    $durum = "Aktif";

    // SQL kayıt başlangıcı
    $sql = "INSERT INTO randevular(adsoyad, telno, email, randevutarih, bolum, mesaj, kayittarihi, ipadresi, durum)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $params = array($adsoyad, $telno, $email, $randevutarih, $bolum, $mesaj, $kayittarihi, $ipadresi, $durum);

    $stmt = sqlsrv_query($baglanti, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    // SQL kayıt bitişi
}
?>

<!-- Diğer HTML kodları buraya gelecek -->

<?php
// Aşağıdaki PHP kodları da aynı dosyanın devamıdır.
echo '<br>

<center>

<h2>Sn. ' . $adsoyad . ' Randevunuz Başarıyla Alındı</h2>
</center>


 <div id="dvContainer">
<center>
<p>ECB Hastanesi Randevu Bilgileriniz</p>


<table border="1" width="450" height="250">
    <tr>
        <td>
            &nbsp;&nbsp;&nbsp;<b>Adınız Soyadınız:</b>
        </td>
        <td>
            &nbsp;&nbsp;' . $adsoyad . ' 
        </td>
    </tr>
    <tr>
        <td>
            &nbsp;&nbsp;&nbsp;<b>Telefon Numaranız:</b>
        </td>
        <td>
            &nbsp;&nbsp;' . $telno . ' 
        </td>
    </tr>
    <tr>
        <td>
            &nbsp;&nbsp;&nbsp;<b>Email Adresiniz:</b>
        </td>
        <td>
            &nbsp;&nbsp;' . $email . ' 
        </td>
    </tr>
    <tr>
        <td>
            &nbsp;&nbsp;&nbsp;<b>Randevu Tarihiniz:</b>
        </td>
        <td>
            &nbsp;&nbsp;' . $randevutarih . ' 
        </td>
    </tr>
    <tr>
        <td>
            &nbsp;&nbsp;&nbsp;<b>Aldığınız Bölüm:</b>
        </td>
        <td>
            &nbsp;&nbsp;' . $bolum . ' 
        </td>
    </tr>
    <tr>
        <td>
            &nbsp;&nbsp;&nbsp;<b>Ek Mesajınız:</b>
        </td>
        <td>
            &nbsp;&nbsp;' . $mesaj . ' 
        </td>
    </tr>
</table>
<br>
<p>Lütfen randevu zamanından 10dk önce geliniz.</p>
</center>
</div>
<center>
<p>IP Adresi: ' . $ipadresi . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kayıt Tarihi: ' . $kayittarihi . '</p>
<br>
<input class="iletisimbutonu" type="button" value="Kaydet/Yazdır" id="btnPrint" />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="randevuiptal.php?id='.$iptalid.'" class="iletisimbutonu">Randevuyu İptal Et</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="../index.html" class="iletisimbutonu">Çıkış</a>
<br><br><br>
</center>';
?>
