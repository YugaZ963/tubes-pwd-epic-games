<?php 
session_start();
session_destroy();

echo "<script>alert('log out success'); window.location.replace('form_login.php') ; </script>";

?>