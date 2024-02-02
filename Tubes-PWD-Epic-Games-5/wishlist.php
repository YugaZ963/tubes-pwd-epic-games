<?php 
    session_start();

    if (!isset($_SESSION['login'])) {
        echo "<script>alert('please login first'); window.location.replace('form_login.php') ; </script>";
    }
    include "connection.php";

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
        .game-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.game-item {
    /* border: 0px solid #ddd; */
    padding: 10px;
    border-radius: 5px;
    width: 100%;
    background-color: #202020;
}
.game-info {
    display: flex;
    flex-wrap: nowrap;
    gap: 10px;
}
.game-info h3 {
    margin-bottom: 10px;
    margin-right: 800px;
}

.game-info h3 a {
    color: white;
    text-decoration: none;
}

.button {
    display: flex;
    flex-direction: row;
    gap: 10px;
    padding: 5px;
}

.wishlist-button {
    width: 95%;
    height: 40px;
    font-size: 13px;
    background: #202020;
    color: #fff;
    padding-inline: 10px 25px;
    border: 1px solid #9a9a9a;
    /* border-radius: 30px; */
    outline: none;
    transition: 0.3s ease;
}

.wishlist-button:hover {
    background-color: #444444;
}

/* Tambahkan gaya lainnya sesuai kebutuhan */

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
            <li><a href="user_change_photo.php?id=<?=$_SESSION['user_id'];?>">Change Photo</a></li>
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
                <h2><a href="wishlist.php">Whislist</a></h2>
            </div>
        </div>
        <div class="content">
        <h1>Wishlist Game</h1>

<div class="game-list">
    <?php
    include "connection.php";

    $query = "SELECT * FROM wishlist AS w, game AS g WHERE w.id_user = '$_SESSION[user_id]' AND w.id_game = g.id_game";
    $games = mysqli_query($db_connection, $query);

    $i = 1;
    foreach ($games as $data) :
    ?>
        <div class="game-item">
            <div class="game-info">
                <img style="margin-right: 50px;" src="uploads/games/<?= $data['foto']?>" alt="foto" width="150" height="225">
                <h3><a href="detail_game.php?id=<?= $data['id_game'] ?>"><?php echo $data['nama_game']; ?></a></h3>
                <div class="game-info-2">
                <p style="margin-bottom: 200px;">Price : <?= number_format($data['harga'])?></p>
                <div class="button">
                <form action='remove_from_cart.php' method='post'>
                    <button class="wishlist-button" name="wishlist">Remove</button>
                    <input type="hidden" name="game_id" value="<?= $data["id_game"]?>"/>
                </form>
                </div>
                
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