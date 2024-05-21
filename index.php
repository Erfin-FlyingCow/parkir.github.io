<style>
  .btn-warning {
    background-color: #ffc107;
    border: 1px solid #ffc107;
    color: #212529;
    padding: 8px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.3s ease;
  }


  .btn-warning:hover {
    background-color: #e0a800;
    border-color: #e0a800;
    color: #212529;
  }
</style>
<?php

session_start();
require "conn.php";
if (!$conn) {
  die("Gagal Terhubung ke MySQL: " . mysqli_connect_error());
}

if (isset($_SESSION["username"]) and ($_SESSION['$levela'] === 'PEGAWAI')) {
  header("Location: homep.php");
  exit();
} elseif (!isset($_SESSION["username"])) {
  header("location: login.php");
}

include('bootstrapper.php');

include('header.php');
include('sidebar.php');
?>

<!DOCTYPE html>
<html lang="en">


<body>
  <?php require('mainfetch.php') ?>

  <main id="main" class="main bg-warning">
    <div class="pagetitle ">
      <h1 class="text-white">Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active text-white">Dashboard</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Customers Card -->
            <?php
            include('ioparkir.php');
            ?>
            <!-- End Customers Card -->

          </div>

        </div>



        <div class="col-lg-12">
          <!-- Recent Sales -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">

              <div class="card-body" id='tabel'>
                <?php
                include('terparkir.php');
                ?>
              </div>


              <!-- <script>
            $(document).ready(function () {

              updatedaftarKendaraan();


              function updatedaftarKendaraan() {
                $.ajax({
                  url: 'terparkir.php',
                  type: 'GET',
                  success: function (data) {
                    $('#tabel').html(data);
                  },
                  error: function () {
                    console.error('Error fetching daftar kendaraan.');
                  },
                });
              }


              setInterval(updatedaftarKendaraan, 1000);
            });
          </script> -->

            </div>
          </div>
          <!-- End Recent Sales -->
        </div>
        <?php
        include('tarif.php');
        ?>

        <?php
        include('datapega.php');
        ?>
  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer bg-black">
    <div class="copyright text-white">
      &copy; Copyright <strong><span>UAS PWL</span></strong>. All Rights Reserved
    </div>
    <!-- <div class="credits">

        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div> -->
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
  <?php
  include('bootstrapperbawah.php');
  ?>
</body>

</html>