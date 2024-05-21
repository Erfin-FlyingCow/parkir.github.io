<?php
// koneksi database
include 'conn.php';

// Check if POST data is set
if (isset($_POST['id_pegawai'], $_POST['username'], $_POST['password'], $_POST['levela'])) {
    // Menangkap data yang dikirim dari form
    $id = $_POST['id_pegawai'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['levela'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Update data ke database
    $query = "UPDATE pegawai SET username='$username', password='$hashed_password', levela='$level' WHERE id_pegawai='$id'";


    if (mysqli_query($conn, $query)) {
        // Check the value of levela and redirect accordingly
        if ($_SESSION["levela"] == 'admin' || 'ADMIN' || 'Admin') {
            header("location: index.php");
            exit();
        } else {
            // Handle other cases or provide a default redirection
            header("location: homep.php");
            exit();
        }
    } else {
        // Handle errors
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    // Redirect to index.php if POST data is not set
    echo '<script>alert("posisi akun tidak valid");</script>';

    exit();
}
?>