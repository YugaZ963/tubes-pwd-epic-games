<?php
	session_start();
	if(isset($_POST['upload'])) {  // check POST variable from FORM
		include "connection.php";  // call connection
		
		$folder = 'uploads/users/'; // targer folder for file upload
		
		if(move_uploaded_file($_FILES['new_photo']['tmp_name'], $folder . $_FILES['new_photo']['name'])) {
			
			// success upload, get the photo name
			$photo = $_FILES['new_photo']['name'];
			// make the query based on username
			$query = "UPDATE user SET user_photo='$photo' WHERE id_user='$_SESSION[user_id]'";
		
			// run the query
			$upload = mysqli_query($db_connection,$query);
			
			if($upload) {
				$_SESSION['user_photo'] = $photo;
				if($_POST['user_photo'] !== 'default.png') unlink($folder . $_POST['user_photo']); // delete the default or old photo
				// upload success massage
				echo "<script>alert('Photo Succesfully Changed !');window.location.replace('index.php');</script>";
			} else {
				// upload failde msg
				echo "<script>alert('Photo Failed to Change !');window.location.replace('users_photo.php?id=$_POST[user_id]');</script>";
			}	
		} else {
			// Failed upload massage
			echo "<script>alert('Photo Failed to Upload !');window.location.replace('user_photo.php?id=$_POST[user_id]');</script>";
		}
		
	}

?>