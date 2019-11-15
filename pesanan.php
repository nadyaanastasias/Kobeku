<!DOCTYPE html>
<html>

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

        $sql = 'SELECT idPesanan, noMeja FROM pesanan';
        $result = mysqli_query($conn, $sql);
        $pesanan = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        $sql = 'SELECT namaMakanan FROM pesanan, isipesanan, makanan WHERE pesanan.idPesanan=isipesanan.idPesanan and isipesanan.idMakanan=makanan.idMakanan';
        $result = mysqli_query($conn, $sql);
        $makanan = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>KOBE</title>
        <meta name="description" content="Webpage ini menampilkan menu KOBE">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shorcut icon" type="image/png" href="img/favicon.png">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="./style.css">
    </head>

    <body>
        <nav class="navbar navbar-inverse bg-inverse fixed-top">
            <div class="row">
                <div class="col">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart">Cart (<span class="total-harga"></span>)</button><button class="clear-cart btn btn-danger">Clear Cart</button>
                </div>
                <div class = "col">
                    <h3 align="center" class = "web-title" style="color:white">KOBEKU</h3> 
                </div>
                <div class = "col">  
                    <ul class = "menu" id ="navigation"> 
                    <li><a href = index_v2.php>Menu</a></li>
                    <li><a href = pesanan.php>Pesanan</a></li>
                    </ul>
                </div>  
            </div>
        </nav>

        <!-- Main -->
        <div class="container">
            <div class="row">
                <?php
                    foreach($pesanan as $psn){
                        echo '
                        <div class="col">
                                <div class="card" style="width: 20rem;">
                                    <div class="card-block">
                                    <h4 class="card-title" id="id-pesanan">ID Pesanan '.$psn['idPesanan'].'</h4>
                                    <h4 class="card-title" id="no-meja">No Meja '.$psn['noMeja'].'</h4><br/>
                        '; 

                        foreach($makanan as $item){
                            echo '
                                        <p class="card-text" id="menu-name"> '.$item['namaMakanan'].' </p>
                            ';
                        };

                        echo '
                        <br/><form action="#" method="post">
                                            <p>Status makanan</p>
                                            <input type="checkbox" name="check_list[]" value="masak"><label>Selesai dimasak</label><br/>
                                            <input type="checkbox" name="check_list[]" value="antar"><label>Selesai diantar</label><br/>
                                            <input type="checkbox" name="check_list[]" value="bayar"><label>Sudah dibayar</label><br/>
                                            <input type="submit" name="submit" value="Submit"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        ';
                    };
                ?>               
            </div>
        </div>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
        <script src="./script.js"></script>
    </body>
</html>
