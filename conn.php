<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "uas";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Gagal Terhubung ke MySQL: " . mysqli_connect_error());
} else {
    // echo "Terkoneksi ke MySQL ! <br>";
}