<?php 
// session_start();
if (isset($_POST['cari'])) {
    include "connection.php";
$id_pemain = $_POST['user_id'];
// $id_game = $_POST['game_id']; // Sesuaikan dengan cara Anda mendapatkan ID game

$nama_game = mysqli_real_escape_string($db_connection, $_POST['keyword']);
// var_dump($nama_game);
$query1 = "SELECT id_game FROM game WHERE nama_game LIKE '%$nama_game%' " ;
$result = mysqli_query($db_connection, $query1);
$row_id_game = mysqli_fetch_assoc($result);
$id_game= $row_id_game["id_game"];

// var_dump($id_game);
// die();

// Periksa apakah game sudah ada di wishlist
$query2 = mysqli_query($db_connection, "SELECT * FROM game WHERE id_game = '$id_game' AND nama_game LIKE '%$nama_game%'");
    // Jika belum ada, tambahkan ke wishlist
    if ($query2) {
        echo "<script>alert('Search successfully');window.location.replace('detail_game.php?id=" . $id_game . "'); </script>";
    } else {
        echo "<script>alert('Search Fail'); window.location.replace('index.php');</script>";
    }
}

?>