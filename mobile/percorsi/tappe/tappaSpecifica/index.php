<?php
session_start();
/* ACCENTI */
//error_reporting(0);
//header('Content-Type: text/html; charset=ISO-8859-1');
if (isset($_POST['ordineTappa'])) {
    $_SESSION['ordineTappa'] = $_POST['ordineTappa'];
    $_SESSION['idTappa'] = $_POST['idTappa'];
}
if (isset($_POST['idPercorso'])) {
    $_SESSION['idPercorso'] = $_POST['idPercorso'];
}




$host = "127.0.0.1";
$user = "root";
$pass = "";
$database = "genovaroute";

$connessione = new mysqli($host, $user, $pass, $database);

if ($connessione === false) {
    die("Errore: " . $connessione->connect_error);
}


$sql = "SELECT Tappa.nome, Tappa.descrizione, Tappa.img1, Tappa.img2, Tappa.img3, Tappa.via 
        FROM Tappa, Tappa_appartiene_percorso, Percorso
        WHERE Tappa.id = Tappa_appartiene_percorso.id_tappa
            AND Percorso.id =  Tappa_appartiene_percorso.id_percorso
            AND id_percorso = " . $_SESSION['idPercorso'] . " 
            AND ordine = " . $_SESSION['ordineTappa'] . "";

if ($result = $connessione->query($sql)) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $img1 = $row['img1'];
        $img2 = $row['img2'];
        $img3 = $row['img3'];
        $descrizione = $row['descrizione'];
        $dove = $row['via'];
        $nome = $row['nome'];
    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
        //die('ERRORE: codice QR non riconosciuto');
    }
} else {
    echo "Impossibile eseguire la query";
}

$sql = "SELECT MAX(ordine)  
    FROM  Tappa_Appartiene_Percorso
    WHERE id_percorso =  " . $_SESSION['idPercorso'] . "";

if ($result = $connessione->query($sql)) {
    $row = $result->fetch_assoc();
    $_SESSION['quanteTappe'] = $row['MAX(ordine)'];
} else {
    echo "Impossibile eseguire la query2";
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
    <div class="container fixed-bottom" style="background-color: white; border-top-color:black;  border-top-style: solid; border-top-width: 4px; padding-bottom:10px;">
        <div class="row  justify-content-center " style="padding-top: 15px;">
            <div class="col .s-4">
                <center>
                    <!--<a class="navbar-brand" href="../../../index.php">
                        <img src="../../../../img/icons/backRed.png">
                    </a> -->

                    <?php
                    if ($_SESSION['ordineTappa'] != 0) {
                        echo '
                            <form action="decrementaOrdinata.php" method="POST">
                                 <button type="submit" style="background-color: white; border-color:transparent;">
                                    <img src="../../../../img/icons/backRed.png">
                                </button>
                            </form>
                        ';
                    }
                    ?>
                </center>
            </div>
            <div class="col .s-4">
                <center>
                    <a class="navbar-brand" href="../../../scanner/">
                        <a class="navbar-brand" href="../../../scanner/index.php">
                            <img src="../../../../img/icons/scannerizza.png">
                        </a>
                </center>
            </div>
            <div class="col .s-4">
                <center>

                    <?php
                    if ($_SESSION['ordineTappa'] != $_SESSION['quanteTappe']) {
                        echo '
                            <form action="incrementaOrdinata.php" method="POST">
                                <button type="submit" style="background-color: white; border-color:transparent;">
                                    <img src="../../../../img/icons/nextRed.png">
                                </button>
                            </form>
                        ';
                    }
                    ?>
                </center>
            </div>

        </div>


    </div>


    <!-- NAVBAR ALTA -->
    <div class="container fixed-top">
        <div class="row justify-content-center align-items-center" style="background-color: #B30000; border-bottom-color:black;  border-bottom-style: solid; border-bottom-width: 2px; padding-top: 10px; height:60px;">

            <div class="col-2">
                <a href="../index.php">
                    <img src="../../../../img/icons/back.png">
                </a>
            </div>
            <div class="col-8">
                <h1 style="font-family: 'Amiri', serif; color: white; font-weight: bold; text-align: center;  font-size: 20px;"><?php echo $nome;  ?></h1>
            </div>
            <div class="col-2">
                <center>
                    <a class="navbar-brand" href="mappaSpecifica.php?percorsi=1">
                        <img src="../../../../img/icons/percorsoSfondo.png">
                    </a>
                </center>
            </div>
        </div>
    </div>





    <!-- CONTENUTO PAGINA -->
    <div class="container" style="padding-top: 50px; margin:0px; margin-left: 0px; margin-right:0px; padding:0px">

        <!-- CARD -->
        <div class="card " style="margin-top:20px; border-radius:0px; text-align: left; padding-top:60px">

            <div class="card-header" style="background-color:white; margin-left:0px; padding-left:0px">
                <p class="card-title" style="font-weight: bold;"><?php echo $dove; ?></p>

            </div>

            <div class="row">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators" style=" margin:0px">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner" style="align-items: center;">
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
                </div>
            </div>

            <div class="card-body" style="text-align: center;">
                <input type="hidden" name="idPercorso" value="' . $row['id'] . '">
                <p class="card-text" style="text-align:justify"><?php echo $descrizione; ?></p>
            </div>
        </div>

        <!-- CAROSELLO -->
        <div class="row" style="padding-top: 20px; padding-top: 20px; height:225px;">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" style="align-items: center;">
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

            </div>
        </div>
        <!-- DOVE -->
        <div class="row" style="padding-top: 10px;">

            <div class="row align-content-center justify-content-center" style=" padding-top:0px ;padding-bottom:20px">
                <div class="col-2" style="padding-left:40px;margin:auto;">
                    <img src="../../../../img/icons/marker.png" style="width: 40px;">
                </div>
                <div class="col-10" style="margin:auto;padding-top:25px">
                    <p style="text-align:center; font-weight: bold;"><?php echo $dove; ?></p>
                </div>
            </div>
            <!-- DESCRIZIONE -->
            <div class="row" style="padding-top: 1px;  padding-left: 0px; padding-right:0px;  margin-left: 0px; margin-right:0px;">
                <div class="row" style="margin: auto;">
                    <p style="text-align:justify"><?php echo $descrizione; ?></p>
                </div>
            </div>

            <div class="row " style="padding-top: 10px; padding-bottom:100px">
                <div class="col .s-4">

                </div>
            </div>
        </div>
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
            window.addEventListener("orientationchange", function() {
                if (window.orientation == 90 || window.orientation == -90) {
                    alert("Gira lo schermo in verticale!!!")
                    //window.orientation = 0;
                    //document.getElementById("orientation").style.display = "none";
                    //window.location.reload();
                }
            });
        </script>
</body>

</html>
<?php
//unset($nomePercorso);
?>