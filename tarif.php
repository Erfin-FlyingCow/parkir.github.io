<div class="col-lg-8">
  <?php
  $sql_tarif_kendaraan = "SELECT * FROM tarif_kendaraan";
  $result_tarif_kendaraan = $conn->query($sql_tarif_kendaraan);

  ?>
  <!-- Recent Activity -->
  <div class="card">
    <div class="card-body">
      <h5 class="card-title text-dark">Tarif Kendaraan</h5>
      <!-- Bordered Table -->
      <table class="table table-bordered border-dark">
        <thead>
          <tr>
            <th scope="col" class="bg-warning text-white">ID Kendaraan</th>
            <th scope="col" class="bg-warning text-white">Nama Kendaraan</th>
            <th scope="col" class="bg-warning text-white">Per Jam</th>
            <th scope="col" class="bg-warning text-white hidden-link">Operasi</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $result_tarif_kendaraan->fetch_assoc()) { ?>
            <tr>
              <td>
                <?php echo $row["id_kendaraan"]; ?>
              </td>
              <td>
                <?php echo $row["nama_kendaraan"]; ?>
              </td>
              <td>
                <?php echo $row["tarif_per_jam"]; ?>
              </td>
              <td class="hidden-link">
                <a href='editke.php?id_kendaraan=<?php echo $row["id_kendaraan"]; ?>' class='btn btn-dark'>Edit</a>
                <a href='deletep.php?id_kendaraan=<?php echo $row["id_kendaraan"]; ?>' class='btn btn-warning'>Delete</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <button type="button" onclick="window.location.href='createTarif.php'"
        class=" btn-warning hidden-link">Tambah</button>
      <!-- End Bordered Table -->

    </div>
    <!-- End Right side columns -->
  </div>
  <!-- End Card -->
</div>