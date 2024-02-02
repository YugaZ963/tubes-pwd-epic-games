<?php 
session_start();

include "connection.php";
$id_pemain = $_SESSION['user_id'];
$id_game = $_POST['game_id']; // Sesuaikan dengan cara Anda mendapatkan ID game

// Periksa apakah game sudah ada di wishlist
$cek_query = mysqli_query($db_connection, "SELECT * FROM wishlist WHERE id_user = '$id_pemain' AND id_game = '$id_game'");
if (mysqli_num_rows($cek_query) == 0) {
    // Jika belum ada, tambahkan ke wishlist
    $tambah_query = mysqli_query($db_connection, "INSERT INTO wishlist (id_user, id_game) VALUES ($id_pemain, $id_game)");
    if ($tambah_query) {
        echo "<script>alert('Wishlist added successfully');window.location.replace('index.php'); </script>";
    } else {
        echo "<script>alert('Wishlist added Fail'); window.location.replace('index.php');</script>";
    }
} else {
    echo "<script>alert('Game is already in the Wishlist.'); window.location.replace('index.php');</script>";
}
?>