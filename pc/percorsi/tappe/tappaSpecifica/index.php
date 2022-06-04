<?php
session_start();

if (isset($_POST['ordineTappa'])) {
    $_SESSION['ordineTappa'] = $_POST['ordineTappa'];
}
if (isset($_POST['idTappa'])) {
    $_SESSION['idTappa'] = $_POST['idTappa'];
}
$host = "localhost";
$user = "grovago";
$pass = "";
$database="my_grovago";

$connessione = new mysqli($host, $user, $pass, $database);

//error_reporting(0);

if ($connessione === false) {
    die("Errore: " . $connessione->connect_error);
}
$sql = "SELECT tappa.nome, tappa.descrizione, tappa.via, tappa.id
        FROM tappa, tappa_appartiene_percorso, percorso 
        WHERE tappa.id=tappa_appartiene_percorso.id_tappa 
        AND ordine=".$_SESSION['ordineTappa']." AND percorso.id=tappa_appartiene_percorso.id_percorso 
        AND percorso.id=". $_SESSION['idPercorso']."";
if ($result = $connessione->query($sql)) {
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $descrizione = $row['descrizione'];
    $dove = $row['via'];
    $nome = $row['nome'];
} else {
    echo "Impossibile eseguire la query nr.1";
}
$sql = "SELECT COUNT(tappa_appartiene_percorso.id_tappa) AS numeroTappe FROM tappa, percorso, tappa_appartiene_percorso WHERE percorso.nome='" . $_SESSION['nomePercorso'] . "' AND percorso.id=tappa_appartiene_percorso.id_percorso AND tappa.id=tappa_appartiene_percorso.id_tappa";

if ($result = $connessione->query($sql)) {
    $row = $result->fetch_assoc();
    $_SESSION['quanteTappe'] = $row['numeroTappe'];
} else {
    echo "Impossibile eseguire la query nr.2";
}

/* ACCENTI */

//if (isset($_POST['tappa'])) {
//    $_SESSION['nomeTappa'] = $_POST['tappa'];
//}else if (isset($_SESSION['nomeTappa'])) {
//    $_SESSION['nomeTappa'] = $_POST['tappa'];
//}
?>
<!doctype html>
<html lang="en">

<head>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <link href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../../../bootstrap/js/bootstrap.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Personale-->
    <link rel="stylesheet" href="../../../../css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../../bootstrap/css/bootstrap.min.css">

    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,400;1,700&display=swap" rel="stylesheet">

    <title>GrovaGO</title>
    <link rel="icon" href="../../../../img/g.png" type="image/icon type">

</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar  navbar-expand-lg" style="background-color: #B30000;">
        <div class="container p-2">
            <a class="navbar-brand" style="font-family: 'Amiri', serif; color: white; font-weight: bold;" href="../../../index.php">
                <h1>GrovaGO</h1>
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php" style="color: white">Percorsi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../profilo/index.php" style="color: white">Account</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h2 style="color:#B30000; font-weight:bold; padding-top:15px; padding-left:150px"><?php echo $_SESSION['nomePercorso'] ?></h2>
    <h1 style="font-weight:bold; padding-left:150px"><?php echo $_SESSION['ordineTappa']+1;  echo '. '.$nome; ?></h1>


    <!-- CONTENUTO PAGINA -->
    <div class="container" style=" padding-bottom:100px">

        <div class="row" style="padding-top: 20px; padding-top: 20px; padding-bottom:10px">
            <div class="col-1" style="margin:auto ;float:left">

            <?php
                if ($_SESSION['ordineTappa'] != 0) {
                        $_SESSION['ordineTappa'] = $_SESSION['ordineTappa'] - 1;
                        echo '
                            <form method="post" action="../tappaSpecifica/index.php">
                                <input type="hidden" name="ordineTappa" value="' . $_SESSION['ordineTappa'] . '">
                                <input type="image" src="../../../../img/icons/PcBackRed.png" name="tappa" value="Avanti" class="" style="width:50px">
                            </form>
                        ';
                        $_SESSION['ordineTappa'] = $_SESSION['ordineTappa'] + 1;
                }
                ?>
            </div>
            <div class="col-6">
                <div class="row">
                    <h2 style="color: #B30000; font-weight: bold;">Descrizione</h2>
                </div>
                <div class="row">
                    <p><?php echo $descrizione; ?></p>
                </div>
                <div class="row">
                    <h2 style="color: #B30000; font-weight: bold;">Dove</h2>
                </div>
                <div class="row">
                    <p><?php echo $dove; ?></p>
                </div>
            </div>
            <div class="col-4" style="height:200px;">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../../../../img/tappe/<?php echo $id ?>.1.png" class="d-block w-100" alt="..." style="max-height: 200px; margin-left: auto; margin-right: auto;">
                        </div>
                        <div class="carousel-item">
                            <img src="../../../../img/tappe/<?php echo $id ?>.2.png" class="d-block w-100" alt="..." style=" max-height: 200px; margin-left: auto; margin-right: auto;">
                        </div>
                        <div class="carousel-item">
                            <img src="../../../../img/tappe/<?php echo $id ?>.3.png" class="d-block w-100" alt="..." style=" max-height: 200px; margin-left: auto; margin-right: auto;">
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-1" style="margin:auto; float:right;">
                <?php
                    if ($_SESSION['ordineTappa'] != $_SESSION['quanteTappe'] - 1) {
                        $_SESSION['ordineTappa'] = $_SESSION['ordineTappa'] + 1;
                        echo '
                            <form method="post" action="../tappaSpecifica/index.php">
                                <input type="hidden" name="ordineTappa" value="' . $_SESSION['ordineTappa']. '">
                                <input type="image" src="../../../../img/icons/PcForwardRed.png" name="tappa" value="Avanti" class="" style="width:50px">
                            </form>
                        ';
                        $_SESSION['ordineTappa'] = $_SESSION['ordineTappa'] - 1;
                }
                ?>
            </div>

            
        </div>
        <div id="osm-map"></div>
        

        <script>
            element = document.getElementById('osm-map');
            element.style = 'height:'.concat(400, 'px;');
            var map = L.map(element);
            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {minZoom: 10}).addTo(map);
            
            var Icon1 = L.icon({
                            iconUrl: '../../../../img/icons/marker.png',
                            iconSize:     [40, 40],
                        });


            <?php

                $sql = 'SELECT lat,lon,Tappa.nome
                FROM Tappa, Percorso, Tappa_Appartiene_Percorso 
                Where ordine = '.$_SESSION['ordineTappa'].'  
                AND percorso.id = Tappa_Appartiene_Percorso.id_percorso 
                AND  percorso.id = '.$_SESSION['idPercorso'].'
                AND tappa.id=id_tappa ';
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


    <div class="footer-clean" style="border-top-color:#F0F0F0;  border-top-style: solid; border-top-width: 3px; margin-top: 40px;  bottom:0px; width:100%; margin-top:40px; background-color:white">
            <footer>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-4 ">

                        </div>
                        <div class="col-4"></div>
                        <center>
                            <p style="text-decoration: none; color:black">Partita Iva: 02070920992</p>
                            <p>GenovaRoute ©</p>
                        </center>
                    </div>
                </div>
            </footer>
        </div>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</body>

</html>