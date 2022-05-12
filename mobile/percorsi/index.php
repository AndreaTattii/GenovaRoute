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
    <div class="container fixed-bottom" style="background-color: white; border-top-color:black;  border-top-style: solid; border-top-width: 4px; height: 70px;">
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
        <div class="row justify-content-center align-items-center" style="background-color: #B30000; border-bottom-color:black;  border-bottom-style: solid; border-bottom-width: 2px; padding-top: 10px; height:60px">

            <div class="col ">
                <h1 style="font-family: 'Amiri', serif; color: white; font-weight: bold; text-align: center;">Genova Route</h1>
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
                    echo '
                    <form action="tappe/index.php" method="post">
                        <div class="container " style="width:100%;  background-color: ' . $coloreRiga . '; padding-bottom: 15px; padding-top: 15px">
                            <div class="row justify-content-center " style="background-color: ' . $coloreRiga . ';">
                                <div class="col-xs ">
                                    <div class="row">
                                        <input type="hidden" name="idPercorso" value="' . $row['id'] . '">
                                        <input type="submit" value="' . $row['nome'] . '" style="background-color: ' . $coloreRiga . '; text-decoration: none; color: #B30000; font-size:20px; border: none; font-weight: bold; float: left;"> 
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <center>
                                        <p>'.$row['descrizione'].'</p>
                                    </center>
                                    
                                </div>
                                <div class="row justify-content-center" >                               
                                        <button type="submit" class="btn btn-primary" style="width:100px; background-color: #B30000; border-color:#B30000; font-size: 15px; color:white ; text-align: center; float: right;">Visualizza</button>                                   

                                </div>
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