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

$id = isset($_GET['id_kendaraan']) ? $_GET['id_kendaraan'] : '';
$data = mysqli_query($conn, "SELECT * FROM tarif_kendaraan WHERE id_kendaraan='$id'");
while($d = mysqli_fetch_array($data)) {
?>


<?php require('mainfetch.php') ?>
<body>

  <main id="main" class="main bg-warning">
    <div class="pagetitle">
      <h1 class="text-white">Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">EDIT</a></li>
          <li class="breadcrumb-item active text-white">Tarif Kendaraan</li>
        </ol>
      </nav>

      <div class="col-lg-12">
        <div class="col-12">
          <div class="card recent-sales overflow-auto">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Edit Tarif</h5>

                <!-- Vertical Form -->
                <form class="row g-3" method="post" action="updatek.php">
    <input type="hidden" name="id_kendaraan" value="<?php echo $id; ?>">
    <div class="col-12">
        <label class="form-label">Jenis Kendaraan</label>
        <input type="text" name="nama_kendaraan" value="<?php echo $d['nama_kendaraan']; ?>">
    </div>
    <div class="col-12">
        <label class="form-label">Tarif per jam</label>
        <input type="text" name="tarif_per_jam" value="<?php echo $d['tarif_per_jam']; ?>">
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
        include('tarif.php');
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
