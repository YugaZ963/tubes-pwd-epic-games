<?php

// echo $_POST['nama'] . "<br>";
// echo $_POST['type'] . "<br>";
// echo $_POST['gender'] . "<br>";
// echo $_POST['age'] . "<br>";
// echo $_POST['owner'] . "<br>";
// echo $_POST['adress'] . "<br>";
// echo $_POST['phone'] . "<br>";

if (isset($_POST['save'])) { // check data dari form
    include "connection.php"; // panggil connection.php mysql

    // sql query untuk update
    $query = "UPDATE game SET 
              nama_game = '$_POST[name_game]', 
              genre_game = '$_POST[genre_game]', 
              pengembang = '$_POST[developer]', 
              tanggal_rilis = '$_POST[release_date]', 
              harga = '$_POST[price]', 
              deskripsi = '$_POST[description]' 
              WHERE id_game = '$_POST[id_game]'; " ;

    // run query
    $update = mysqli_query($db_connection, $query);

    if ($update) {
        // echo "<p>Pet added successfully !!</p>" ; // versi html
        echo "<script>alert('Game updated successfully'); </script>"; // versi JS
    } else {
        // echo "<p>Game add failed !!<p>" ; // versi html
        echo "<script>alert('Game update failed'); </script>" ; // versi JS
    }


}
?>

<!-- <p><a href="read.php">Back to Pet List</a><p> -->
<script>window.location.replace("read_game.php")</script> 
<!-- pindah lokasi -->