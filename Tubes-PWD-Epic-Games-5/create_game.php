<?php

// echo $_POST['nama'] . "<br>";
// echo $_POST['type'] . "<br>";
// echo $_POST['gender'] . "<br>";
// echo $_POST['age'] . "<br>";
// echo $_POST['owner'] . "<br>";
// echo $_POST['adress'] . "<br>";
// echo $_POST['phone'] . "<br>";

if (isset($_POST['kirim'])) { // check data dari form
    include "connection.php"; // panggil connection.php mysql
    // Dapatkan nilai checkbox
    // $selectedGenres = isset($_POST['genre_game']) ? $_POST['genre_game'] : array();

    // Masukkan nilai ke dalam database
    // Di sini, kita bisa menggunakan implode untuk menggabungkan nilai genre menjadi string
    $genre_game = implode(", ", $_POST['genre_game']);
    $query = "INSERT INTO game (nama_game, genre_game, pengembang, tanggal_rilis, harga, _status, deskripsi) VALUES ('$_POST[name_game]', '$genre_game', '$_POST[developer]' , '$_POST[release_date]', '$_POST[price]', '$_POST[status]', '$_POST[description]')" ;

    // run query
    $create = mysqli_query($db_connection, $query);

    if ($create) {
        // echo "<p>Pet added successfully !!</p>" ; // versi html
        echo "<script>alert('Game added successfully'); </script>"; // versi JS
    } else {
        // echo "<p>Pet add failed !!<p>" ; // versi html
        echo "<script>alert('Game add failed'); </script>" ; // versi JS
    }


}
?>

<!-- <p><a href="read.php">Back to Pet List</a><p> -->
<script>window.location.replace("read_game.php")</script> 
<!-- pindah lokasi -->