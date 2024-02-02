<?php 
    session_start();

    if (!isset($_SESSION['login'])) {
        echo "<script>alert('please login first'); window.location.replace('form_login_220057.php') ; </script>";
    }
?>

<html>
    <head>
    <title>Epic Games</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/epic-games-icon-web.jpeg">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f4;
        }

        .container-genre-card {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            /* overflow-x: scroll; */
            gap: 1rem;
            margin-bottom: 100px;
            transition: transform 0.5s ease;
        }

        .genre-card {
            max-width: 300px;
            width: 135px;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            /* margin: 20px auto; */
            color: #fff;
            height: 100%;
            background-color: #121212;
            /* border: 1px solid #ddd; */
            /* border-radius: 8px; */
            /* overflow: hidden; */
            /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); */
        }

        .genre-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            justify-content: center;
            margin: auto;
        }

        .genre-info {
            padding: 20px;
        }

        .genre-head-title {
            text-align: center;
        }

        .genre-title a{
            font-size: 18px;
            margin-bottom: 10px;
            color: #fff;
            text-decoration: none;
            text-align: center;
        }

        .container-product-card {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            /* overflow-x: scroll; */
            gap: 1rem;
            margin-bottom: 100px;
            transition: transform 0.5s ease;
        }

        .product-card {
            max-width: 300px;
            max-height: 326px;
            width: 135px;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            color: #fff;
            /* margin: 20px auto; */
            /* height: 100%; */
            background-color: #121212;
            /* border: 1px solid #ddd; */
            /* border-radius: 8px; */
            /* overflow: hidden; */
            /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); */
        }

        .container-product-card a {
            color: #fff;
            text-decoration: none;
        }
        .container-genre-card a {
            color: #fff;
            text-decoration: none;
        }
        
        .product-info .product-title a{
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            margin-bottom: 10px;
            color: #fff;
            text-align: center;
        }

        .product-image {
            width: 127px;
            height: 169px;
            object-fit: cover;
            justify-content: center;
            margin: auto;
        }

        .product-info {
            padding: 20px;
        }

        .product-head-title {
            text-align: center;
        }

        .content {
            margin: 0 auto;
            background-color: #121212;
        }

        .content .product-card a {
            background-color: #121212;
        }

        .content table {
            padding-bottom: 50px;
        }

        
        .arrow-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 24px;
            cursor: pointer;
            background: none;
            border: none;
            outline: none;
            color: #3498db;
        }

        .arrow-left {
            left: 10px;
        }

        .arrow-right {
            right: 10px;
        }

        .icon-search {
            background-color: #121212;
        }

        .show {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;
        }
        .show .button-show{
            height: 20px;
        }

        .button-show {
                width: 15%;
                height: 30px;
                font-size: 13px;
                background: #121212;
                color: #fff;
                padding-inline: 10px 25px;
                border: 1px solid #9a9a9a;
                border-radius: 5px;
                outline: none;
                transition: 0.3s ease;
        }

        .button-show:hover {
            background-color: #383838;
        }

        .button-show a {
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
        <h1>Game List</h1>
        <!-- <p><a href="add_game.php">Add New Game</a></p> -->
        
        <h2 class="product-head-title">Popular Genre</h2>
        <div class="scrollable-container">
        <button class="arrow-btn arrow-left" onclick="scrollProducts(-1)">❮</button>
        <div class="container-genre-card" style="transform: translateX(0px);">
        <a href="genre_action.php">
        <div class="genre-card">
            <img class="genre-image" src="uploads/users/default.png" alt="genre Image">
            <div class="genre-info">
                <h3 class="genre-title">Action</h3>
            </div>
        </div>
        </a>
        <a href="genre_adventure.php">
        <div class="genre-card">
            <img class="genre-image" src="uploads/users/default.png" alt="genre Image">
            <div class="genre-info">
                <h3 class="genre-title">Adventure</h3>
            </div>
        </div>
        </a>
        <a href="genre_rpg.php">
        <div class="genre-card">
            <img class="genre-image" src="uploads/users/default.png" alt="genre Image">
            <div class="genre-info">
                <h3 class="genre-title">RPG</h3>
            </div>
        </div>
        </a>
        <a href="genre_strategy.php">
        <div class="genre-card">
            <img class="genre-image" src="uploads/users/default.png" alt="genre Image">
            <div class="genre-info">
                <h3 class="genre-title">Strategy</h3>
            </div>
        </div>
        </a>
        <a href="genre_simulation.php">
        <div class="genre-card">
            <img class="genre-image" src="uploads/users/default.png" alt="genre Image">
            <div class="genre-info">
                <h3 class="genre-title">Simulation</h3>
            </div>
        </div>
        </a>
        <a href="genre_puzzle.php">
        <div class="genre-card">
            <img class="genre-image" src="uploads/users/default.png" alt="genre Image">
            <div class="genre-info">
                <h3 class="genre-title">Puzzle</h3>
            </div>
        </div>
        </a>
        <a href="genre_sport.php">
        <div class="genre-card">
            <img class="genre-image" src="uploads/users/default.png" alt="genre Image">
            <div class="genre-info">
                <h3 class="genre-title">Sport</h3>
            </div>
        </div>
        </a>
        <a href="genre_fps.php">
        <div class="genre-card">
            <img class="genre-image" src="uploads/users/default.png" alt="genre Image">
            <div class="genre-info">
                <h3 class="genre-title">FPS</h3>
            </div>
        </div>
        </a>
        <a href="genre_survival.php">
        <div class="genre-card">
            <img class="genre-image" src="uploads/users/default.png" alt="genre Image">
            <div class="genre-info">
                <h3 class="genre-title">Survival</h3>
            </div>
        </div>
        </a>
        </div>
        <button class="arrow-btn arrow-right" onclick="scrollProducts(1)">❯</button>
            
        </div>
        <div class="show">
        <p>Show: All game</p>
            <button class="button-show"><a href="new_release.php">New Release</a></button>
            <button class="button-show"><a href="top_player_rated.php">Top Player Rated</a></button>
            <button class="button-show"><a href="most_played.php">Most Played</a></button>
        </div>
        
        <?php 
        include "connection.php" ; // panggil koneksi
        $query = "SELECT * FROM game"; // tampilkan data di dalam database
        $games = mysqli_query($db_connection, $query); // eksekusi query

        $data_game1 = mysqli_fetch_assoc($games);

        
        ?>
        <div class="container-product-card">
            <?php foreach ($games as $dg1) :?>
            <a href="detail_game.php?id=<?php echo $dg1['id_game']?>">
        <div class="product-card">
            <img class="product-image" src="uploads/games/<?= $dg1['foto']?>" alt="Product Image">
            <div class="product-info">
                <h3 class="product-title"><?php echo $dg1['nama_game']?></h3>
                <h4><?php echo $dg1['harga']?></h4>
            </div>
        </div>
        </a>
        <?php endforeach;?>
        </div>
        

    </div>
    </div>
    <script src="js/script.js">
        let scrollIndex = 0;

        function scrollProducts(direction) {
            const scrollableContent = document.querySelector('.container-product-card');
            const cardWidth = document.querySelector('.product-card').offsetWidth + 20; // Including margin
            scrollIndex += direction;
            scrollIndex = Math.max(0, Math.min(scrollIndex, 2)); // Adjust the number based on the number of products
            scrollableContent.style.transform = `translateX(${-scrollIndex * cardWidth}px)`;
        }
    </script>
    </body>
</html>