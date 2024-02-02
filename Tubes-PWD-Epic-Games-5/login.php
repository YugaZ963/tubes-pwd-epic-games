<?php
	session_start(); // Start the session
	if(isset($_POST['login'])) {  // check POST variable from FORM
		include "connection.php";  // call connection
		
		// make the query based on username
		$query = "SELECT * FROM user WHERE username='$_POST[username]'";
		
		// run the query
		$login = mysqli_query($db_connection,$query);
		
		if(mysqli_num_rows($login) > 0) {  // check if the username found or not
			$user = mysqli_fetch_assoc($login);  // if user found, extract the data
			
			if(password_verify($_POST['password'], $user['user_password'])) {  // verify the password
				// if password match, then make session variabel
				$_SESSION['login']=TRUE;
				$_SESSION['user_id']=$user['id_user'];
				$_SESSION['username']=$user['username'];
				$_SESSION['password']=$user['user_password'];
				$_SESSION['user_type']=$user['user_type'];
				$_SESSION['fullname']=$user['fullname'];
				$_SESSION['user_photo']=$user['user_photo'];
				$_SESSION['user_uang']=$user['uang'];
				
				// success login msg
				echo "<script>alert('Login success !'); window.location.replace('index.php');</script>";
				// 
				
			} else {  // password did not match
				// wrong password msg then redirect to login form
				echo "<script>alert('Login failed, wrong password !'); </script>";
				// window.location.replace('form_login.php');
			}
			
		} else {
			// login failed msg then redirect to login form
			echo "<script>alert('Login failed, user not found !'); </script>";
			// window.location.replace('form_login.php');
		}	
	}

?>