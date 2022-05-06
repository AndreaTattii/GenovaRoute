<?php
session_start();
/* ACCENTI */
header('Content-Type: text/html; charset=ISO-8859-1');
if (isset($_POST['tappa'])) {
    $_SESSION['nomeTappa'] = $_POST['tappa'];
}



?>
<!doctype html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../../../bootstrap/js/bootstrap.min.js"></script>
    <!-- Required meta tags -->

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


    <!-- NAVBAR BASSA-->
    <div class="container fixed-bottom" style="background-color: white; border-top-color:black;  border-top-style: solid; border-top-width: 4px; height: 70px;">
        <div class="row  justify-content-center " style="padding-top: 15px;">
            <div class="col .s-4">
                <center>
                    <a class="navbar-brand" href="../../../index.php">
                        <img src="../../../../img/icons/backRed.png">
                    </a>
                </center>

            </div>
            <div class="col .s-4">
                <center>
                    <a class="navbar-brand" href="../../../index.php">
                        <img src="../../../../img/icons/scannerizza.png">
                    </a>
                </center>
            </div>
            <div class="col .s-4" style="padding-bottom: 15px; ">
                <center>
                    <a class="navbar-brand" href="../../../scanner/index.php ">
                        <img src="../../../../img/icons/nextRed.png">
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
    $sql = "SELECT * FROM tappa WHERE nome = '" . $_SESSION['nomeTappa'] . "'";
    if ($result = $connessione->query($sql)) {
        $row = $result->fetch_assoc();
        $img1 = $row['img1'];
        $img2 = $row['img2'];
        $img3 = $row['img3'];
        $descrizione = $row['descrizione'];
        $dove = $row['via'];
    } else {
        echo "Impossibile eseguire la query";
    }



    ?>



    <!-- CONTENUTO PAGINA -->
    <div class="container" style="padding-top: 50px; padding-left: 50px; padding-right:50px;">
        <!-- CAROSELLO -->
        <div class="row" style="padding-top: 20px; padding-top: 20px;">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?php echo $img1; ?>" class="d-block w-100" alt="..." style="max-height: 200px; margin-left: auto; margin-right: auto;">
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo $img2; ?>" class="d-block w-100" alt="..." style=" max-height: 200px; margin-left: auto; margin-right: auto;">
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo $img3; ?>" class="d-block w-100" alt="..." style=" max-height: 200px; margin-left: auto; margin-right: auto;">
                    </div>
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
        <!-- DESCRIZIONE -->
        <div class="row" style="padding-top: 10px;">
            <div class="row">
                <h2 style="color: #B30000;">Descrizione</h2>
            </div>
            <div class="row">
                <p><?php echo $descrizione; ?></p>
            </div>
        </div>
        <!-- DOVE -->
        <div class="row" style="padding-top: 10px;">
            <div class="row">
                <h2 style="color: #B30000;">Dove</h2>
            </div>
            <div class="row">
                <p><?php echo $dove; ?></p>
            </div>
        </div>
        <div class="row " style="padding-top: 10px; padding-bottom:100px">
            <div class="col .s-4">

            </div>
        </div>
    </div>





</body>

</html>
<?php
//unset($nomePercorso);
?>