<?php 
    session_start();

    if (!isset($_SESSION['login'])) {
        echo "<script>alert('please login first'); window.location.replace('form_login_220057.php') ; </script>";
    }
?>

<html>
    <head>
    <title>Epic Games</title>
    <link rel="stylesheet" href="css/form_buy_style.css">
    <link rel="icon" href="img/epic-games-icon-web.jpeg">
    <style>
        .content-form {
    display: flex;
    flex-direction: column;
    -webkit-box-align: inherit;
    align-items: inherit;
    margin: 20px auto 0px;
    width: 100%;
    max-width: 561px;
    background-color: #fff;
    color: #1b1b1b;
}

/* .content-form .email {
    height: 35px;
}

.content-form .password {
    height: 85px;
} */

#frmLogin .button-continue {
    margin-top: 85px;
}

.content-form form {
    display: flex;
    flex-direction: column;
    margin-left: auto;
    margin-right: auto;
    width: 100%;
    max-width: 380px;
    margin-top: 20px;
    color: #1b1b1b;
}
.content-form label {
    color: #1b1b1b;
}

.order-summary {
    margin-right: 50px;
    width: 25%;
}

.order-summary a {
    text-decoration: none;
    color: #fff;
}

.detail {
    display: flex;
    flex-direction: column;
    /* justify-content: center; */
    align-items: center;
}

.button-continue-2 {
    padding: 5px 10px;
    background-color: #0074e4;
    color: #fff;
    border: none;
    border: 1px solid #ccc;
    border-radius: 5px;
    cursor: pointer;
}

    </style>
    </head>

    <body>
    <header>
        <a href="index.php"><img src="img/Epic Games Story.jpeg" alt="" height="30" width="30"></a>
        <img src="img/Down-Arrow.jpeg" alt="" height="15" width="15">
        <div id="vertikal-line"></div>
        <h1>STORE</h1>
    </header>

    <div class="container-discover">
        <!-- <div class="discover">
            <div class="icon-search">
                <img src="img/icon-search.png" alt="icon-search" height="50" width="50">
                <input type="text">
            </div>
            <div class="text">
                <h2>Discover</h2>
                <h2><a href="read_game.php">Browse</a></h2>
            </div>
            <div class="cart-whislist">
                <h2><a href="cart.php">cart</a></h2>
                <h2><a href="wishlist.php">Wishlist</a></h2>
            </div>
        </div> -->
        <div class="content-form">
                            <h1>Form Buy</h1>
                            <!-- Form login -->
                            <form action="isi_uang.php" method="post" id="frmLogin">
                                <table>

                                    <tr>
                                        <td><label for="">isi nominal Uang</label></td>
                                        <td><input type="number" name="uang"></td>
                                    </tr>
                                
                                </table>
                                
                            </form>
                            <?php include "connection.php" ; // panggil koneksi
                            $id_game = $_GET['id']; // Sesuaikan dengan cara Anda mendapatkan ID game
                            $id_user = $_SESSION['user_id'];
                            $query = "SELECT * FROM game WHERE id_game = '$_GET[id]'"; // tampilkan data di dalam database
                            $query2 = "SELECT * FROM user WHERE id_user = '$id_user'";
                            // run query
                            $game = mysqli_query($db_connection,$query);

                            // extract data from query result
                            $data1 = mysqli_fetch_assoc($game);
                            // run query
                            $user = mysqli_query($db_connection,$query2);

                            // extract data from query result
                            $data2 = mysqli_fetch_assoc($user);

                            try {
                                $query_discount = "SELECT diskon FROM game WHERE id_game = '$id_game'";
                                $result_discount = mysqli_query($db_connection, $query_discount);
                                $harga = $data1['harga'];
                
                                if ($result_discount) {
                                    $row_discount = mysqli_fetch_assoc($result_discount);
                
                                    // Periksa apakah $row_discount adalah null sebelum mengakses indeksnya
                                    if ($row_discount && isset($row_discount['diskon'])) {
                
                                        if ($row_discount > 0) {
                                            $diskon = $row_discount['diskon'];
                                            $harga_diskon = (int)$harga - ((int)$harga * (int)$diskon / 100);
                
                                        // echo "<td>IDR " . number_format($harga_diskon, 2) . " " . $diskon . "%</td>";
                                        }
                                    } else {
                                        // Tampilkan harga normal jika tidak ada diskon
                                        // echo "<td>Price: IDR " . number_format($harga, 2) . "</td>";
                                    }
                                } else {
                                    // Penanganan kesalahan saat mengambil data diskon
                                    throw new Exception("Error fetching discount: " . mysqli_error($db_connection));
                                }
                            } catch (Exception $e) {
                                // Tangkap dan tampilkan pesan kesalahan
                                echo "Error: " . $e->getMessage();
                            }

                            ?>
                            <div class="detail">
                            <p>Price : <?php echo $data1['harga']?> / <?= $harga_diskon . " " . "(". $diskon . "%)" ?></p>

                            <p>Money : <?php echo $data2['uang']?></p>

                            <div class="button-continue">
                                    <input class="button-continue-2" type="submit" name="isi_uang" value="Continue">
                                </div>
                            </div>

                            <a href=""></a>
                        </div>
                        <div class="order-summary">
                            <h1>Order Summary</h1>
                            <div class="game-list">
    <?php
    include "connection.php";

    $query = "SELECT * FROM game game WHERE id_game = '$id_game'";
    $games = mysqli_query($db_connection, $query);

    $i = 1;
    foreach ($games as $data) :
    ?>
        <div class="game-item">
            <div class="game-info">
                <img style="margin-right: 50px;" src="img/<?= $data['foto']?>" alt="foto" width="150" height="225">
                <h3><?php echo $data['nama_game']; ?></h3>
                <div class="game-info-2">
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    
</div>
                        </div>
    </div>
        
        
    </body>
</html>