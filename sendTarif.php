<?php

if (isset($_POST['tambah'])) {
	$nama_kendaraan = stripslashes($_POST['nama']);
	$nama_kendaraan = mysqli_real_escape_string($conn, $nama_kendaraan);
	$tarif_per_jam = stripslashes($_POST['tarif']);
	$tarif_per_jam = mysqli_real_escape_string($conn, $tarif_per_jam);

	if (!empty(trim($nama_kendaraan)) && !empty(trim($tarif_per_jam))) {
		if (cek_nama($nama_kendaraan, $conn) == 0) {

			$query = "INSERT INTO tarif_kendaraan (nama_kendaraan, tarif_per_jam) VALUES ('$nama_kendaraan','$tarif_per_jam')";
			$result = mysqli_query($conn, $query);

			if ($result) {
				if( $_SESSION['levela'] == 'ADMIN') {
					// Jika admin, ubah link ke index.php
					header('Location: index.php');
				} else {
					// Jika bukan admin, biarkan link ke index.html
					header('Location: homep.php');
				}
				exit;

			} else {
				$error = "Data Gagal ditambahkan";
			}
		} else {
			$error = "Data tidak boleh kosong";
		}
	}
}
function cek_nama($nama_kendaraan, $conn)
{
	$nama = mysqli_real_escape_string($conn, $nama_kendaraan);
	$query = "SELECT * FROM tarif_kendaraan WHERE nama_kendaraan = '$nama'";
	$result = mysqli_query($conn, $query);

	return mysqli_num_rows($result);
}
?>