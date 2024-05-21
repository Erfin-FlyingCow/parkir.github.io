<?php
// koneksi database
include 'conn.php';
session_start();
var_dump($_POST);
// Check if POST data is set
if (isset($_POST['id_kendaraan'], $_POST['nama_kendaraan'], $_POST['tarif_per_jam'])) {
    // Menangkap data yang dikirim dari form
    $id = $_POST['id_kendaraan'];
    $nama_kendaraan = $_POST['nama_kendaraan'];
    $tarif_per_jam = $_POST['tarif_per_jam'];


    // Update data ke database
    $query = "UPDATE tarif_kendaraan SET nama_kendaraan='$nama_kendaraan', tarif_per_jam='$tarif_per_jam' WHERE id_kendaraan='$id'";

    if (mysqli_query($conn, $query)) {
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
    } else {
        // Handle errors
        echo "Error updating record";
    }
} else {
    // Redirect to index.php if POST data is not set
    echo '<script>alert("gagal tidak valid");</script>';

    exit();
}

