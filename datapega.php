
<div class="col-lg-12">
  <!-- Recent Sales -->
  <div class="col-12">
    <div class="card recent-sales overflow-auto;">
      <div class="card-body">
        <h5 class="card-title">
          Data Pegawai
        </h5>
        <table class="table table-borderless datatable">
          <thead>
            <tr>
              <th>Username</th>
              <th>Password</th>
              <th>Jabatan</th>
              <th>Konfigurasi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Ambil tarif per jam dari tabel tarif_kendaraan
            $sql_akun = "SELECT * FROM pegawai";
            $result = mysqli_query($conn, $sql_akun);
            // Output baris tabel
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>
                                <td>{$row["username"]}</td>
                                <td>{$row["password"]}</td>
                                <td>" . strtoupper($row["levela"]) . "</td>
                                <td>
                                    <a href='editp.php?id_pegawai={$row["id_pegawai"]}' class='btn btn-dark'>Edit</a>
                                    <a href='deletepe.php?id_pegawai={$row["id_pegawai"]}'class='btn btn-warning'>Delete</a>
                                </td>
                            </tr>";
            }
            ?>
          </tbody>
        </table>
        <button type="button" onclick="window.location.href='register.php'" class="btn btn-warning">Registrasi</button>
      </div>
    </div>
  </div>
  <!-- End Recent Sales -->
  <!-- Tombol Registrasi -->
  <div class="col-12 mt-3">
  </div>
</div>