<?php
	session_start();
	if(isset($_POST['upload'])) {  // check POST variable from FORM
		include "connection.php";  // call connection
		
		$folder = 'uploads/games/'; // targer folder for file upload
		
		if(move_uploaded_file($_FILES['new_photo']['tmp_name'], $folder . $_FILES['new_photo']['name']) && move_uploaded_file($_FILES['new_logo']['tmp_name'], $folder . $_FILES['new_logo']['name'])) {
			
			// success upload, get the photo name
			$photo = $_FILES['new_photo']['name'];
			$logo = $_FILES['new_logo']['name'];
			// make the query based on gamename
			$query = "UPDATE game SET foto='$photo',
                      logo = '$logo' WHERE id_game='$_GET[id]'";
		
			// run the query
			$upload = mysqli_query($db_connection,$query);
			
			if($upload) {
				// $_SESSION['game_photo'] = $photo;
				if($_POST['game_photo'] && $_POST['game_logo'] !== 'default.png') unlink($folder . $_POST['game_photo']); unlink($folder . $_POST['game_logo']); // delete the default or old photo
				// upload success massage
				echo "<script>alert('Photo Succesfully Changed !');window.location.replace('index.php');</script>";
			} else {
				// upload failde msg
				echo "<script>alert('Photo Failed to Change !');window.location.replace('game_photo.php?id=$_POST[game_id]');</script>";
			}	
		} else {
			// Failed upload massage
			echo "<script>alert('Photo Failed to Upload !');window.location.replace('game_photo.php?id=$_POST[game_id]');</script>";
		}
		
	}

?>