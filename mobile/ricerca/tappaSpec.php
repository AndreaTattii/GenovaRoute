<?php
session_start();
/* ACCENTI */
//error_reporting(0);
//header('Content-Type: text/html; charset=ISO-8859-1');
if(isset($_GET['id'])){
    $_SESSION['idTappa'] = $_GET['id'];
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
$sql = "SELECT Tappa.nome, Tappa.descrizione,  Tappa.via, tappa.id
        FROM Tappa 
        WHERE id = " . $_SESSION['idTappa'] . "";

if ($result = $connessione->query($sql)) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $descrizione = $row['descrizione'];
        $dove = $row['via'];
        $nome = $row['nome'];
        $_SESSION['nomeTappa'] = $nome;
        $id = $row['id'];
    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
        //die('ERRORE: codice QR non riconosciuto');
    }
} else {
    echo "Impossibile eseguire la query";
}

// CONTROLLO SE UTENTE HA SCANNERIZZATO TAPPA
$sql = "SELECT * FROM utente_percorre_tappa
        WHERE email = '" . $_SESSION['email'] . "'
        AND id_tappa = ".$id."";

$visitata = false;
if ($result = $connessione->query($sql)) {
    if ($result->num_rows > 0) {
        $visitata = true;
    }
}

// CONTROLLO SE UTENTE HA MESSO MI PIACE A TAPPA
$sql = "SELECT * FROM utente_percorre_tappa
        WHERE email = '" . $_SESSION['email'] . "'
        AND id_tappa = ".$id."
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
    <link rel="icon" href="../../img/G.png" type="image/icon type">
</head>

<body>


    <!-- NAVBAR BASSA-->
    <div class="container fixed-bottom" style="background-color: white; border-top-color:black;  border-top-style: solid; border-top-left-radius: 25px;border-top-right-radius: 25px; border-top-width: 1px; height: 50px;">
        <div class="row  justify-content-center" >
            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="../percorsi/index.php">
                        <img id="percorsoSfondo" src="../../img/icons/percorso.png">
                    </a>
                </center>

            </div>
            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="./">
                        <img id="ricercaNavImg" src="../../img/icons/searchRed.png">
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


    <!-- NAVBAR ALTA -->
    <div class="container fixed-top">
        <div class="row justify-content-center align-items-center" style="background-color: #B30000;  padding-top: 10px; height:60px;">

            <div class="col-2">
                <a href="index.php">
                    <img id="back" src="../../img/icons/back.png">
                </a>
            </div>
            <div class="col-8">
                <h1 style=" color: white; font-weight: bold; text-align: center;  font-size: 17px;"><?php echo $nome; ?></h1>
            </div>
            <div class="col-2">
                <center>
                    <a class="navbar-brand" href="mappaSpecifica.php">
                        <img id="percorsoSfondo" src="../../img/icons/percorsoSfondo.png" style="width:50px">
                    </a>
                </center>
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
                    <img src="../../img/tappe/<?php echo $id ?>.1.png" class="d-block w-100" alt="..." style="max-height: 200px; margin-left: auto; margin-right: auto;">
                </div>
                <div class="carousel-item" data-bs-interval="9999999999999999" style="align-items:center">
                    <img src="../../img/tappe/<?php echo $id ?>.2.png" class="d-block w-100" alt="..." style=" max-height: 200px; margin-left: auto; margin-right: auto;">
                </div>
                <div class="carousel-item" data-bs-interval="9999999999999999" style="align-items:center">
                    <img src="../../img/tappe/<?php echo $id ?>.3.png" class="d-block w-100" alt="..." style=" max-height: 200px; margin-left: auto; margin-right: auto;">
                </div>
            </div>
        </div>
    </div>
 
    <div class="row" style="padding-left:20%; width:90%; position: fixed;">
        <div class="toast <?php if(isset($_SESSION['primaVolta'])){echo'show';unset($_SESSION['primaVolta']);}?>">
            <div class="toast-header">
                <?php if(isset($_SESSION['levelup'])){echo'<strong class="me-auto">Level Up!</strong>';unset($_SESSION['levelup']);}
                else{echo'<strong class="me-auto">Tappa visitata!</strong>';}?>
              <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
              <p style="color:green">+200XP</p>
            </div>
          </div>
        </div>
    </div>
    <!-- BARRA LIKE COMMENTO -->
    <?php
    if ($visitata) {
        echo'
        <div class="row justify-content-center" style="width:100%" >
            <div class="col-2" id="miPiace" style="margin-left: 10px; ">
                <img class="cuore" src="'.$piace.'" style="width:40px; vertical-align: text-top">
            </div>
            <div class="col-2" id="commento">
                <a href="commenti.php?idTappa='.$id.'"><img  src="../../img/icons/commentoVuoto.png" style="width:40px; margin-top:6px"></a>                  
            </div>
        </div>
        ';
    }
    ?>

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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <script>
    $(function(){
    
        // opzionale, refresha all'infinito la pagina
        /*$.ajaxSetup ({
            cache: false
        });*/
    
        //quando clicco il bottone o quando faccio doppio tap sul carousel

        $(".cuore").click(function(){
            var idTappa = <?php echo $id; ?>;
            if($(".cuore").attr("src") == "../../img/icons/cuoreVuoto.png"){ 
                var url = "../percorsi/tappe/tappaSpecifica/aggiungiLike.php";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {idTappa: idTappa},
                    success: function(data){
                        $(".cuore").attr("src","../../img/icons/cuorePieno.png");
                    }
                });
            }
            else{ 
            var url = "../percorsi/tappe/tappaSpecifica/rimuoviLike.php";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {idTappa: idTappa},
                    success: function(data){
                        $(".cuore").attr("src","../../img/icons/cuoreVuoto.png");
                    }
                });
            }
        });
        $(".double-tap").dblclick(function(){
            var idTappa = <?php echo $id; ?>;
            if($(".cuore").attr("src") == "../../img/icons/cuoreVuoto.png"){ 
                var url = "../percorsi/tappe/tappaSpecifica/aggiungiLike.php";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {idTappa: idTappa},
                    success: function(data){
                        $(".cuore").attr("src","../../img/icons/cuorePieno.png");
                    }
                });
            }
            else{ 
            var url = "../percorsi/tappe/tappaSpecifica/rimuoviLike.php";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {idTappa: idTappa},
                    success: function(data){
                        $(".cuore").attr("src","../../img/icons/cuoreVuoto.png");
                    }
                });
            }
        });
    });


        

    </script>
</body>

</html>
<?php
//unset($nomePercorso);
?>