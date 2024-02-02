<?php 
    session_start();
    
    include "connection.php";
        $id_game = $_GET['id'];
        $id_user = $_SESSION['user_id'];
    if (!isset($_SESSION['login'])) {
        echo "<script>alert('please login first'); window.location.replace('form_login.php') ; </script>";
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Epic Games</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="icon" href="img/epic-games-icon-web.jpeg">
        <style>
            .content {
                color: rgb(245, 245, 245);
                background: rgb(18, 18, 18);
                position: relative;
            }

            .event-1 {
                margin-bottom: 50px;
                position: relative;
                display: flex;
                align-items: stretch;
                justify-content: space-evenly;
            }

            .event-1-sub-1 img,
            .event-1-sub-2 img,
            .event-1-sub-3 img {
                width: 251.67px;
                height: 141.56px;
                border-radius: 15px;
            }

            .event-2 {
                margin-bottom: 50px;
                position: relative;
                display: flex;
                /* align-items: stretch; */
                justify-content: space-evenly;
                margin: 0 auto;
            }

            .event-2-sub-1 {
                position: relative;
                /* overflow: hidden; */
                height: 361.69px;
                width: 643px;
                background-color: #efefef;
                /* -webkit-flex: 1;
                -ms-flex: 1; */
                /* flex: 1; */
                /* -webkit-flex-basis: calc(100% - (160px + 16px));
                -ms-flex-preferred-size: calc(100% - (160px + 16px)); */
                /* flex-basis: calc(100% - (160px + 16px)); */
                border-radius: 16px;
                /* margin: 0 auto; */
                display: flex;

            }

            .event-2-sub-2 {
                font-weight: 400;
                /* -webkit-flex-basis: 160px;
                -ms-flex-preferred-size: 160px; */
                flex-basis: 160px;
                display: flex;
                /* -webkit-flex-direction: column;
                -ms-flex-direction: column; */
                flex-direction: column;
                /* -webkit-box-flex: 0;
                -webkit-flex-grow: 0;
                -ms-flex-positive: 0; */
                flex-grow: 0;
                /* -webkit-flex-shrink: 1;
                -ms-flex-negative: 1; */
                flex-shrink: 1;
                height: 361.69px;
                width: 160px;
                background-color: #efefef;
            }

            .detail-game {
                display: flex;
                justify-content: center;
            }

            .image {
                margin-right: 80px;
            }

            .container-button {
                margin-bottom: 100px;
                display: flex;
                flex-direction: column;
                gap: 10px;
            }

            .wishlist-button,
            .cart-button,
            .buy-button {
                width: 100%;
                height: 30px;
                font-size: 13px;
                background: #121212;
                color: #fff;
                padding-inline: 10px 25px;
                border: 1px solid #9a9a9a;
                /* border-radius: 30px; */
                outline: none;
                transition: 0.3s ease;
            }

            .wishlist-button:hover,
            .cart-button:hover,
            .buy-button:hover {
                background-color: #383838;

            }

            .buy-button a {
                text-decoration: none;
                color: #fff;
            }
        </style>
    </head>
    <body>
    <header>
        <img src="img/Epic Games Story.jpeg" alt="" height="30" width="30">
        <img src="img/Down-Arrow.jpeg" alt="" height="15" width="15">
        <div id="vertikal-line"></div>
        <h1><a href="index.php">STORE</a></h1>
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
        <div class="discover">
        <div class="icon-search">
                <img src="img/icon-search.png" alt="icon-search" height="50" width="50">
                <form action="search.php" method="post">
                <input type="text" name="keyword" id="keyword" placeholder="Search Store" autocomplete="off" class="input-field">
                <button type="submit" name="cari" class="button-box">Cari</button>
                <input type="hidden" name="cari">
                <input type="hidden" name="game_id" value="<?= $data01["id_game"]?>"/>
                <input type="hidden" name="user_id" value="<?= $_SESSION["user_id"]?>"/>
                </form>
            </div>
            <div class="text">
                <h2><a href="index.php">Discover</a></h2>
                <h2><a href="daftar_game.php">Browse</a></h2>
            </div>
            <div class="cart-whislist">
                <h2><a href="cart.php">Cart</a></h2>
                <h2><a href="wishlist.php">Wishlist</a></h2>
            </div>
        </div>
        <div class="content">
        <?php 
        
        $queryGame = "SELECT * FROM game WHERE id_game = '$_GET[id]'";

        // run query
        $game = mysqli_query($db_connection,$queryGame);

        // extract data from query result
        $data1 = mysqli_fetch_assoc($game);
        // query 1 tabel
        // $queryMed = "SELECT * FROM medicals_220057 WHERE pet_id_220057 = '$_GET[pet_id]'";

        // query 2 tabel

        ?>
        <!-- <h1>Detail Game</h1> --><br>
        <h2 style="text-align: center;"><?= $data1['nama_game']?></h2>

        
        <div class="detail-game">
            <!-- Image -->
            <div class="image">
                <img src="uploads/games/<?= $data1['foto']?>"
                alt="<?= $data1['nama_game']?>" width="536" height="303"/>
                <p style="max-width: 536px;"><?php echo $data1['deskripsi']?></p>
            </div>
            <?php 
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
            <!-- Name and Developer -->
            <div class="detail">
                <img src="uploads/games/<?php echo $data1['logo']?>" alt="<?php echo $data1['nama_game']?>" width="100" height="100" style="margin-bottom: 100px;">
                
                <?php if ($row_discount && isset($row_discount['diskon'])) { ?>
                <p>IDR <?= number_format($data1['harga'])?> / IDR <?= number_format($harga_diskon) . " " . "(". $diskon . "%)" ?> </p>
            <?php } else { ?>
                <p>: <?=$data1['harga']?></p>
            <?php } ?>
                <div class="container-button" style="margin-bottom: 100px;">
                        <form method="post" action="add_to_wishlist.php">
                            <td><button class="wishlist-button" name="wishlist">Add Wishlist</button></td>
                            <input type="hidden" name="game_id" value="<?= $data1["id_game"]?>"/>
                            </form>
                            <form method="post" action="add_to_cart.php">
                            <td><button class="cart-button" name="cart">Tambahkan ke cart</button></td>
                            <input type="hidden" name="game_id" value="<?= $data1["id_game"]?>"/>
                            </form>
                            <?php 
                                // Ambil status pembelian
                                try {
                                    $query_status = "SELECT status_pembelian FROM transaksi WHERE id_user = '$id_user' AND id_game = '$id_game'";
                                $result_status = mysqli_query($db_connection, $query_status);
                                if ($result_status) {
                                    $row_status = mysqli_fetch_assoc($result_status);
                            
                                    // Periksa apakah $row_status adalah null sebelum mengakses indeksnya
                                    if ($row_status && isset($row_status['status_pembelian'])) {
                                        $status_pembelian = $row_status['status_pembelian'];
                            
                                        // Periksa status pembelian
                                        if ($status_pembelian == 1) {
                                            // Game sudah dibeli, sesuaikan tampilan tombol atau sembunyikan
                                            // echo "<button disabled>Sold Out</button>";
                                        } else {
                                            echo "<form action='form_buy.php' method='post'>
                                                <td><button><a href='form_buy.php?id=$id_game'>Buy Now</a></button></td>
                                                <input type='hidden' name='game_id' value='$data1[id_game]'/>
                                            </form>";
                                        }
                                    } else {
                                        // Penanganan kesalahan jika indeks tidak ditemukan atau null
                                        echo "<form action='form_buy.php' method='post'>
                                                <td><button class='buy-button'><a href='form_buy.php?id=$id_game'>Buy Now</a></button></td>
                                                <input type='hidden' name='game_id' value='$data1[id_game]'/>
                                            </form>";
                                    }
                                } else {
                                    // Penanganan kesalahan saat mengambil status pembelian
                                    echo "Error fetching purchase status: " . mysqli_error($db_connection);
                                }
                            } catch (Exception $e) {
                                // Tangkap dan tampilkan pesan kesalahan
                                echo "Error: " . $e->getMessage();
                            }
                            ?>
                    </div>
                            <div style="display: flex; flex-direction: row; gap: 25px; border-bottom: 1px solid #2a2a2a;" class="genre-game">
                                <p>Genre Game </p>
                                <p><?php echo $data1['genre_game']?></p>
                            </div>
                            <!-- <hr> -->
                            <div style="display: flex; flex-direction: row; gap: 25px; border-bottom: 1px solid #2a2a2a;" class="developer">
                                <p>Developer</p>
                                <p><?php echo $data1['pengembang']?></p>
                            </div>
                            <!-- <hr> -->
                            <div style="display: flex; flex-direction: row; gap: 25px; border-bottom: 1px solid #2a2a2a;" class="release-date">
                                <p>Release Date</p>
                                <p><?php echo $data1['tanggal_rilis']?></p>
                            </div>
                            
                </div>
        </div>
            
            
        <!-- <p><a href="">Add New Record</a></p> -->
        
        <p><a href="daftar_game.php">Back to Game List</a></p>
        </div>

    </div>
    <script src="js/script.js"></script>
    </body>
</html>