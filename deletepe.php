<?php
// koneksi database
include 'conn.php';
session_start();
// menangkap data id yang di kirim dari url
$id = $_GET['id_pegawai'];
// menghapus data dari database
mysqli_query($conn, "delete from pegawai where id_pegawai='$id'");
// mengalihkan halaman kembali ke index.php

// Check the value of levela and redirect accordingly
$levela = strtoupper($_SESSION["levela"]); // Convert to uppercase for case-insensitive comparison



if ($levela == 'ADMIN') {
    header("location: index.php");
    exit();

} else if ($levela == 'PEGAWAI') {
    // Handle other cases or provide a default redirection
    header("location: homep.php");
    exit();
} else {
    // Redirect to index.php if POST data is not set
    echo '<script>alert("posisi akun tidak valid");</script>';

    exit();
}


