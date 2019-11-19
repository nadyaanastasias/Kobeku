<?php
        //connect ke database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "kobeku";

        $data1 = $data; // put the contents of the file into a variable
        $characters = json_decode($data); // decode the JSON feed
        echo $characters[0]->name;
        // Create connection
        //$conn = mysqli_connect($servername, $username, $password, $database);

        //if ($conn->connect_error) {
        //    die("Connection failed: " . $conn->connect_error);
        //}
        // echo "Connected successfully";

        //$json_array = json_decode(orderdata);

        //mysqli_query($conn,"INSERT INTO pesanan (totalHarga) VALUES(".$json_array['price'].")");

        //$result = mysqli_query($conn, $sql);

        //$pesanan = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>