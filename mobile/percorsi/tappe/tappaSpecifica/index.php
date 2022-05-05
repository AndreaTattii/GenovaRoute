<?php
session_start();
if (isset($_POST['tappa'])) {
    $_SESSION['nomeTappa'] = $_POST['tappa'];
}

?>
<!doctype html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../../bootstrap/js/bootstrap.min.js"></script>
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

    <title>Genova Route</title>
    <link rel="icon" href="../../../../img/G.png" type="image/icon type">
</head>

<body class="d-flex flex-column min-vh-100">


    <!-- NAVBAR -->
    <div class="container fixed-bottom" style="background-color: white; border-top-color:black;  border-top-style: solid; border-top-width: 4px; height: 70px;">
        <div class="row  justify-content-center" style="padding-top: 15px;">
            <div class="col s-4">
                <center>
                    <a class="navbar-brand" href="../../../index.php">
                        <img src="../../../../img/icons/percorsoSfondo.png">
                    </a>
                </center>

            </div>
            <div class="col s-4" style="padding-top: 15px; ">
                <center>
                    <a class="navbar-brand" href="../../../scanner/index.php ">
                        <img src="../../../../img/icons/scannerizza.png">
                    </a>
                </center>

            </div>
            <div class="col s-4" style="padding-top: 15px; ">
                <center>
                    <a class="navbar-brand" href="../../../profilo/index.php">
                        <img src="../../../../img/icons/account.png">
                    </a>
                </center>

            </div>
        </div>


    </div>


    <!-- NAVBAR ALTA -->
    <div class="container">
        <div class="row justify-content-center align-items-center" style="background-color: #B30000; border-bottom-color:black;  border-bottom-style: solid; border-bottom-width: 2px; padding-top: 10px;">

            <div class="col -2">
                <a href="../index.php">
                    <img src="../../../../img/icons/back.png">
                </a>
            </div>
            <div class="col -7">
                <h1 style="font-family: 'Amiri', serif; color: white; font-weight: bold; text-align: center;  font-size: 20px;"><?php echo $_SESSION['nomeTappa']  ?></h1>
            </div>
            <div class="col -2">

            </div>
        </div>
    </div>






    <!-- CONTENUTO PAGINA -->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="../../../../img/foto_epoca_genova.png" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../../../../img/FotoProfilo.png" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="..." alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <?php

    $host = "127.0.0.1";
    $user = "root";
    $pass = "";
    $database = "genovaroute";

    $connessione = new mysqli($host, $user, $pass, $database);

    //error_reporting(0);

    if ($connessione === false) {
        die("Errore: " . $connessione->connect_error);
    }
    $i = 0;
    $sql = "SELECT tappa.nome FROM tappa, Tappa_Appartiene_Percorso, percorso WHERE percorso.nome = '" . $_SESSION['nomeTappa'] . "' AND Tappa_Appartiene_Percorso.id_tappa=tappa.id AND percorso.id=Tappa_Appartiene_Percorso.id_percorso ";
    if ($result = $connessione->query($sql)) {
    } else {
        echo "Impossibile eseguire la query";
    }
    ?>



</body>

</html>
<?php
//unset($nomePercorso);
?>