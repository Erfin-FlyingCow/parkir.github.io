<?php
// Periksa apakah formulir telah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sertakan file koneksi ke database
    require('conn.php');

    // Ambil data dari formulir
    $jenis_kendaraan_id = $_POST['jkendaraan']; // Asumsikan 'id_kendaraan' adalah nama kolom di database Anda
    $nomor_plat = $_POST['nomorplat']; // Pastikan nama input sesuai dengan nama di formulir Anda

    // Periksa apakah nomor plat tidak kosong
    if (!empty($nomor_plat)) {
        // Persiapkan pernyataan SQL
        $sql = "INSERT INTO kendaraan_terparkir (id_kendaraan, plat) VALUES (?, ?)";

        // Buat pernyataan yang sudah disiapkan
        $stmt = $conn->prepare($sql);

        // Ikatan parameter ke pernyataan
        $stmt->bind_param("is", $jenis_kendaraan_id, $nomor_plat);

        // Jalankan pernyataan
        if ($stmt->execute()) {
            echo "Data berhasil disimpan.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Tutup pernyataan
        $stmt->close();
    } else {
        echo "Nomor plat tidak boleh kosong.";
    }

    // Setelah jeda, lanjutkan dengan menjalankan mainfetch.php
    header('location: index.php');
}
?>