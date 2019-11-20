<?php
        //connect ke database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "kobeku";

        $tableNumber = $_POST['no_meja'];
        $shoppingCart = json_decode($_POST['shopping_cart']);

        // sum total price
        $totalPrice = 0;
        foreach ($shoppingCart as &$item) {
                $totalPrice += $item->price;
        }

        // create connection
        $conn = mysqli_connect($servername, $username, $password, $database);
        if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
        }

        /* insert pesanan */
        $insertPesananSQL = "INSERT INTO pesanan ".
                "(totalHarga, tanggalPembelian, noMeja)". 
                "VALUES($totalPrice, NOW(), $tableNumber)";

        $result = mysqli_query($conn, $insertPesananSQL);
        /* end of insert pesanan */

        /* insert isipesanan */
        $idPesanan = $conn->insert_id;

        $insertIsiPesananSQL = "INSERT INTO isipesanan ". 
                "(idPesanan, idMakanan, quantity) ".
                "VALUES ";
                
        foreach ($shoppingCart as &$item) {
                $insertIsiPesananSQL .= "($idPesanan, $item->id, $item->count),";
        }
        
        // remove last comma
        $insertIsiPesananSQL = substr($insertIsiPesananSQL, 0, -1);

        $result = mysqli_query($conn, $insertIsiPesananSQL);       
        /* end of insert isipesanan */ 

        echo var_dump($_POST);
?>