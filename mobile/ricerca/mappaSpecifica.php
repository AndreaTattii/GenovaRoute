<?php
session_start();


$host = "127.0.0.1";
$user = "root";
$pass = "";
$database = "genovaroute";

$connessione = new mysqli($host, $user, $pass, $database);


?>
<!doctype html>
<html lang="en">

<head>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <link href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" rel="stylesheet"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="../../css/style.css">

    <!-- Bootstrap CSS 
    -->

    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,400;1,700&display=swap" rel="stylesheet">

    <title>Genova Route</title>
    <link rel="icon" href="../../img/G.png" type="image/icon type">
</head>

<body class="d-flex flex-column min-vh-100">

<!-- NAVBAR ALTA -->
<div class="container fixed-top" >
        <div class="row justify-content-center align-items-center" style="background-color: #B30000; height:60px; padding-top: 10px;">

            <div class="col-2">
                <a href="tappaSpec.php">
                    <img id="back" src="../../img/icons/back.png">
                </a>
            </div>
            <div class="col-8">
                <h1 style=" color: white; font-weight: bold; text-align: center; font-size: 17px;"><?php echo $_SESSION['nomeTappa'];  ?> </h1>
                <?php unset($_SESSION['nomeTappa']); ?>
            </div>
            <div class="col-2">
                 <h1 style="font-family: 'Amiri', serif; color: white; font-weight: bold; text-align: center;"></h1>
            </div>
        </div>
    </div>


    <!-- NAVBAR BASSA -->
    <div class="container fixed-bottom" style="background-color: white; border-top-color:black;  border-top-style: solid; border-top-left-radius: 25px;border-top-right-radius: 25px; border-top-width: 1px; height: 50px;">
        <div class="row  justify-content-center" >
            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="../percorsi/index.php">
                        <img id="percorsoSfondo" src="../../img/icons/percorsoRosso.png">
                    </a>
                </center>

            </div>
            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="..//ricerca/index.php">
                        <img id="ricercaNavImg" src="../../img/icons/searchBlack.png">
                    </a>
                </center>

            </div>

            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="../scanner/index.php ">
                        <img style="width:25px" src="../../img/icons/scannerizza.png">
                    </a>
                </center>

            </div>
            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="../percorsiPersonali/index.php ">
                        <img style="width:25px" src="../../img/icons/aggiungiPercorso.png">
                    </a>
                </center>

            </div>
            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="../profilo/index.php">
                        <img id="account" src="../../img/icons/account.png">
                    </a>
                </center>
            </div>
        </div>
    </div>

        

    </div>
    <br>
    <br>
    
    <div id="osm-map"></div>
        <script>
            element = document.getElementById('osm-map');
            element.style = 'height:'.concat(window.innerHeight, 'px;');
            var map = L.map(element, {
                zoomControl: false
            });
            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {minZoom: 10}).addTo(map);
            //map.setView(['44.409369955825774', '8.941610113846902'], 14);
            var Icon1 = L.icon({
                            iconUrl: '../../img/icons/marker.png',
                            iconSize:     [40, 40],
                        });


            <?php
                $sql = 'SELECT lat,lon,Tappa.nome
                FROM Tappa 
                WHERE id='.$_SESSION['idTappa'].';';
                $result = $connessione->query($sql);
                $row = $result->fetch_array();
                    echo "map.setView(['".$row["lat"]."', '".$row["lon"]."'], 14);L.marker(
                        ['".$row["lat"]."', '".$row["lon"]."'],
                        {
                            icon: Icon1
                        }
                        ).addTo(map)   
                        .bindPopup('".$row["nome"]."')
                        .openPopup();
                        "; 
            ?>
        </script>
    
</body>
</html>