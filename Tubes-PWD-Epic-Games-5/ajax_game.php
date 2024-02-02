<?php 
include '../connection.php';

$keyword = $_GET["keyword"];
$query_ajax = "SELECT * FROM game 
                WHERE 
                nama_game LIKE '%$keyword%' OR
                genre_game LIKE '%$keyword%' OR
                pengembang LIKE '%$keyword%' OR
                tanggal_rilis LIKE '%$keyword%' OR
                harga LIKE '%$keyword%' OR
                deskripsi LIKE '%$keyword%'";

$game = mysqli_query($db_connection, $query_ajax);

?>

<table border="1" style="width: 500px;">
            <tr>
                <th>No</th>
                <th>Name Game</th>
                <th>Genre Game</th>
                <th>Developer</th>
                <th>Release Date</th>
                <th>Price</th>
                <!-- <th>Description</th> -->
            </tr>
            <?php
            include "../connection.php" ; // panggil koneksi
            $query = "SELECT * FROM game"; // tampilkan data di dalam database
            $games = mysqli_query($db_connection, $query); // eksekusi query

            $i = 1 ; // memberikan nomor
            foreach ($games as $data) : // looping untuk menampilkan data dalam database
            ?>
            <tr>
                <td align="center"><?php echo $i++; ?></td>
                <td align="center"><a href="detail_game.php?id=<?=$data['id_game']?>"><?php echo $data['nama_game']; ?></a></td>
                <td align="center"><?php echo $data['genre_game']; ?></td>
                <td align="center"><?php echo $data['pengembang']; ?></td>
                <td align="center"><?php echo $data['tanggal_rilis']; ?></td>
                <td align="center">IDR <?php echo $data['harga']; ?></td>
                
            </tr>
            <tr>
                <!-- <td>Description</td> -->
                <td align="center" colspan="6"><?php echo $data['deskripsi']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>