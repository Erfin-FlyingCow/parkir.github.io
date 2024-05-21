
<h5 class="card-title text-dark">
    Kendaraan Terparkir <span>| Today</span>
</h5>

<table class="table table-bordered datatable">
    <thead>
        <tr>
            <!-- <th>ID Parkir</th> -->
            <th>ID Kendaraan</th>
            <th>Plat Nomor</th>
            <th>Waktu Masuk</th>
            <th>Waktu Keluar</th>
            <th>Tarif Per Jam</th>
            <th>Tarif Total</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($result_kendaraan_terparkir->num_rows > 0) {
            while ($row = $result_kendaraan_terparkir->fetch_assoc()) {
                $startTime = $row["waktu_masuk"]; // Waktu masuk
                $endTime = $row["waktu_keluar"]; // Waktu keluar
        
                // Fungsi untuk menghitung tarif total
                if (!function_exists("calculateTotalPrice")) {
                    function calculateTotalPrice(
                        $startTime,
                        $endTime,
                        $tarifPerJam
                    ) {
                        // Menghitung selisih waktu dalam jam
                        $diffInHours =
                            (strtotime($endTime) -
                                strtotime($startTime)) /
                            (60 * 60);

                        // Menghitung tarif total
                        $totalPrice = ceil($diffInHours) * $tarifPerJam;

                        return $totalPrice;
                    }
                }

                // Ambil tarif per jam dari tabel tarif_kendaraan
                $sql_tarif_kendaraan = "SELECT tarif_per_jam FROM tarif_kendaraan where id_kendaraan = '{$row["id_kendaraan"]}'";
                $result_tarif_kendaraan = $conn->query(
                    $sql_tarif_kendaraan
                );

                if ($result_tarif_kendaraan->num_rows > 0) {
                    $row_tarif = $result_tarif_kendaraan->fetch_assoc();
                    if (isset($row_tarif["tarif_per_jam"])) {
                        $tarifPerJam = $row_tarif["tarif_per_jam"]; // Tarif per jam
        
                        if ($row["waktu_keluar"] === null) {
                            $totalPrice = "N/A";
                        } else {
                            // Menghitung tarif total
                            $totalPrice = calculateTotalPrice($startTime, $endTime, $tarifPerJam);
                        
                            // Update tarif_total ke dalam database
                            $updateQuery = "UPDATE kendaraan_Terparkir SET tarif_total = '{$totalPrice}' WHERE id_parkir = '{$row["id_parkir"]}'";
                            $conn->query($updateQuery);
                        }

                        // Output baris tabel
                        echo "<tr>
                     
                        <td>{$row["id_kendaraan"]}</td>
                        <td>{$row["plat"]}</td>
                        <td>{$row["waktu_masuk"]}</td>
                        <td>{$row["waktu_keluar"]}</td>
                        <td>{$tarifPerJam}</td>";
                        
                        if ($totalPrice > 0) {
                            echo "<td>{$totalPrice}</td>";
                        } else {
                            echo "<td>N/A</td>"; // Or any other placeholder text
                        }
            
                        echo "</tr>";
            
                    } else {
                        echo "Error: Tidak dapat mengambil data tarif per jam.";
                    }
                } else {
                    echo "Error: Tidak dapat mengambil data tarif kendaraan.". $conn->error;
                }
            }
        } else {
            echo "Tidak ada kendaraan terparkir.";
        } ?>
    </tbody>
</table>

