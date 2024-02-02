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

.button-continue-2 {
    padding: 5px 10px;
    background-color: #0074e4;
    color: #fff;
    border: none;
    border: 1px solid #ccc;
    border-radius: 5px;
    cursor: pointer;
}

.order-summary {
    margin-right: 50px;
    width: 25%;
}

.order-summary a {
    text-decoration: none;
    color: #fff;
}

    </style>
    </head>

    <body>
    <header>
        <a href="index.php"><img src="img/Epic Games Story.jpeg" alt="" height="30" width="30"></a>
        <img src="img/Down-Arrow.jpeg" alt="" height="15" width="15">
        <div id="vertikal-line"></div>
        <h1>STORE</h1>
        <a id="account-button" href="">Account</a>
        <a href="library_game.php">Library</a>

        <div class="container-account">
    <div class="account">
            <div class="account-item">
            <?php if(isset($_SESSION['login'])) { ?>
                <h2>Welcome <?=$_SESSION['fullname']?>, your login as <?=$_SESSION['user_type']?></h2>
                <img src="uploads/users/<?=$_SESSION['user_photo'];?>" height="100" width="100">
            
            <ul>
            <li><a href="change_photo.php?id=<?=$_SESSION['user_id'];?>">Change Photo</a></li>
            <li><a href="change_password.php">Change Password</a></li>
            <?php if($_SESSION['user_type'] == 'admin') :?>
            <li><a href="read_game.php">Edit Game</a></li>
            <?php endif;?>
            <li><a href="logout.php">Logout</a></li>
            
            <?php } else { ?>
                <li><a href="form_login.php">Login</a></li>
            <?php } ?>
            </ul>
            </div>
        </div>
    </div>
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
        <div style="color: #1b1b1b;" class="content-form">
                            <h1>Form Buy</h1>
                            <!-- Form login -->
                            <form action="transaksi.php" method="post" id="frmLogin">
                                <table>
                               <?php include "connection.php" ; // panggil koneksi
                            $id_game = $_GET['id']; // Sesuaikan dengan cara Anda mendapatkan ID game
                            $id_user = $_SESSION['user_id'];
                            $queryGame = "SELECT * FROM game WHERE id_game = '$_GET[id]'"; // tampilkan data di dalam database
                            $queryUser = "SELECT * FROM user WHERE id_user = '$id_user'"; // tampilkan data di dalam database
                            // run query
                            $game = mysqli_query($db_connection,$queryGame);

                            // extract data from query result
                            $data1 = mysqli_fetch_assoc($game);
                            $user = mysqli_query($db_connection,$queryUser);

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
                            <tr>
                                <td><p style="color: #1b1b1b;">Price : <?php echo $data1['harga']?> / <?= $harga_diskon . " " . "(". $diskon . "%)" ?></p></td>
                            </tr>
                            <tr>
                                <td><p style="color: #1b1b1b;">Money : <?php echo $data2['uang']?></p></td>
                            </tr>
                            <tr>
                                <td style="color: #1b1b1b;"> Metode Pembayaan</td>
                                <td>
                                    <select style="color: #333;
                                    padding: 5px 10px;
                                    border: 1px solid #ccc;
                                    border-radius: 5px;
                                    " name="metode_pembayaran" id="">
                                        <option style="padding: 5px 10px;
                                        background-color: #fff;
                                        border: none;
                                        cursor: pointer;
                                        " value="cash">Cash</option>
                                        <option style="padding: 5px 10px;
                                        background-color: #fff;
                                        border: none;
                                        cursor: pointer;
                                        " value="transfer">Transfer</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><p style="color: #1b1b1b;">Gak Punya uang ??</p></td>
                                <td><button style="padding: 5px 10px;
                                        background-color: #fff;
                                        border: none;
                                        border: 1px solid #ccc;
                                        border-radius: 5px;
                                        cursor: pointer;"><a style="text-decoration: none; color: #1b1b1b;" href="form_isi_uang.php?id=<?php echo $id_game?>">Isi Uang</a></button></td>
                            </tr>
                            
                                    <!-- <tr>
                                        <td><label for="">Email Address</label></td>
                                        <td><input type="email" name="email"></td>
                                    </tr>
                                     -->
                                    <!-- <tr>
                                        <td><label for="" style="color: #1b1b1b;">Username</label></td>
                                        <td><input type="text" name="username"></td>
                                    </tr>
                                
                                
                                    <tr>
                                        <td><label for="" style="color: #1b1b1b;">Password</label></td>
                                        <td><input type="password" name="password"></td>
                                    </tr> -->
                                
                                </table>

                                <div class="button-continue">
                                    <input class="button-continue-2" type="submit" name="transaksi" value="Continue">
                                    <input type="hidden" name="id_user" value="<?php echo $id_user?>">
                                    <input type="hidden" name="id_game" value="<?php echo $id_game?>">
                                    <input type="hidden" name="price" value="<?php echo $data1['harga']?>">
                                    <input type="hidden" name="money" value="<?php echo $data2['uang']?>">
                                    <input type="hidden" name="discount" value="<?php echo $data1['diskon']?>">
                                </div>
                                
                            </form>
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
        
<script src="js/script.js"></script>
    </body>
</html>