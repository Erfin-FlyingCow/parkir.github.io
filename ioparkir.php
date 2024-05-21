<div class="container mt-4">
  <div class="row">
    <div class="col-md-6">
      <div class="card ms-2">
        <div class="card-body">
          <h5 class="card-title">Form Kendaraan Masuk</h5>
          <form method="post" action="kendaraanmasuk.php">
            <div class="row mb-3">
              <label for="nomorplat" class="col-sm-4 col-form-label">Plat Nomor</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nomorplat" name="nomorplat">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-4 col-form-label">Jenis Kendaraan</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" id="jkendaraan" name="jkendaraan">
                  <!-- Pilihan jenis kendaraan di sini -->
                  <?php
                  require('conn.php');
                  $sql = "SELECT * FROM tarif_kendaraan";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      echo "<option value='" . $row["id_kendaraan"] . "'>" . $row["nama_kendaraan"] . "</option>";
                    }
                  } else {
                    echo "<option value=''>Tidak ada data kendaraan</option>";
                  }

                  ?>
                </select>
              </div>
            </div>
            <div class="row-sm-8">
              <button id="cetakTiket" class="btn btn-dark">Cetak Tiket</button>

              <button type="submit" class="btn btn-warning">Input</button>

            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card ms-2">
        <div class="card-body">
          <h5 class="card-title">Form Kendaraan Keluar</h5>
          <form method="post" action="kendaraankeluar.php">
            <div class="row mb-3">
              <label for="kodetiket" class="col-sm-4 col-form-label">Kode Tiket</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="kodetiket" name="kodetiket">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-4 col-form-label">Submit Button</label>
              <div class="col-sm-8">
                <button type="submit" class="btn btn-warning">Keluar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>