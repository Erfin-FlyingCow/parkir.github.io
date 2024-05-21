<?php
session_start();
require('conn.php');
include('bootstrapper.php');
include('header.php');
include('sidebar2.php');
$error = '';



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
<!DOCTYPE html>
<html lang="en">

<body>

<main id="main" class="main bg-warning">
  <div class="pagetitle">
	<h1 class="text-white">Dashboard</h1>
	<nav>
	  <ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">EDIT</a></li>
		<li class="breadcrumb-item active text-white">Dashboard</li>
	  </ol>
	</nav>

	<div class="col-lg-12">
	  <div class="col-12">
		<div class="card recent-sales overflow-auto">
		  <div class="card">
			<div class="card-body">
			  <h5 class="card-title">Tambah Tarif</h5>

			  <!-- Vertical Form -->
			  <form class="row g-3" method="post" action="createTarif.php">
  <input type="hidden" name="id_kendaraan" >
  <div class="col-12">
	  <label class="form-label">Jenis Kendaraan</label>
	  <input type="text" name="nama">
  </div>
  <div class="col-12">
	  <label class="form-label">Tarif per jam</label>
	  <input type="text" name="tarif">
  </div>
  <div class="text-center">
	  <input type="submit" class="btn btn-warning"  name="tambah" value="SIMPAN">
	  <input type="reset" class="btn btn-secondary">
  </div>
</form><!-- Vertical Form -->


			</div>
		  </div>
		</div>
	  </div>

	  <?php
	  include('tarif.php');
	  ?>

	</div>
</main>
<?php
// };?>
<!-- ======= Footer ======= -->
<footer id="footer" class="footer bg-black">
  <div class="copyright text-white">
	&copy; Copyright <strong><span>UAS PWL</span></strong>. All Rights Reserved
  </div>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
	  class="bi bi-arrow-up-short"></i></a>
</footer>

</body>
<?php
include('bootstrapperbawah.php');
?>
</html>