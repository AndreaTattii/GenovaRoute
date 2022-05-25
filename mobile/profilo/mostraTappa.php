<?php
session_start();
/* ACCENTI */
//error_reporting(0);
//header('Content-Type: text/html; charset=ISO-8859-1');
if (isset($_GET['idTappa'])) {
    $idTappa = $_GET['idTappa'];
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


// CATTURO DA DB INFORMAZIONI DELLA TAPPA
$sql = "SELECT * 
        FROM Tappa
        WHERE id = ".$idTappa;

if ($result = $connessione->query($sql)) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

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

$

// CONTROLLO SE UTENTE HA MESSO MI PIACE A TAPPA
$sql = "SELECT * FROM utente_percorre_tappa
        WHERE email = '" . $_SESSION['email'] . "'
        AND id_tappa = ".$idTappa."
        AND piace = 1";

$piace = "../../img/icons/cuoreVuoto.png";
if ($result = $connessione->query($sql)) {
    if ($result->num_rows > 0) {
        $piace = "../../img/icons/cuorePieno.png";
    }
}
?>
<!doctype html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Personale-->
    <link rel="stylesheet" href="../../css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,400;1,700&display=swap" rel="stylesheet">

    <title>Genova Route</title>
    <link rel="icon" href="../../../../img/G.png" type="image/icon type">
</head>

<body>


    <!-- NAVBAR BASSA-->
    <div class="container fixed-bottom" style="background-color: white; border-top-color:black;  border-top-style: solid; border-top-width: 1px; height: 70px;">
        <div class="row  justify-content-center" style="padding-top: 15px;">
            <div class="col s-4" style="padding-top: 15px; ">
                <center>
                    <a class="navbar-brand" href="../percorsi/index.php">
                        <img id="percorso" src="../../img/icons/percorso.png">
                    </a>
                </center>

            </div>
            <div class="col s-4" style="padding-top: 15px; ">
                <center>
                    <a class="navbar-brand" href="../scanner/index.php">
                        <img id="scannerizza" src="../../img/icons/scannerizza.png">
                    </a>
                </center>

            </div>
            <div class="col s-4">
                <center>
                    <a class="navbar-brand" href="./">
                        <img id="accountSfondo" src="../../img/icons/accountSfondo.png">
                    </a>
                </center>

            </div>
        </div>


    </div>


    <!-- NAVBAR ALTA -->
    <div class="container fixed-top">
        <div class="row justify-content-center align-items-center" style="background-color: #B30000;  padding-top: 10px; height:60px;">

            <div class="col-2">
                <a href="index.php">
                    <img id="back" src="../../img/icons/back.png">
                </a>
            </div>
            <div class="col-8">
                <h1 style=" color: white; font-weight: bold; text-align: center;  font-size: 20px;"><?php echo $nome; ?></h1>
            </div>
            <div class="col-2">
                
            </div>
        </div>
    </div>





    <!-- CONTENUTO PAGINA -->


    <!-- CARD -->
    <div class="card text-center" style="margin-top:20px; border-radius:0px; text-align: left; padding-top:60px; margin:0px; border:none;">

        <div class="card-header" style="background-color:white; margin-left:0px; padding-left:0px">
            <p class="card-title" style="font-weight: bold; margin-left: 10px;"><img src="../../img/icons/marker.png" style="width: 30px; margin-bottom: 15px; "><?php echo $dove; ?></p>
            
        </div>

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="margin:none; padding:none; height:225px;">
            <div class="carousel-indicators" style="background-color:white; width:100%; margin:auto">
                <button style="background-color:#B30000;color:#B30000" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button style="background-color:#B30000;color:#B30000" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button style="background-color:#B30000;color:#B30000" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner double-tap" id="double-tap" style="align-items: center;">
                <div class="carousel-item active" data-bs-interval="9999999999999999" style="align-items:center">
                    <img src="../../img/tappe/<?php echo $idTappa ?>.1.png" class="d-block w-100" alt="..." style="max-height: 200px; margin-left: auto; margin-right: auto;">
                </div>
                <div class="carousel-item" data-bs-interval="9999999999999999" style="align-items:center">
                    <img src="../../img/tappe/<?php echo $idTappa ?>.2.png" class="d-block w-100" alt="..." style=" max-height: 200px; margin-left: auto; margin-right: auto;">
                </div>
                <div class="carousel-item" data-bs-interval="9999999999999999" style="align-items:center">
                    <img src="../../img/tappe/<?php echo $idTappa ?>.3.png" class="d-block w-100" alt="..." style=" max-height: 200px; margin-left: auto; margin-right: auto;">
                </div>
            </div>
        </div>
    </div>

    

    <div id="gestureZone" class="card-body" style="text-align: center; border:none; height:800px">
        <input type="hidden" name="idPercorso" value="' . $row['id'] . '">
        <p class="card-text" style="text-align:justify; border:none;"><?php echo $descrizione; ?></p>
    </div>
    
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
    
</body>

</html>
<?php
//unset($nomePercorso);
?>