<!DOCTYPE html>
<html lang="en">
<head>
    <title>Yönetim Paneli</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/ico.png">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body>
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
            <?php
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

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $kadi = $_POST['kadi'];
                $mail = $_POST['mail'];
                $eskisifre = $_POST['eskisifre'];
                $yenisifre = $_POST['sifre'];

                $query = "UPDATE kullanici_tablosu SET sifre = ? WHERE kadi = ? AND mail = ? AND sifre = ?";
                $params = array($yenisifre, $kadi, $mail, $eskisifre);

                $result = sqlsrv_query($conn, $query, $params);

                if ($result === false) {
                    echo "Şifre güncellenemedi. Bir sorun oluştu!";
                } else {
                    echo "Şifre başarıyla güncellendi.";
                }
            }

            sqlsrv_close($conn);
            ?>
        </div>
    </div>

    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
</body>
</html>
