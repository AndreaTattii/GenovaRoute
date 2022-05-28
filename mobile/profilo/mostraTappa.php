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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <title>Genova Route</title>
    <link rel="icon" href="../../../../img/G.png" type="image/icon type">
</head>

<body onload="toTappa()">


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
                <h1 onclick="toCima()" style=" color: white; font-weight: bold; text-align: center;  font-size: 20px;">Mi piace</h1>
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
                        AND Utente_percorre_tappa.piace = 1 
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
                if ($nMiPiace > 1) {
                    $persona = "persone";
                }
                echo '
                        <div class="card text-center" id="' . $row['id'] . '"  style="margin-top:20px; border-radius:0px; text-align: left;  margin:0px; border:none; ">
                            <div class="card-header" style="background-color:white; margin-left:0px; padding-left:0px; ">
                                <div class="row">

                                    <div class="col-2">
                                        <div class="dropdown ">
                                            <button type="button" class=" toggle" data-toggle="dropdown" style="background-color:white;  text-align:center; ">
                                                <img src="../../img/icons/hamburger-rosso.png" alt="Hamburger" width="30" height="30">
                                            </button>
                                            <div class="dropdown-menu" style="border:2px solid #b30000; width: 200px;">
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
                                                            <a class="dropdown-item" style="height:30px" href="../percorsi/tappe/index.php?idPercorso='.$row2['id'].'" style="height:20px">'.$row2['nome'].'</a>
                                                            <div class="dropdown-divider"></div>
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
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="margin:none; padding:none; height:225px;">
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
                        <div id="gestureZone" class="card-body" style="text-align: center; border:none; ">
                            <input type="hidden" name="idPercorso" value="' . $row['id'] . '">
                            <p class="card-text" style="text-align:justify; border:none; margin-top:none; "><b>Piace a:</b>  ' . $nMiPiace . ' ' . $persona . '</p>

                            <p class="card-text" style="text-align:justify; border:none;"><b>' . $row['nome'] . ':</b>  ' . $row['descrizione'] . '</p>
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
    <script>
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