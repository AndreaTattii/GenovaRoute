<?php
session_start();
/* ACCENTI */
//error_reporting(0);
//header('Content-Type: text/html; charset=ISO-8859-1');
if (isset($_GET['idTappa'])) {
    $idTappa = $_GET['idTappa'];
}
if (isset($_GET['email'])) {
    $email = $_GET['email'];
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


    <!-- CSS DROPDOWN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <title>Genova Route</title>
    <link rel="icon" href="../../../../img/G.png" type="image/icon type">
</head>

<body onload="toTappa()">


    <!-- NAVBAR BASSA -->
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
                        <a class="navbar-brand" href="../ricerca/index.php">
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
                        <a class="navbar-brand" href="../percorsiPersonali/index.php">
                            <img style="width:25px" src="../../img/icons/aggiungiPercorso.png">
                        </a>
                    </center>

                </div>
                <div class="col s-3" style="padding-top:10px">
                    <center>
                        <a class="navbar-brand" href="./">
                            <img id="account" src="../../img/icons/accountRosso.png">
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
                <h1 onclick="toCima()" style=" color: white; font-weight: bold; text-align: center;  font-size: 20px;">Visitate</h1>
            </div>
            <div class="col-2">

            </div>
        </div>
    </div>

    <div style="height:60px" id="cima">

    </div>



    <!-- CONTENUTO PAGINA -->
    <?php
    $sql = " SELECT * 
                    FROM Tappa, utente_percorre_tappa
                    WHERE email = '" . $email . "'
                        AND id = id_tappa
                        ORDER BY (data)DESC
        ";
    if ($result = $connessione->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data = $row['data'];
                $arrayData = explode(' ', $data);
                $giornoMeseAnno = explode('-', $arrayData[0]);
                $anno = $giornoMeseAnno[0];
                $mese = $giornoMeseAnno[1];
                $giorno = $giornoMeseAnno[2];


                //UTENTE HA COMMENTATO?
                $commentato = false;
                if($row['commento'] != null){
                    $commentato = true;
                }


                // CATTURO USERNAME
                $sql2 = "SELECT username FROM utente
                        WHERE email = '" . $email. "'
                    ";
                if ($result2 = $connessione->query($sql2)) {
                    if ($result2->num_rows > 0) {
                        if($row2 = $result2->fetch_assoc()){
                            $username = $row2['username'];
                        }
                    }
                }else{
                    echo "Impossibile eseguire la query: $sql2. " . $connessione->error;

                }

                // UTENTE HA VIUALIZZATO?
                $sql2 = "SELECT * FROM utente_percorre_tappa
                        WHERE email = '" . $email . "'
                        AND id_tappa = ".$row['id']."
                    ";
                $visitata = false;
                if ($result2 = $connessione->query($sql2)) {
                    if ($result2->num_rows > 0) {
                        $visitata = true;
                    }
                }else{
                    echo "Impossibile eseguire la query: $sql2. " . $connessione->error;

                }

                 //CONTROLLO SE UTENTE HA MESSO MI PIACE A TAPPA
                $sql2 = "SELECT * FROM utente_percorre_tappa
                        WHERE email = '" . $email . "'
                            AND id_tappa = ".$row['id']."
                            AND piace = 1";
                $piace = "../../img/icons/cuoreVuoto.png";
                if ($result2 = $connessione->query($sql2)) {
                    if ($result2->num_rows > 0) {
                        $piace = "../../img/icons/cuorePieno.png";
                    }
                }
                $sql2 = "SELECT COUNT(piace)
                            FROM Utente_percorre_tappa
                            WHERE piace = 1
                            AND id_tappa = " . $row['id'] . "
                    ";
                if ($result2 = $connessione->query($sql2)) {
                    if ($row2 = $result2->fetch_assoc()) {
                        $nMiPiace = $row2['COUNT(piace)'];
                    }
                }
                $persona = "persona";
                if ($nMiPiace != 1) {
                    $persona = "persone";
                }

                $id = $row['id'];
                echo '
                        <div class="card text-center" id="' . $row['id'] . '"  style="margin-top:50px; border-radius:0px; text-align: left;  margin:0px; border:none; ">
                            <div class="card-header" style="background-color:white; margin-left:0px; padding-left:0px; ">
                                <div class="row">

                                    <div class="col-2">
                                        <div class="dropdown ">
                                            <button type="button" class=" toggle" data-toggle="dropdown" style="background-color:white;  text-align:center; ">
                                                <img src="../../img/icons/hamburger-rosso.png" alt="Hamburger" width="30" height="30">
                                            </button>
                                            <div class="dropdown-menu" style="border:2px solid #b30000; width: 300px;">
                    ';
                                            $sql2 = "SELECT *
                                                    FROM Percorso, Tappa_appartiene_percorso
                                                    WHERE Percorso.id = Tappa_appartiene_percorso.id_percorso
                                                        AND id_tappa = ".$row['id']."
                                                ";

                                            if($result2 = $connessione->query($sql2)){
                                                if ($result2->num_rows > 0) {
                                                    while ($row2 = $result2->fetch_assoc()){
                                                        echo'
                                                            <a class="dropdown-item" style="height:40px" href="../percorsi/tappe/index.php?idPercorso='.$row2['id'].'" >'.$row2['nome'].'
                                                                <img src="../../img/icons/percorso.png" alt="Hamburger" width="20" height="20">
                                                            </a>
                                                        ';
                                                    }

                                                }
                                                else{
                                                    echo 'nessun risultato';
                                                }

                                            }
                                            else{
                                                echo "Impossibile eseguire la query: $sql2. " . $connessione->error;
                                            }
                

                    echo '
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-8">
                                        <p class="card-title" style="font-weight: bold; margin-left: 10px;">' . $row['nome'] . '</p>
                                    </div>
                                    <div class="col-2">

                                    </div>
                                </div>
                            </div>
                            <div id="carouselExampleControls" class="carousel slide double-tap" data-bs-ride="carousel" style="margin:none; padding:none; height:225px;">
                                <div class="carousel-indicators" style="background-color:white; width:100%; margin:auto">
                                    <button style="background-color:#B30000;color:#B30000" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button style="background-color:#B30000;color:#B30000" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button style="background-color:#B30000;color:#B30000" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner double-tap" id="double-tap" style="align-items: center;">
                                    <div class="carousel-item active" data-bs-interval="9999999999999999" style="align-items:center">
                                        <img src="../../img/tappe/' . $row['id'] . '.1.png" class="d-block w-100" alt="..." style="max-height: 200px; margin-left: auto; margin-right: auto;">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="9999999999999999" style="align-items:center">
                                        <img src="../../img/tappe/' . $row['id'] . '.2.png" class="d-block w-100" alt="..." style=" max-height: 200px; margin-left: auto; margin-right: auto;">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="9999999999999999" style="align-items:center">
                                        <img src="../../img/tappe/' . $row['id'] . '.3.png" class="d-block w-100" alt="..." style=" max-height: 200px; margin-left: auto; margin-right: auto;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
                        // BARRA MI PIACE E COMMENTO
                        if ($visitata) {
                            echo'
                            <div class="row justify-content-center" style="width:100%" >
                                <div class="col-2" id="miPiace" style="margin-left: 10px; ">
                                    <img class="cuore" id="'.$row['id'].'cuore" src="'.$piace.'" style="width:40px; vertical-align: text-top">
                                </div>
                                <div class="col-2" id="commento">
                                    <a href="commenti.php?idTappa='.$row['id'].'"><img  src="../../img/icons/commentoVuoto.png" style="width:40px; margin-top:6px"></a>                  
                                </div>
                            </div>
                            ';
                        }
                        echo '
                        <div id="gestureZone" class="card-body" style="text-align: center; border:none; ">
                            <input type="hidden" name="idPercorso" value="' . $row['id'] . '">
                            <p class="card-text" style="text-align:justify; border:none; margin-top:none; "><b>Piace a:</b>  ' . $nMiPiace . ' ' . $persona . '</p>
                    ';
                           
                    if($commentato){
                        echo'    <p class="card-text" style="text-align:justify; border:none;"><b>' . $username. ':</b>  ' . $row['commento'] . '</p> ';
                    }else{
                        echo'    <p class="card-text" style="text-align:justify; border:none;"><b>' . $row['nome']. ':</b>  ' . $row['descrizione'] . '</p> ';

                    }
                    
                    
                    echo '
                            <p style="text-align:justify; border:none; color:#808080;">' . $giorno . '/' . $mese . '/' . $anno . '</p>
                        </div>
                    
                        <br>
                        <br>
                    
                    ';
            }
        } else {
        }
    } else {
        echo "Impossibile eseguire la query: $sql. " . $connessione->error;
        //mostra errore della query
    }
    ?>


    <br>
    <br>
    <br>
    <br>
    <script>
        function toTappa() {
            const element = document.getElementById("<?php echo $idTappa ?>");
            element.scrollIntoView();
        }
    </script>
    </div>

    <br>
    <br>
    <div class="loader-wrapper">
        <div id="container">
            <svg viewBox="0 0 100 100">
                <defs>
                  <filter id="shadow">
                    <feDropShadow dx="0" dy="0" stdDeviation="1.5" 
                      flood-color="#fc6767"/>
                  </filter>
                </defs>
            <circle id="spinner" style="fill:transparent;stroke:#dd2476;stroke-width: 7px;stroke-linecap: round;filter:url(#shadow);" cx="50" cy="50" r="45"/>
            </svg>
        </div>
    </div>
    <script>
        $(window).on('load', function() {
            $(".loader-wrapper").fadeOut("slow");
        });
    </script>
    <script>
        //quando clicco sull'immagine del cuore pieno faccio la query ajax rimuoviLike.php e cambio l'immagine in un cuore vuoto, altrimenti faccio la query ajax aggiungiLike.php e cambio l'immagine in un cuore pieno
        $(document).ready(function () {
            $.ajaxSetup ({
                cache: false
            });

            $(".cuore").click(function(){
                var idTappa = $(this).attr("id");
                var id = $(this).attr("id");
                if($('#' + id).attr("src") == "../../img/icons/cuoreVuoto.png"){ 
                    var url = "aggiungiLike.php";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {idTappa: idTappa},
                        success: function(data){
                            $('#' + id ).attr("src","../../img/icons/cuorePieno.png");
                        }
                    });
                }
                else{ 
                var url = "rimuoviLike.php";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {idTappa: idTappa},
                        success: function(data){
                            $('#' + id ).attr("src","../../img/icons/cuoreVuoto.png");
                        }
                    });
                }
            });
        });
        function toCima() {
            const element = document.getElementById("cima");
            element.scrollIntoView();
        }
    </script>

</body>

</html>
<?php
//unset($nomePercorso);
?>