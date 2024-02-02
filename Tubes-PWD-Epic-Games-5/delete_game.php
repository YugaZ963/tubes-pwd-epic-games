<?php
    //echo $_POST['pet_name_220063'] . "<br>";
    //echo $_POST['pet_type_220063'] . "<br>";
    //echo $_POST['pet_gender_220063'] . "<br>";
    //echo $_POST['pet_age_220063'] . "<br>";
    //echo $_POST['pet_owner_220063'] . "<br>";
    //echo $_POST['pet_address_220063'] . "<br>";
    //echo $_POST['pet_phone_220063'] . "<br>";

if (isset($_GET['id'])) { // check variable GET from URL
    try {
        include "connection.php"; //call conncection php mysql

    //sql query DELETE FROM WHERE 
    $query = "DELETE FROM game WHERE id_game = '$_GET[id]'";

    // run query
     $delete= mysqli_query($db_connection, $query);

     if($delete) { // check if query TRUE/succes
        // echo "<p>Pet delete successfully !</p>"; // versi html
        echo "<script> alert ('Game deleted successfully !'); </script>"; // versi javascript
     }  else {
        //echo "<p>Game delete failed !</p>"; //versi html
        echo "<script> alert ('Game deleted failed!'); </script>"; // versi javascript
     }
    }catch(Exception $e){
    // Menangkap dan menangani pengecualian
    echo "<script> alert('game delete failed!'); window.location.replace('read_game.php');</script>"; // JavaScript version
}

    }   
?>
<!-- <p><a href="read_pet_220057.php">BACK TO PETS LIST</p> -->
<script>window.location.replace("read_game.php"); </script>