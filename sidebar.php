<!-- ======= Sidebar ======= -->
<?php

$levela = strtoupper($_SESSION["levela"]); // Convert to uppercase for case-insensitive comparison
?>
<aside id="sidebar" class="sidebar bg-black">

<div class="col-xxl-14 col-xl-12 pt-2">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">
                    Parkir <span>| Total</span>
                  </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-car-front"></i>
                    </div>

                    <div class="ps-3">
                      <h6 id="totalKendaraan">.fetching total kendaraan terparkir</h6>
                      <span class="text-muted small pt-2 ps-1">Kendaraan</span>

                      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                      <script>
                        $(document).ready(function () {

                          updateTotalKendaraan();


                          function updateTotalKendaraan() {
                            $.ajax({
                              url: 'total_kendaraan.php',
                              type: 'GET',
                              success: function (data) {
                                $('#totalKendaraan').html('<h4 >' + data + '</h4>');
                              },
                              error: function () {
                                console.error('Error fetching total kendaraan.');
                              },
                            });
                          }


                          setInterval(updateTotalKendaraan, 1000);
                        });
                      </script>

                    </div>

                  </div>
                </div>

              </div>

            </div>
            <?php
            if ($levela == "ADMIN") {
    $dashboardLink = "index.php";
} else {
    $dashboardLink = "homep.php";
}
?>
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link bg-dark text-white"  href="<?php echo $dashboardLink; ?>">
          <i class="bi bi-grid text-white"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item ">
        <a class="nav-link collapsed bg-black" href="logout.php">
          <i class="bi bi-exclamation-circle text-danger"></i>
          <!-- Tambahkan class text-danger untuk memberikan warna merah pada ikon -->
          <span class="text-white">Logout</span>
        </a>
      </li>


      <!-- End Dashboard Nav -->



    </ul>
    
  </aside>
  <!-- End Sidebar-->