<!-- ======= Sidebar ======= -->
<?php
if (!isset($_SESSION["username"])) {
  header("Location: login.php"); // Alihkan ke halaman login jika pengguna belum login
  exit();
}
$levela = strtoupper($_SESSION["levela"]); // Convert to uppercase for case-insensitive comparison
?>
<aside id="sidebar" class="sidebar bg-black">


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