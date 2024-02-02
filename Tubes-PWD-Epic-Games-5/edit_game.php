<?php 
    session_start();

    if (!isset($_SESSION['login'])) {
        echo "<script>alert('please login first'); window.location.replace('form_login.php') ; </script>";
    }

    if ($_SESSION['user_type'] != 'admin') {
        echo "<script>alert('Access Forbidden'); window.location.replace('index.php') ; </script>";
    }
    
    include "connection.php";
    include "search.php";

    if(isset($_SESSION['login'])) {
        $userid = $_SESSION['user_id'];
        $sql = "SELECT id_user, username, fullname, user_type, user_photo FROM user WHERE id_user = '$userid'";
        $result = mysqli_query($db_connection, $sql);
        $row = mysqli_fetch_assoc($result);
    }

    
?>
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
    </style>
    </head>
    <body>
    <header>
        <a href="index.php"><img src="img/Epic Games Story.jpeg" alt="" height="30" width="30"></a>
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
                <h2><a href="read_game.php">Browse</a></h2>
            </div>
            <div class="cart-whislist">
                <h2><a href="cart.php">Cart</a></h2>
                <h2><a href="wishlist.php">Wishlist</a></h2>
            </div>
        </div>
        <div class="content">
        <h3>Form Edit Game</h3>
    <?php 
    // panggil koneksi
        include "connection.php" ;

        // query database
        $query = "SELECT * FROM game WHERE id_game = '$_GET[id]'";
        // eksekusi query
        $game = mysqli_query($db_connection, $query);
        
        $data = mysqli_fetch_assoc($game) ;
    ?>

<form method="post" action="update_game.php">
            <table>
                <tr>
                    <td>Name Game</td>
                    <td><input type="text" name="name_game" value="<?php echo $data['nama_game'] ?>" required></td>
                </tr>
                <tr>
                    <td>Genre Game</td>
                    <td>
                        <select name="genre_game" id="genre_game">
                            <option value="">- Choose -</option>
                            <option value="action" <?php echo ($data['genre_game'] == 'action') ? 'selected' : '' ;?>>Action</option>
                            <option value="adventure"<?php echo ($data['genre_game'] == 'adventure') ? 'selected' : '' ;?>>Adventure</option>
                            <option value="rpg"<?php echo ($data['genre_game'] == 'rpg') ? 'selected' : '' ;?>>RPG</option>
                            <option value="strategy"<?php echo ($data['genre_game'] == 'strategy') ? 'selected' : '' ;?>>Strategy</option>
                            <option value="simulation"<?php echo ($data['genre_game'] == 'simulation') ? 'selected' : '' ;?>>Simulation</option>
                            <option value="puzzle"<?php echo ($data['genre_game'] == 'puzzle') ? 'selected' : '' ;?>>Puzzle</option>
                            <option value="sport"<?php echo ($data['genre_game'] == 'sport') ? 'selected' : '' ;?>>Sport</option>
                            <option value="FPS"<?php echo ($data['genre_game'] == 'FPS') ? 'selected' : '' ;?>>FPS</option>
                            <option value="survival"<?php echo ($data['genre_game'] == 'survival') ? 'selected' : '' ;?>>Survival</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>Developer</td>
                    <td><input type="text" name="developer" value="<?php echo $data['pengembang'] ?>" required></td>
                </tr>
                <tr>
                    <td>Release Date</td>
                    <td><input type="date" name="release_date"value="<?php echo $data['tanggal_rilis'] ?>" required></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="number" name="price" value="<?php echo $data['harga'] ?>" required></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name="description" id="" cols="30" rows="10"><?php echo $data['deskripsi'] ?></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type="submit" name="save" value="SAVE"></td>
                    <td><input type="reset" value="RESET"></td>
                    <td><input type="hidden" name="id_game" value="<?php echo $data['id_game'] ?>"></td>
                </tr>
            </table>
        </form>

        
        <p><a href="read_game.php">CANCEL</a></p>
        </div>

    </div>
    <script src="js/script.js"></script>
    </body>
</html>