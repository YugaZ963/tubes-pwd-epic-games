<?php 
session_start();

include "connection.php";
$id_pemain = $_SESSION['user_id'];
$id_game = $_POST['game_id']; // Sesuaikan dengan cara Anda mendapatkan ID game

// Periksa apakah game sudah ada di wishlist
$cek_query = mysqli_query($db_connection, "SELECT * FROM keranjangbelanja WHERE id_user = '$id_pemain' AND id_game = '$id_game'");
$query = "SELECT id_keranjang_belanja FROM keranjangbelanja WHERE id_game = '$id_game'";
$result = mysqli_query($db_connection, $query);
$row_id_cart = mysqli_fetch_assoc($result);
$id_cart = $row_id_cart["id_keranjang_belanja"];
    $delete_query = mysqli_query($db_connection, "DELETE FROM keranjangbelanja WHERE id_keranjang_belanja = '$id_cart' ");
    if ($delete_query) {
        echo "<script>alert('Cart removed successfully');window.location.replace('index.php'); </script>";
    } else {
        echo "<script>alert('Cart removed Fail'); window.location.replace('index.php');</script>";
    }

?>