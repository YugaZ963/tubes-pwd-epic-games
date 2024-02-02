<?php 
    session_start();
    if(!isset($_SESSION['login'])) {
	    echo "<script>alert('Please Login First !');window.location.replace('form_login.php');</script>";
}
?>
<!doctype html>
<html>
<head>
	<title>Change Game	Photo</title>
	<link rel="stylesheet" href="css/styles.css">
	<link rel="icon" href="img/epic-games-icon-web.jpeg">
</head>
<body>
<header>
        <a href="index.php"><img src="img/Epic Games Story.jpeg" alt="" height="30" width="30"></a>
        <img src="img/Down-Arrow.jpeg" alt="" height="15" width="15">
        <div id="vertikal-line"></div>
        <h1><a href="index.php">STORE</a></h1>
    </header>
	<h3>Change Game Photo</h3>
	<?php
		// call connection php mysql
		include "connection.php";
		
		// make query SELECT FROM WHERE
		$query = "SELECT * FROM game WHERE id_game='$_GET[id]'";
		
		// run query
		$game = mysqli_query($db_connection,$query);
		
		// extract data from query result
		$data = mysqli_fetch_assoc($game);
	?>
	<!-- ecntype wajib digunakan jika pada form terdapat upload file -->
	<form action="game_photo_upload.php?id=<?php echo $data['id_game']?>" method="post" enctype="multipart/form-data">
	<table>
	<tr>
		<td></td>
		<td><img src="uploads/games/<?= $data['foto']; ?>" width="100" height="100"></td>
	</tr>
	<tr>
		<td>New Photo</td>
		<td>: <input type="file" name="new_photo" required /></td>
	</tr>
	<tr>
		<td>New Logo</td>
		<td>: <input type="file" name="new_logo" required /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;
			<input type="submit" name="upload" value="UPLOAD" />
			<input type="hidden" name="game_photo" value="<?=$data['foto']?>" />
			<input type="hidden" name="game_logo" value="<?=$data['logo']?>" />
			<input type="hidden" name="game_id" value="<?=$data['id_game']?>" />
		</td>
	</tr>
	</table>
	</form>
	<p><a href="index.php">CANCEL</a></p>
	<?php
		// Mendapatkan URL saat ini
		$currentUrl = $_SERVER['REQUEST_URI'];

		// Mencari dan mengganti nilai parameter 'id' dengan nilai apa pun
		$newUrl = preg_replace('/(\?|&)id=[^&]*/', '', $currentUrl);

		// Mengganti URL tanpa memuat ulang halaman
		echo "<script>history.pushState({}, null, '$newUrl');</script>";
	?>
</body>
</html>