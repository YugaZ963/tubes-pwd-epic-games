<?php 
session_start();


if(isset($_POST['isi_uang'])) {
    include "connection.php"; // panggil connection.php mysql

    // Ambil id pemain dan uang saat ini
    $id_pemain = $_SESSION['user_id']; // Ganti dengan metode yang sesuai untuk mendapatkan id pemain
    $query = "SELECT uang FROM user WHERE id_user = '$id_pemain'";
    $result = mysqli_query($db_connection, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $uang_saat_ini = $row['uang'];
    } else {
        echo "Gagal mengambil data uang dari database: " . mysqli_error($db_connection);
        exit();
    }

    // Jumlah uang yang ingin ditambahkan
    $uang_baru = $_POST['uang']; // Ganti dengan jumlah uang yang ingin ditambahkan

    // Hitung uang total setelah ditambahkan
    $uang_total = (int)$uang_saat_ini + (int)$uang_baru;

    // Update uang di database
    $update_query = "UPDATE user SET uang = $uang_total WHERE id_user = $id_pemain";
    $update_result = mysqli_query($db_connection, $update_query);

    if ($update_result) {
        // echo "Uang berhasil ditambahkan!";
        echo "<script>alert('Uang berhasil ditambahkan!'); window.location.replace('index.php');</script>";
    } else {
        // echo "Gagal menambahkan uang ke database: " . mysqli_error($db_connection);
        echo "<script>alert('Gagal menambahkan uang!'); window.location.replace('index.php');</script>";
    }
}

?>

<script>window.location.replace("index.php")</script> 