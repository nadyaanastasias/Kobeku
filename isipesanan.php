<?php
    //connect ke database
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $database   = "kobeku";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $data       = $_POST['data1']; // put the contents of the file into a variable 
    json_encode($data);
//     implode("|",$data);
//     var_dump($data);
    $data_array = json_decode($data, true); // Convert JSON string into PHP array format
    
    $noMeja = $_POST['noMeja1'];
    // var_dump($noMeja);

    $query = '';
    $query = "INSERT INTO pesanan (noMeja) VALUES ('.$noMeja.')";
    $result    = mysqli_query($conn, $query);
     //".$data_array['noMeja']."
    // var_dump($query);
    
    $sql       = 'SELECT idPesanan FROM pesanan WHERE noMeja=('.$noMeja.') '; //harusnya data nomer meja dari table pesanan
    $result    = mysqli_query($conn, $sql);
    $arridpesanan = mysqli_fetch_array($result);
    // var_dump($arridpesanan);
    // $arridpesanan = json_encode($getidpesanan);
    // var_dump($arridpesanan);
    $idpesanan = $arridpesanan['idPesanan'];
    // var_dump($idpesanan);
    // var_dump($idpesanan);
    
    function getIdMakanan(string $namaMakanan)
    {
        $sql2      = 'SELECT idMakanan FROM makanan WHERE namaMakanan= "'.$namaMakanan.'";';
        // var_dump($sql2);
        $result2   = mysqli_query($GLOBALS['conn'], $sql2);
        // var_dump($result2);
        $arridmakanan = mysqli_fetch_array($result2, MYSQLI_ASSOC);
        // var_dump($idmakanan);
        $value = $arridmakanan['idMakanan'];
        // var_dump($value);
        // $value = json_decode($idmakanan, true);
        return $value;
    }
    
    // $nama = 'ChickenTeriyaki';
    // $coba = getIdMakanan($nama);
    // var_dump($coba);
    $table_data = '';

    foreach ($data_array as $row) {
        $query2 = '';
        //Build multiple insert query 
        $idM = getIdMakanan($row['name']);
        // var_dump($idM);
        $query2 = "INSERT INTO isipesanan (idPesanan, idMakanan, quantity) VALUES ($idpesanan, $idM, '" . $row['count'] . "');";
        // var_dump($query2);
        $result    = mysqli_query($conn, $query2);
    }

?>
