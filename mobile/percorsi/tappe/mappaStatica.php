<?php
session_start();
if(isset($_POST['percorso'])){
    $_SESSION['nomePercorso'] = $_POST['percorso'];
}

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

    <!-- CSS Personale
    <link rel="stylesheet" href="../../../css/style.css">
-->
    <!-- Bootstrap CSS 
    -->

    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,400;1,700&display=swap" rel="stylesheet">

    <title>Genova Route</title>
    <link rel="icon" href="../../../img/G.png" type="image/icon type">
</head>

<body class="d-flex flex-column min-vh-100">
<!-- NAVBAR ALTA -->
<div class="container fixed-top" >
        <div class="row justify-content-center align-items-center" style="background-color: #B30000; border-bottom-color:black;  border-bottom-style: solid; border-bottom-width: 2px; padding-top: 10px;">

            <div class="col-2">
                <a href="../tappe/index.php">
                    <img src="../../../img/icons/back.png">
                </a>
            </div>
            <div class="col-8">
                <h1 style="font-family: 'Amiri', serif; color: white; font-weight: bold; text-align: center;"><?php echo $_SESSION['nomePercorso']  ?> </h1>
            </div>
            <div class="col-2">
                 <h1 style="font-family: 'Amiri', serif; color: white; font-weight: bold; text-align: center;"></h1>
            </div>
        </div>
    </div>
 <!-- NAVBAR BASSA-->
 <div class="container fixed-bottom" style="background-color: white; border-top-color:black;  border-top-style: solid; border-top-width: 4px; height: 70px;">
        <div class="row  justify-content-center" style="padding-top: 15px;">
            <div class="col s-4">
                <center>
                    <a class="navbar-brand" href="../index.php">
                        <img src="../../../img/icons/percorsoSfondo.png">
                    </a>
                </center>

            </div>
            <div class="col s-4" style="padding-top: 15px; ">
                <center>
                    <a class="navbar-brand" href="../../scanner/index.php ">
                        <img src="../../../img/icons/scannerizza.png">
                    </a>
                </center>

            </div>
            <div class="col s-4" style="padding-top: 15px; ">
                <center>
                    <a class="navbar-brand" href="../../profilo/index.php">
                        <img src="../../../img/icons/account.png">
                    </a>
                </center>

            </div>
        </div>

        

    </div>
    <br>
    <br>
    
    <div id="osm-map"></div>
        <script>
            element = document.getElementById('osm-map');
            element.style = 'height:'.concat(window.innerHeight, 'px;');
            var map = L.map(element);
            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {}).addTo(map);
            map.setView(['44.409369955825774', '8.941610113846902'], 14);
            var Icon1 = L.icon({
                            iconUrl: '../../../img/marker.png',
                            iconSize:     [20, 20],
                        });
            <?php
            if(!empty($_GET["percorsi"])){
                $sql = 'SELECT * FROM Tappa, Percorso, Tappa_Appartiene_Percorso Where Tappa.id = Tappa_Appartiene_Percorso.id_tappa AND percorso.id = Tappa_Appartiene_Percorso.id_percorso AND  percorso.id = '.$_GET["percorsi"].';';
                $result = $connessione->query($sql);
                $row = $result->fetch_array();
                while($row = $result->fetch_assoc()){
                    echo "L.marker(
                        ['".$row["lon"]."', '".$row["lat"]."'],
                        {
                            icon: Icon1
                        }
                        ).addTo(map);
                        ";
                }
            }
            
                    ?>
        </script>
    
    

   





</body>
</html>