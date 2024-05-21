<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center bg-black">
  <div class="d-flex align-items-center justify-content-between">

    <div class="logo d-flex align-items-center">

      <span class="d-none d-lg-block text-light">Manajemen Parkir</span>
</div>
    <i class="bi bi-list toggle-sidebar-btn text-light"></i>
  </div>
  <!-- End Logo -->
  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <span class="d-none d-md-block dropdown-toggle ps-2 text-light">
            <?php echo $_SESSION[
              "username"
            ]; ?>
          </span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <span>Anda login sebagai</span>
            <h6>
              <?php echo $_SESSION["username"]; ?>

            </h6>
            <span>Status :
              <?php echo $_SESSION["levela"]; ?>
            </span>

          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="logout.php">
              <i class="bi bi-box-arrow-right"></i>
              <span>Log Out</span>
            </a>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

      <!-- End Icons Navigation -->
</header>