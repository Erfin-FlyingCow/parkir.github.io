<?php
session_start();

require "conn.php";

$error = "";

if (isset($_POST["submit"])) {
	$username = stripslashes($_POST["username"]);
	$username = mysqli_real_escape_string($conn, $username);
	$password = stripslashes($_POST["password"]);
	$password = mysqli_real_escape_string($conn, $password);
	if (!empty(trim($username)) && !empty(trim($password))) {
		$query = "SELECT * FROM pegawai WHERE username = '$username'";
		$result = mysqli_query($conn, $query);
		$rows = mysqli_num_rows($result);

		if ($rows != 0) {
			$row = mysqli_fetch_assoc($result);
			$hash = $hash = $row["password"];
			if (password_verify($password, $hash)) {
				if ($_SESSION["code"] != $_POST["kodecaptcha"]) {
					$error = "Kode CAPTCHA anda salah";
				} else {
					$level = $row["levela"];  // Ambil levela dari hasil query

					if ($level == "PEGAWAI") {
						$_SESSION["username"] = $username;
						$_SESSION["levela"] = $level;
						header("Location: homep.php");
						exit();
					} else {
						$_SESSION["username"] = $username;
						$_SESSION["levela"] = $level;
						header("Location: index.php");
						exit();

						// Penting: setelah header(), pastikan untuk keluar dari skrip dengan exit atau die
					}
				}
			} else {
				$error = "Password yang dimasukkan salah.";
			}
		} else {
			$error = "Username tidak ditemukan.";
		}
	} else {
		$error = "Username dan password tidak boleh kosong.";
	}
}
// Membuat token CSRF
$_SESSION["csrf_token"] = bin2hex(random_bytes(32));
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>


	<div class="container-login100" style="background-color: white; 	">
		<div class="wrap-login100 p-t-30 p-b-50">
			<span class="login100-form-title p-b-41">
				Account Login
			</span>
			<form class="login100-form validate-form p-b-33 p-t-5" action="login.php" method="post">

				<div class="wrap-input100 validate-input" data-validate="Enter username">
					<input class="input100" type="text" id="username" name="username" placeholder="Masukan Username">
					<span class="focus-input100" data-placeholder="&#xe82a;"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Enter password">
					<input class="input100" type="password" id="inputpassword" name="password" placeholder="Password">
					<span class="focus-input100" data-placeholder="&#xe80f;"></span>
				</div>


				<div class="wrap-input100 validate-input">
					<img src="captcha.php" alt="gambar" />

					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Enter captcha">
					<input class="input100" type="text" name="kodecaptcha" value="" maxlength="5"
						placeholder="Isi Kode Captcha">
					<span class="focus-input100" data-placeholder="&#xe80f;"></span>
				</div>

				<div>

				</div>
				<input type="hidden" name="csrf_token" value="<?php echo $_SESSION[
					"csrf_token"
				]; ?>">

				<div class="container-login100-form-btn m-t-32">
					<button class="login100-form-btn" type="submit" name="submit" value="Login"> Login
				</div>


			</form>
			<?php if (!empty($error)) {
				echo '<p style="color: red;">' . $error . "</p>";
			} ?>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>