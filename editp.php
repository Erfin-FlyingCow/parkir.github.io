<?php
session_start();
include('bootstrapper.php');
include('header.php');
include('sidebar.php');
require "conn.php";

if (!$conn) {
  die("Gagal Terhubung ke MySQL: " . mysqli_connect_error());
}

if (!isset($_SESSION["username"])) {
  header("Location: login.php");
  exit();
}

$id = isset($_GET['id_pegawai']) ? $_GET['id_pegawai'] : '';
$data = mysqli_query($conn, "SELECT * FROM pegawai WHERE id_pegawai='$id'");
while($d = mysqli_fetch_array($data)) {
?>



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
                <h5 class="card-title">Edit Data Pegawai</h5>

                <!-- Vertical Form -->
                <form class="row g-3" method="post" action="update.php">
    <input type="hidden" name="id_pegawai" value="<?php echo $id; ?>">
    <div class="col-12">
        <label class="form-label">Username</label>
        <input type="text" name="username" value="<?php echo $d['username']; ?>">
    </div>
    <div class="col-12">
        <label class="form-label">Password</label>
        <input type="text" name="password" >
    </div>
    <div class="col-12">
        <label class="form-label">Status</label>
        
                    <select name="levela">
                        <option value="ADMIN" <?php if ($d['levela'] == 'Admin') echo 'selected'; ?>>Admin</option>
                        <option value="PEGAWAI" <?php if ($d['levela'] == 'Pegawai') echo 'selected'; ?>>Pegawai</option>
                    </select>
                
    </div>
    <div class="text-center">
        <input type="submit" class="btn btn-warning" value="SIMPAN">
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
};?>
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
