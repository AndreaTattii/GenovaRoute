<?php
session_start();

?>
<!doctype html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
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
    <link rel="icon" href="img/g.png" type="image/icon type">
</head>

<body class="d-flex flex-column min-vh-100">


    <!-- NAVBAR -->
    <div class="container fixed-bottom" style="background-color: white; border-top-color:black;  border-top-style: solid; border-top-width: 1px; height: 70px;">
        <div class="row  justify-content-center" style="padding-top: 15px;">
            <div class="col s-4">
                <center>
                    <a class="navbar-brand" href="./">
                        <img src="../../img/icons/percorsoSfondo.png">
                    </a>
                </center>

            </div>
            <div class="col s-4" style="padding-top: 15px; ">
                <center>
                    <a class="navbar-brand" href="../scanner/index.php ">
                        <img src="../../img/icons/scannerizza.png">
                    </a>
                </center>

            </div>
            <div class="col s-4" style="padding-top: 15px; ">
                <center>
                    <a class="navbar-brand" href="../profilo/index.php">
                        <img src="../../img/icons/account.png">
                    </a>
                </center>
            </div>
        </div>
    </div>



    <!-- NAVBAR ALTA -->
    <div class="container fixed-top">
        <div class="row justify-content-center align-items-center" style="background-color: #B30000;  padding-top: 10px; height:60px">

            <div class="col ">
                <h1 style="font-family: 'Amiri', serif; color: white; font-weight: bold; text-align: center;">GrovaGo</h1>
            </div>
        </div>
    </div>

    

    <!-- CONTENUTO PAGINA -->

    <div class="container" style="margin:0px; padding:0px">
    <br>
    <br>
    <br>
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
        $sql = "SELECT * FROM percorso ORDER BY (SELECT COUNT(*) AS numero_tappe FROM percorso, tappa, tappa_appartiene_percorso WHERE id_percorso=percorso.id AND id_tappa=tappa.id)";
        if ($result = $connessione->query($sql)) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_array()) { //da risolvere il decentramento verticale del bottone in ogni card
                    $i++;
                    if ($i % 2 == 0) {
                        $coloreRiga = "white";
                    } else {
                        $coloreRiga = "#F0F0F0";
                    }
                    $sql2 = "SELECT * FROM utente_percorre_tappa WHERE email = '" . $_SESSION['email'] . "' AND id_tappa IN (SELECT id_tappa FROM tappa_appartiene_percorso, percorso WHERE id_percorso=" . $row['id'] . ");";
                    
                    $quanteTappeQuery = "SELECT MAX(ordine)  
                        FROM  Tappa_Appartiene_Percorso
                        WHERE id_percorso =  " . $row['id'] . ";";

                    if ($risultato = $connessione->query($quanteTappeQuery)) {
                        $row3 = $risultato->fetch_assoc();
                        $quanteTappe = $row3['MAX(ordine)']+1;
                    } else {
                        echo "Impossibile eseguire la quante tappe query";
                    }
                    if ($result2 = $connessione->query($sql2)) {
                        
                    } else {
                        echo "Errore: " . $connessione->error;
                    }

                    $primaCittaQuery = "SELECT città FROM tappa WHERE id IN (SELECT id_tappa FROM tappa_appartiene_percorso WHERE id_percorso = " . $row['id'] . " AND ordine = 0);";
                    if ($risultato = $connessione->query($primaCittaQuery)) {
                        $riga = $risultato->fetch_assoc();
                        $primaCitta = $riga['città'];
                    } else {
                        echo "Errore nella query: " . $primaCittaQuery . "<br>" . $connessione->error;
                    }
                    $border="border-top:none;";
                    if($i == 0){
                        $border = "";
                    }

                    echo '
                        <form action="tappe/index.php" method="post">
                            <div class="card " style="'.$border.' border-radius:0px;  text-align: left;">
                                <div class="card-header" style="background-color:white; margin-left:0px; padding-left:0px">
                                    <p class="card-title"><img src="../../img/icons/marker.png" style="width: 30px; margin-bottom: 15px; ">'.$primaCitta.'</p>
                                </div>
                                <img src="'.$row['copertina']. '" class="card-img-top" alt="..." style=" border-radius:0px">
                                <div class="card-body" style="text-align: center;">
                                    <input type="hidden" name="idPercorso" value="' . $row['id'] . '">
                                    <h5 class="card-title"><input type="submit" value=" ' . $row['nome'] . '" style=" text-decoration: none; color: #B30000; font-size:18px; border: none; background-color:white"></h5>
                                    <p class="card-text">'.$row['descrizione'].'</p>
                                </div>
                            </div>
                        </form>
                    ';
                }
            } else {
                echo "Non ci sono percorsi salvati nel database";
            }
        } else {
            echo "Impossibile eseguire la query";
        }
        ?>
        <div class="row">

        </div>
        <div class="row">
            
        </div>
        <br>
        <br>
        <br>
        <br>
    </div>



    

    <br>
    <br>
    <br>
    <br>
    <br>
    <script>
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