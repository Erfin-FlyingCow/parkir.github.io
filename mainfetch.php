<?php
require('conn.php');
// Tidak ada paginasi atau pencarian, tampilkan semua data
$sql_kendaraan_terparkir = "SELECT * FROM kendaraan_Terparkir order BY id_parkir desc";
$result_kendaraan_terparkir = $conn->query($sql_kendaraan_terparkir);

$sql_tarif_kendaraan = "SELECT * FROM tarif_kendaraan";
$result_tarif_kendaraan = $conn->query($sql_tarif_kendaraan);

if (isset($_GET["action"]) && $_GET["action"] == "savejson") {
    $result_kendaraan_terparkir = $conn->query($sql_kendaraan_terparkir);
    echo savejson($result_kendaraan_terparkir);
}

function generateTicketCode($idParkir, $idKendaraan, $platNomor)
{
    return ' ' . $idParkir . ' ' . $idKendaraan . ' ' . $platNomor . ' ';
}

function savejson($conn)
{
    require "conn.php";
    $file = "tiket/tickets_" . time() . ".json";

    // Query untuk mengambil baris terakhir dari tabel kendaraan_Terparkir
    $sql_last_row =
        "SELECT * FROM kendaraan_Terparkir ORDER BY id_parkir DESC LIMIT 1";
    $result_last_row = $conn->query($sql_last_row);

    if ($result_last_row->num_rows > 0) {
        $row = $result_last_row->fetch_row();

        // Membuat data tiket dari baris terakhir
        $ticketCode = generateTicketCode($row[0], $row[1], $row[2]); // Menggunakan indeks untuk mengakses kolom

        // Membuat array untuk data tiket
        $ticketData = $ticketCode;

        // Membuat data JSON dari data tiket
        $jsonTicket = json_encode($ticketData, JSON_PRETTY_PRINT);

        // Menyimpan data JSON ke dalam file
        if (file_put_contents($file, $jsonTicket) !== false) {
            return "Data tiket dari baris terakhir telah disimpan dalam file {$file}.";
        } else {
            return "Gagal menyimpan data tiket.";
        }
    } else {
        return "Tidak ada kendaraan terparkir.";
    }
}

// ...

if (isset($_GET["action"]) && $_GET["action"] == "savejson") {
    echo savejson($conn);
}
?>