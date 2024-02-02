<?php 
    session_start();

    if (!isset($_SESSION['login'])) {
        echo "<script>alert('please login first'); window.location.replace('form_login.php') ; </script>";
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
    <!-- <link rel="stylesheet" href="css/index_style.css"> -->
    <?php echo "<link rel='stylesheet' href='css/styles.css?".mt_rand()."'>";?>
    <link rel="icon" href="img/epic-games-icon-web.jpeg">
    <?php 
        $query01 = "SELECT * FROM game ";
        $result01 = mysqli_query($db_connection,$query01);
        $data01 = mysqli_fetch_assoc($result01);
        
        $query03 = "SELECT * FROM game WHERE id_game = '$data01[id_game]' ORDER BY RAND() LIMIT 1;
        ";
        $result03 = mysqli_query($db_connection,$query03);
        $data03 = mysqli_fetch_assoc($result03);
        ?>
    <style>
        .content {
        color: rgb(245, 245, 245);
        background: rgb(18, 18, 18);
        position: relative;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
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
        justify-content: center;
        /* margin: 0 auto; */
        margin-bottom: 25px;
    }
    .event-2 .-sub-1 .background-image{
        position: relative;
        /* overflow: hidden; */
        /* height: 361.69px; */
        width: 643px;
        background-color: #121212;
        color: #efefef;
        display: flex;
        justify-content: start;
        /* -webkit-flex: 1;
        -ms-flex: 1; */
        /* flex: 1; */
        /* -webkit-flex-basis: calc(100% - (160px + 16px));
        -ms-flex-preferred-size: calc(100% - (160px + 16px)); */
        /* flex-basis: calc(100% - (160px + 16px)); */
        /* margin: 0 auto; */
        /* display: flex; */
        
        background-image: url(img/alan-wake-cover.png);
        /* background-position: center; */
        background-repeat: no-repeat;
        background-size: cover;
        /* background-position: center; Untuk memposisikan gambar di tengah */
        border-radius: 15px; /* Menetapkan border radius yang diinginkan */
        overflow: hidden; /* Agar gambar sesuai dengan border radius */
        align-items: center;
    }

    .event-2 .-sub-1 .button a{
        color: #121212;
    }
    .event-2 .-sub-1 a {
        text-decoration: none;
        color: #fff;
    }

    .event-2 .-sub-1 .content {
        justify-content: center;
        padding: 8px;
        text-align: left;
        width: inherit;
        height: inherit;
    }

    #container-search {
    display: flex;
    justify-content: center;
    }

    .event-2 .-sub-2 {
        font-weight: 400;
        /* -webkit-flex-basis: 160px;
        -ms-flex-preferred-size: 160px; */
        display: flex;
        /* -webkit-flex-direction: column;
        -ms-flex-direction: column; */
        flex-direction: column;
        /* -webkit-box-flex: 0;
        -webkit-flex-grow: 0;
        -ms-flex-positive: 0; */
        /* -webkit-flex-shrink: 1;
        -ms-flex-negative: 1; */

        width: 160px;
        background-color: #121212;
    }

    .-sub-2 ul a {
        text-decoration: none;
        color: #fff;
    }

    .-sub-2-content {
        display: flex;
        flex-direction: row;
        /* align-items: center;
        justify-content: center; */
        text-align: justify;
        flex-wrap: wrap;
        align-items: center;
        gap: 25px;
        flex-flow: row;
    }
    .-sub-2-content ul, li{
        list-style-type: none;

    }

    .-sub-2-content-title {
        display: flex;
        flex-direction: column;
    }

    .event-3 {
        margin-bottom: 50px;
        position: relative;
        display: flex;

        /* align-items: stretch; */
        justify-content: space-evenly;
        margin: 0 auto;
        margin-top: 30px;
    }

    .event-3-container {
        list-style: outside none none;
        margin: 0px;
        padding: 0px;
        display: flex;
        /* -webkit-box-pack: start; */
        justify-content: flex-start;
        /* -webkit-box-align: stretch; */
        align-items: stretch;
        width: auto;
    }

    .event-3-container .list {
        display: flex;
        width: 100%;
        padding: 0px 8px;

    }

    .event-3-container .list-1 {
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .event-3 .listhead-1 {
        display: flex;
        /* -webkit-box-align: center; */
        align-items: center;
        /* -webkit-box-pack: justify; */
        justify-content: space-between;
        /* margin-bottom: 15px; */
        min-height: 30px;
    }

    .event-3 .listhead-1 h4 {
        margin-right: 5px;
    }

    .event-3 .listhead-1 button {
        width: fit-content;
        height: fit-content;
    }

    .listcontent-1 {
        list-style: outside none none;
        margin: 0px;
        padding: 0px;
        width: 100%;
        flex: 1 1 0%;
        display: flex;
        flex-direction: column;
        /* -webkit-box-pack: justify; */
        justify-content: space-between;
    }

    .container-sub-1 img {
        margin-right: 30px;
    }

    .listcontent-1 .sub-1 .container-sub-1 {
        display: flex;
        /* -webkit-box-pack: start; */
        justify-content: flex-start;
        /* -webkit-box-align: center; */
        align-items: center;
    }


    .sub-1-label-content .container-discount {
        background-color: #0074e4;
        padding: 5px;
        border-radius: 3px;
        width: fit-content;
        margin-right: 5px;
    }

    .sub-1-label-content .price {
        /* display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox; */
        display: flex;
        /* -webkit-flex-direction: row; */
        /* -ms-flex-direction: row; */
        flex-direction: column;
        /* -webkit-box-pack: end; */
        /* -ms-flex-pack: end; */
        /* -webkit-justify-content: flex-end; */
        justify-content: flex-end;
        /* -webkit-align-items: center; */
        /* -webkit-box-align: center; */
        /* -ms-flex-align: center; */
        align-items: center;
        /* -webkit-box-flex-wrap: wrap; */
        /* -webkit-flex-wrap: wrap; */
        /* -ms-flex-wrap: wrap; */
        flex-wrap: wrap;
    }

    .sub-1-label-content .price p {
        margin: 0;
        font-size: 10px;
    }

    .sub-1-label-content {
        display: flex;
    }

    .status-list {
        display: flex;
        flex-direction: row;
        justify-content: center;
    }

    .container-button-wishlist {
        display: flex;
        justify-content: center;
        align-items: center;
        /* height: 100vh; */
    }

    .wishlist-button {
        padding: 10px 20px;
        background-color: #121212;
        color: white;
        border: 1px solid #333;
        border-radius: 5px;
        border-color: #fff;
        cursor: pointer;
        margin-right: 15px;
        transition: background-color 0.3s ease;
    }

    .cart-button {
        padding: 10px 20px;
        background-color: #121212;
        color: white;
        border: 1px solid #333;
        border-color: #fff;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .cart-button:hover,
    .wishlist-button:hover {
        background-color: #383838;
    }

    .status-list {
        gap: 25px;
        
    }

    .status-list ul a {
        text-decoration: none;
        color: #fff;
    }
    .status-list span:not(:last-child){
        border-right: 1px solid #929292;
        padding-right: 10px;
    }

    .status-list-head {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 90px;
    }
    .status-list-head button{
        height: 25px;
    }

    .status-list-content {
        display: flex;
        flex-direction: row;
        /* align-items: center;
        justify-content: center; */
        text-align: justify;
        flex-wrap: wrap;
        align-items: center;
        gap: 25px;
        flex-flow: row;
    }
    .status-list-content ul, li{
        list-style-type: none;

    }

    .button-status {
                width: 32%;
                height: 50px;
                font-size: 13px;
                background: #121212;
                color: #fff;
                padding-inline: 10px 25px;
                border: 1px solid #9a9a9a;
                border-radius: 5px;
                outline: none;
                transition: 0.3s ease;
    }

    .button-status:hover {
        background-color: #383838;
    }

    .button-status a {
        text-decoration: none;
        color: #fff;
    }

    .status-list-content-title {
        display: flex;
        flex-direction: column;
    }
    </style>
</head>

<body>
    <?php 
    

    ?>
    <header class="header">
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
                <h2><a href="wishlist.php">Wishlist</a></h2>
            </div>
        </div>
        <div class="content">
            <!-- <span>
                <div class="event-1" >
                    <div class="event-1-sub-1"><img src="img/event-1.jpg" alt=""></div>
                    <div class="event-1-sub-2"><img src="img/event-2.jpg" alt=""></div>
                    <div class="event-1-sub-3"><img src="img/event-3.jpg" alt=""></div>
                </div>
            </span> -->
            
            <span id="container-search">
                <div class="event-2">
                    
                    <div class="event-2 -sub-1" style="width: 643px; margin-right: 0;">
                        <a href="detail_game.php?id=<?= $data01['id_game'] ?>">
                    <div class="background-image">
                        <?php 
                        $query02 = "SELECT * FROM game WHERE id_game = '$data01[id_game]' ORDER BY RAND() LIMIT 1;
                        ";
                        $result02 = mysqli_query($db_connection,$query02);
                        $data02 = mysqli_fetch_assoc($result02);

                        ?>
                            <div class="-sub-1-content">
                            <img src="img/Alan_Wake_II_logo.png" alt="alan-wake-logo" width="100" height="50">
                            <p>Now Available</p>
                            <p>View</p>
                            <div class="button">
                                <button><a href="form_buy.php">Buy Now</a></button>
                                <button><a href="add_to_wishlist.php">Add Wishlist</a></button>
                            </div>
                        </div>
                    </div>
                </a>
                        
                    </div>
                    <div class="event-2 -sub-2" style="flex-direction: column; margin-left: 0; justify-content: flex-start;">
                        <?php 
                        $jumlahData = 5;
                        $query2 = "SELECT * FROM game LIMIT $jumlahData";
                            $nama_games = mysqli_query($db_connection, $query2);

                            foreach ($nama_games as $data2) :
                        ?>
                        <ul>
                    <a href="detail_game.php?id=<?= $data2['id_game'] ?>">
                    <li class="-sub-2-content">
                        <img src="uploads/games/<?php echo $data2['foto']?>" alt="" height="50" width="25">
                        <div class="-sub-2-content-title">
                        <p><?php echo $data2['nama_game']?></p>
                        </div>
                    </li>
                    </a>
                </ul>
                        <?php endforeach; ?>
                    </div>
                </div>
            </span>
            <div class="status-list">
            <span>
                <div class="status-list-head">
                <h4>New Release</h4>
                <button class="button-status"><a href="new_release.php">View All</a></button>
                </div>
                <?php 
                $query3 = "SELECT * FROM game WHERE _status LIKE '%New Release%'";
                $nama_games2 = mysqli_query($db_connection, $query3);
                
                foreach ($nama_games2 as $data3) :
                ?>
                <ul>
                    <a href="detail_game.php?id=<?= $data3['id_game'] ?>">
                    <li class="status-list-content">
                        <img src="uploads/games/<?php echo $data3['foto']?>" alt="alan-wake" height="100" width="50">
                        <div class="status-list-content-title">
                        <p><?php echo $data3['nama_game']?></p>
                        <p>IDR. <?= $data3['harga'] ?></p>
                        </div>
                    </li>
                    </a>
                </ul>
                <?php endforeach; ?>
            </span>
            <span >
                <div class="status-list-head">
                <h4>Most Played</h4>
                <button class="button-status"><a href="most_played.php">View All</a></button>
                </div>
                <?php 
                $query4 = "SELECT * FROM game WHERE _status LIKE '%Most Played%'";
                $nama_games3 = mysqli_query($db_connection, $query4);
                
                foreach ($nama_games3 as $data4) :
                ?>
                <ul>
                    <a href="detail_game.php?id=<?= $data4['id_game'] ?>">
                    <li class="status-list-content">
                        <img src="uploads/games/<?php echo $data4['foto']?>" alt="alan-wake" height="100" width="50">
                        <div class="status-list-content-title">
                        <p><?php echo $data4['nama_game']?></p>
                        <p>IDR. <?= $data4['harga'] ?></p>
                        </div>
                    </li>
                    </a>
                </ul>
                <?php endforeach; ?>
            </span>
            <span>
                <div class="status-list-head">
                    <h4 style="display: flex;
    flex-shrink: 0;">Top Player Rated</h4>
                    <button class="button-status"><a href="top_player_rated.php">View All</a></button>
                </div>
                <?php 
                $query5 = "SELECT * FROM game WHERE _status LIKE '%Top Player Rated%'";
                $nama_games4 = mysqli_query($db_connection, $query5);
                
                foreach ($nama_games4 as $data5) :
                ?>
                <ul>
                    <a href="detail_game.php?id=<?= $data5['id_game'] ?>">
                    <li class="status-list-content">
                        <img src="uploads/games/<?php echo $data5['foto']?>" alt="alan-wake" height="100" width="50">
                        <div class="status-list-content-title">
                        <p><?php echo $data5['nama_game']?></p>
                        <p>IDR. <?= $data5['harga'] ?></p>
                        </div>
                    </li>
                    </a>
                </ul>
                <?php endforeach; ?>
            </span>
            </div>

    <script src="js/script.js"></script>
</body>

</html>