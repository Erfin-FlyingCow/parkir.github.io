<?php
// get_total_kendaraan.php

// Sambungkan ke database
require('conn.php');

// Query untuk mendapatkan total kendaraan
$query = "SELECT COUNT(*) AS total FROM kendaraan_terparkir WHERE waktu_keluar IS NULL";
$result = mysqli_query($conn, $query);

if ($result) {
  $row = mysqli_fetch_assoc($result);
  echo $row['total'];
} else {
  echo "Error in query: " . mysqli_error($conn);
}

// Tutup koneksi database
mysqli_close($conn);

