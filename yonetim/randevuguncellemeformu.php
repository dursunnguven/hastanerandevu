<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        /* Diğer stillendirme kodları buraya gelecek */
    </style>
</head>
<body>
    <font face="arial">
        <center>

        <?php

        // Güncellenecek ID'yi alıyoruz
        $guncelleid = $_GET['id'];

        include("vtbaglan.php"); // vtbaglan.php sayfasındaki tüm kodları bu sayfaya çağırdık

        // Select sorgusu ile ders tablosundan ilgili kaydı seçiyoruz
        $sql = "SELECT * FROM randevular WHERE id = ?";
        $params = array($guncelleid);

        // Sorgumuzu hazırlıyoruz
        $stmt = sqlsrv_query($baglanti, $sql, $params);

        // Sorgunun sonucunda dönen satır sayısına sqlsrv_num_rows() fonksiyonu ile bakıyoruz
        $satirsay = sqlsrv_num_rows($stmt);

        if ($satirsay > 0) {
            $satir = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            // Kayıt bulundu
            // Bu kısımda form içine veritabanında çekilen değerleri yazıyoruz.
            echo '<form action="randevuguncelle.php?id=' . $guncelleid . '" method="post" name="form">
                    <table border="1" class="table-fill">
                        <tr>
                            <td colspan="2">
                                <div align="center"><b>' . $guncelleid . ' Nolu Randevu Güncelleme</b></div>
                            </td>
                        </tr>
                        <tr>
                            <td>Ad Soyad:</td>
                            <td><input type="text" name="adsoyad" required="required" value="' . $satir['adsoyad'] . '"> </td>
                        </tr>

                        <tr>
                            <td>Telefon Numarası:</td>
                            <td><input type="text" name="telno" required="required" value="' . $satir['telno'] . '"> </td>
                        </tr>

                        <tr>
                            <td>E-mail Adresi:</td>
                            <td><input type="mail" name="email" required="required" value="' . $satir['email'] . '"> </td>
                        </tr>

                        <tr>
                            <td>Randevu Tarihi:</td>
                            <td><input type="date" name="randevutarih" required="required" value="' . $satir['randevutarih']->format('Y-m-d') . '"> </td>
                        </tr>

                        <tr>
                            <td>Alınan Bölüm:</td>
                            <td><input type="text" name="bolum" required="required" value="' . $satir['bolum'] . '"></td>
                        </tr>

                        <tr>
                            <td>Ek Mesaj:</td>
                            <td><textarea name="mesaj" style="margin: 0px; width: 155px; height: 92px;">' . $satir['mesaj'] . '</textarea></td>
                        </tr>

                        <tr>
                            <td>Durum:</td>
                            <td><input type="text" name="durum" required="required" value="' . $satir['durum'] . '"></td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <div align="right">
                                    <a href=randevulistele.php>Listeye Dön</a>
                                    <input type="reset" value="Geri Al">&nbsp;&nbsp;<input type="submit" value="Güncelle" />&nbsp;
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>';
        } else {
            // Kayıt bulunamadı
            echo "Aranılan kayıt bulunamadı";
        }

        ?>

        </center>
    </font>
</body>
</html>
