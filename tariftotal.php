<?php
// Include file koneksi ke database (jika belum di-include sebelumnya)
include 'conn.php'; // Ganti dengan nama file koneksi yang sesuai

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Ambil data dari request (misalnya ID kendaraan)
    $idKendaraan = $_GET['id_kendaraan'];

    // Query untuk mendapatkan data kendaraan berdasarkan ID
    $sql = "SELECT * FROM kendaraan_terparkir WHERE id_kendaraan = '{$idKendaraan}'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $startTime = $row["waktu_masuk"];
        $endTime = $row["waktu_keluar"];

        // Query untuk mendapatkan tarif per jam berdasarkan ID kendaraan
        $sqlTarif = "SELECT tarif_per_jam FROM tarif_kendaraan WHERE id_kendaraan = '{$idKendaraan}'";
        $resultTarif = $conn->query($sqlTarif);

        if ($resultTarif->num_rows > 0) {
            $rowTarif = $resultTarif->fetch_assoc();
            $tarifPerJam = $rowTarif["tarif_per_jam"];

            // Hitung tarif total
            $diffInHours = (strtotime($endTime) - strtotime($startTime)) / (60 * 60);
            $totalPrice = ceil($diffInHours) * $tarifPerJam;

            // Update tarif total ke dalam database
            $updateQuery = "UPDATE kendaraan_terparkir SET tarif_total = '{$totalPrice}' WHERE id_kendaraan = '{$idKendaraan}'";
            if ($conn->query($updateQuery) === TRUE) {
                // Kembalikan tarif total sebagai respons AJAX
                echo $totalPrice;
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            echo "Error: Tidak dapat mengambil data tarif per jam.";
        }
    } else {
        echo "Error: Tidak dapat menemukan kendaraan dengan ID tersebut.";
    }
}
?>