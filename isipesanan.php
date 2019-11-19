<?php
        //connect ke database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "kobeku";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // echo "Connected successfully";

        $json_array = json_decode($_POST["data"]);
        mysqli_query($conn,"INSERT INTO kobeku (idMakanan,quantity) VALUES(".$json_array['id'].", ".$json_array['count'].")");
        $result = mysqli_query($conn, $sql);
        $pesanan = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        $sql = 'SELECT namaMakanan FROM pesanan, isipesanan, makanan WHERE pesanan.idPesanan=isipesanan.idPesanan and isipesanan.idMakanan=makanan.idMakanan';
        $result = mysqli_query($conn, $sql);
        $makanan = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>