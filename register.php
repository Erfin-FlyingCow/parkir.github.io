<?php
session_start();
require('conn.php');
include('bootstrapper.php');
include('header.php');
include('sidebar2.php');
$error = '';




if (isset($_POST['submit'])) {
	$username = stripslashes($_POST['username']);
	$username = mysqli_real_escape_string($conn, $username);
	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($conn, $password);
	$repass = stripslashes($_POST['repassword']);
	$repass = mysqli_real_escape_string($conn, $repass);
	$level = $_POST['levela'];

	if (!empty(trim($username)) && !empty(trim($password)) && !empty(trim($repass))) {
		if ($password == $repass) {
			if (cek_nama($username, $conn) == 0) {
				$hashed_password = password_hash($password, PASSWORD_DEFAULT);

				$query = "INSERT INTO pegawai (username, password, levela) VALUES ('$username','$hashed_password','$level')";
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
					$error = "Register user gagal";
				}
			} else {
				$error = "Username sudah terdaftar";
			}
		} else {
			$error = "Password tidak sama";
		}
	} else {
		$error = "Data tidak boleh kosong";
	}
}
function cek_nama($username, $conn)
{
	$nama = mysqli_real_escape_string($conn, $username);
	$query = "SELECT * FROM pegawai WHERE username = '$nama'";
	$result = mysqli_query($conn, $query);

	return mysqli_num_rows($result);
}
?>
<!DOCTYPE html>
<html lang="en">

<body>

<main id="main" class="main bg-warning">
  <div class="pagetitle">
	<h1 class="text-white">Pegawai</h1>
	<nav>
	  <ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Tambah</a></li>
		<li class="breadcrumb-item active text-white">Register</li>
	  </ol>
	</nav>

	<div class="col-lg-12">
	  <div class="col-12">
		<div class="card recent-sales overflow-auto">
		  <div class="card">
			<div class="card-body">
			  <h5 class="card-title">Tambah Pegawai</h5>

			  <!-- Vertical Form -->
			  <form class="row g-3" method="post" action="register.php">
  <div class="col-12">
	  <label class="form-label">Username</label>
	  <input type="text" name="username">
  </div>
  <div class="col-12">
	  <label class="form-label">Password</label>
	  <input type="password" name="password">
  </div>
  <div class="col-12">
	  <label class="form-label">Konfirmasi Password</label>
	  <input type="password" name="repassword">
  </div>
  <div class="col-12">
        <label class="form-label">Status</label>
        
                    <select name="levela">
                        <option value="ADMIN" >Admin</option>
                        <option value="PEGAWAI" >Pegawai</option>
                    </select>
                
    </div>
  <div class="text-center">
	  <input type="submit" class="btn btn-warning"  name="submit" value="SIMPAN">
	  <input type="reset" class="btn btn-secondary">
  </div>
</form><!-- Vertical Form -->


			</div>
		  </div>
		</div>
	  </div>

	  <?php
	  include('datapega.php');
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