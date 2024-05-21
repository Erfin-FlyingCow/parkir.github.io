<?php


// Ambil data dari formulir
$kodeTiket = $_POST['kodetiket'];

// Pisahkan kode tiket menjadi id_parkir, id_kendaraan, dan nomor plat


// Periksa apakah kode tiket cocok dengan data yang ada di database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sertakan file koneksi ke database
    require('conn.php');

    // Ambil data dari formulir
    $kodeTiket = $_POST['kodetiket'];

    $parts = explode(" ", $kodeTiket); // Pisahkan kode tiket berdasarkan spasi
    $idwil = $parts[3]; // Ambil bagian pertama sebagai id_parkir
    $idno = $parts[4]; // Ambil bagian kedua sebagai id_kendaraan
    $idhur = $parts[5]; // Ambil bagian ketiga sebagai nomor plat
    $idcomb = $idwil . ' ' . $idno . ' ' . $idhur;

    // Periksa apakah nomor plat kendaraan cocok dengan data yang ada di database
    $sql = "SELECT * FROM kendaraan_terparkir WHERE plat = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $idcomb);
    $stmt->execute();
    $result = $stmt->get_result();

    // Periksa apakah terdapat baris yang sesuai dengan nomor plat
    if ($result->num_rows > 0) {
        $updateSql = "UPDATE kendaraan_terparkir SET waktu_keluar = NOW() WHERE plat = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("s", $idcomb);
        $updateStmt->execute();
        // Nomor plat cocok dengan data yang ada di database
        echo "Nomor plat cocok dengan data yang ada di database: ";
    } else {
        // Nomor plat tidak cocok dengan data yang ada di database
        echo "Nomor plat tidak cocok dengan data yang ada di database: " . $idcomb;
    }

    // Tutup pernyataan dan koneksi
    $stmt->close();
    $conn->close();
    header('location: index.php');
}
