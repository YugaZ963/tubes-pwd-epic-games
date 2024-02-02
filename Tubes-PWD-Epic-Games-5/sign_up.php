<?php 
if (isset($_POST["sign_up"])) { // check data dari form
    include "connection.php"; // panggil connection.php mysql

    // create default password
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO user (email, username, user_password, user_type, fullname) VALUES ('$_POST[email]', '$_POST[username]', '$password', '$_POST[user_type]' , '$_POST[fullname]')" ;

    // run query
    $create = mysqli_query($db_connection, $query);

    if ($create) {
        // echo "<p>user added successfully !!</p>" ; // versi html
        $id_user = mysqli_insert_id($db_connection);
        $query_usertype = "UPDATE user SET user_type = 'player' WHERE id_user = '$id_user'";
        $result_usertype = mysqli_query($db_connection, $query_usertype);
        
        echo "<script>alert('user added successfully'); </script>"; // versi JS
    } else {
        // echo "<p>user add failed !!<p>" ; // versi html
        echo "<script>alert('user add failed'); </script>" ; // versi JS
    }


}
?>

<!-- <p><a href="read.php">Back to user List</a><p> -->
<script>window.location.replace("form_login.php")</script> 
<!-- pindah lokasi -->
