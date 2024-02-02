<?php 
    session_start();

    if (!isset($_SESSION['login'])) {
        echo "<script>alert('please login first'); window.location.replace('form_login.php') ; </script>";
    }

    if (isset($_POST['transaksi'])) {
        include "connection.php";
        (int)$uang_game = $_POST['price'];
        (int)$uang_user = $_POST['money'];
        (int)$diskon = $_POST['discount'];
        (int)$harga_setelah_diskon = 0;
        
        if ($uang_user > $uang_game) {

                (int)$total_harga = $uang_game;
    
                $query1 = "INSERT INTO transaksi (id_user, id_game, total_harga, metode_pembayaran) VALUES ('$_POST[id_user]', '$_POST[id_game]', '$total_harga', '$_POST[metode_pembayaran]')";
                $data_transaksi = "SELECT * FROM transaksi";
                $query_transaksi = mysqli_query($db_connection, $data_transaksi);
                $result = mysqli_query($db_connection, $query1);
                // Inisialisasi array untuk menyimpan hasil
                $id_transaksi = mysqli_insert_id($db_connection);

                $query3 = "INSERT INTO menyimpan (id_user, id_game, id_transaksi) VALUES ('$_POST[id_user]', '$_POST[id_game]', '$id_transaksi')";

                $result3 = mysqli_query($db_connection, $query3);
            
            // (int)$id_transaksi;
            if ($result) {
                
                // echo "<p>Pet added succesfully !</p>";
                // die();
                echo "<script> alert('transaction succesfuly !'); window.location.replace('index.php') ;</script>";

                $update_query = "UPDATE transaksi SET status_pembelian = 1 WHERE id_transaksi = '$id_transaksi'";
                $update_result = mysqli_query($db_connection, $update_query);

                // global $id_transaksi;
                $uang_user_sekarang = (int)$uang_user - (int)$uang_game; 
                $query2 = "UPDATE user SET uang = $uang_user_sekarang WHERE id_user = '$_POST[id_user]'";

                $result2 = mysqli_query($db_connection, $query2);


            }
            else{
                // echo "<p>Pet add failed !</p>";
            echo "<script> alert('transaction failed!'); window.location.replace('index.php') ;</script>";
            }
            
        } else if ($diskon > 0) {
            // Hitung harga setelah diskon
            $harga_setelah_diskon = $uang_game - ($uang_game * $diskon / 100);

            // Simpan data transaksi, termasuk harga setelah diskon
            $query0 = "INSERT INTO transaksi (id_user, id_game, total_harga, metode_pembayaran) 
                                VALUES ('$_POST[id_user]', '$_POST[id_game]', '$harga_setelah_diskon', '$metode_pembayaran')";
            $result = mysqli_query($db_connection, $query0);

            $id_transaksi = mysqli_insert_id($db_connection);

                $query3 = "INSERT INTO menyimpan (id_user, id_game, id_transaksi) VALUES ('$_POST[id_user]', '$_POST[id_game]', '$id_transaksi')";

                $result3 = mysqli_query($db_connection, $query3);

            if ($uang_user > $harga_setelah_diskon) {
                echo "<script> alert('transaction succesfuly !'); window.location.replace('index.php') ;</script>";

                $update_query = "UPDATE transaksi SET status_pembelian = 1 WHERE id_transaksi = '$id_transaksi'";
                $update_result = mysqli_query($db_connection, $update_query);

                // global $id_transaksi;
                $uang_user_sekarang = (int)$uang_user - (int)$harga_setelah_diskon; 
                $query2 = "UPDATE user SET uang = $uang_user_sekarang WHERE id_user = '$_POST[id_user]'";

                $result2 = mysqli_query($db_connection, $query2);

                
            }
        }else {
            // die();
            echo "<script>alert('uang anda tidak cukup'); window.location.replace('index.php') ; </script>";
            
        }

        
    }
?>