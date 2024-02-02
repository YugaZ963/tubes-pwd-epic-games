<?php 
session_start();

include "connection.php";
$id_pemain = $_SESSION['user_id'];
$id_game = $_POST['game_id']; // Sesuaikan dengan cara Anda mendapatkan ID game

// Periksa apakah game sudah ada di wishlist
$cek_query = mysqli_query($db_connection, "SELECT * FROM wishlist WHERE id_user = '$id_pemain' AND id_game = '$id_game'");
$query = "SELECT id_wishlist WHERE id_game = '$id_game'";
$result = mysqli_query($db_connection, $query);
$row_id_wishlist = mysqli_fetch_assoc($result);
$id_wishlist = $row_id_wishlist["id_wishlist"];
if (mysqli_num_rows($cek_query) == 0) {
    // Jika belum ada, tambahkan ke wishlist
    $delete_query = mysqli_query($db_connection, "DELETE FROM wishlist WHERE id_wishlist = '$id_wishlist' ");
    if ($delete_query) {
        echo "<script>alert('Wishlist removed successfully');window.location.replace('index.php'); </script>";
    } else {
        echo "<script>alert('Wishlist removed Fail'); window.location.replace('index.php');</script>";
    }
} else {
    echo "<script>alert('Game is already remove from the Wishlist.'); window.location.replace('index.php');</script>";
}
?>