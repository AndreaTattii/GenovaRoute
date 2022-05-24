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
                        <img id="percorsoSfondo" src="../../img/icons/percorsoSfondo.png">
                    </a>
                </center>

            </div>
            <div class="col s-4" style="padding-top: 15px; ">
                <center>
                    <a class="navbar-brand" href="../scanner/index.php ">
                        <img style="width:25px" src="../../img/icons/scannerizza.png">
                    </a>
                </center>

            </div>
            <div class="col s-4" style="padding-top: 15px; ">
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
        <div class="row justify-content-center align-items-center" style="background-color: #B30000;  padding-top: 10px; height:60px">

            <div class="col ">
                <h1 style="font-family: 'Amiri', serif; color: white; font-weight: bold; text-align: center;">GrovaGO</h1>
            </div>
        </div>
    </div>

    

    <!-- CONTENUTO PAGINA -->

    <div class="container" style="margin:0px; padding:0px">
    <br>
    <br>
    <br>
    <br>
        <div style="margin:0;display: flex; justify-content: center;">
            <input style="text-align:center; margin:0;" type="text" placeholder="Cerca un percorso..." name="ricerca">
        </div>
        <div id="contenuto"></div>
        
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
                    echo '<div id="mostra">';
                    while ($row = $result->fetch_array()) { //da risolvere il decentramento verticale del bottone in ogni card
                        $i++;
                        if ($i % 2 == 0) {
                            $coloreRiga = "white";
                        } else {
                            $coloreRiga = "#F0F0F0";
                        }

                        //query per vedere se utente ha completato percorso
                        $sql2 = "SELECT * FROM utente_percorre_tappa 
                                WHERE email = '" . $_SESSION['email'] . "' 
                                AND id_tappa IN (SELECT id_tappa FROM tappa_appartiene_percorso, percorso 
                                                WHERE id_percorso=" . $row['id'] . ");
                                ";

                        if ($result2 = $connessione->query($sql2)) {

                        } else {
                            echo "Errore: " . $connessione->error;
                        }

                        //query per vedere quante tappe 
                        $quanteTappeQuery = "SELECT MAX(ordine)  
                            FROM  Tappa_Appartiene_Percorso
                            WHERE id_percorso =  " . $row['id'] . ";";
                        if ($risultato = $connessione->query($quanteTappeQuery)) {
                            $row3 = $risultato->fetch_assoc();
                            $quanteTappe = $row3['MAX(ordine)']+1;
                        } else {
                            echo "Impossibile eseguire la quante tappe query";
                        }

                        //query per vedere la prima città del percorso
                        $primaCittaQuery = "SELECT citta FROM tappa 
                                            WHERE id IN (SELECT Tappa.id 
                                                        FROM tappa_appartiene_percorso, tappa 
                                                        WHERE id_percorso = " . $row['id'] . " 
                                                                AND ordine = 0
                                                                AND tappa.id = tappa_appartiene_percorso.id_tappa
                                                        );
                                        ";
                        if ($risultato = $connessione->query($primaCittaQuery)) {
                            $riga = $risultato->fetch_assoc();
                            $primaCitta = $riga['citta'];
                        } else {
                            echo "Errore nella query: " . $primaCittaQuery . "<br>" . $connessione->error;
                        }
                        $border="border-top:none;";
                        if($i == 0){
                            $border = "";
                        }
                        //fai una query per vedere se l'utente ha aggiunto il percorso ai preferiti
                        $sql3 = "SELECT * FROM utente_preferisce_percorso 
                                WHERE email = '" . $_SESSION['email'] . "' 
                                AND id_percorso = " . $row['id'] . ";
                                ";
                        if ($result3 = $connessione->query($sql3)) {
                            if ($result3->num_rows > 0) {
                                $immagine = "../../img/icons/fullStarRed.png" ;
                            } else {
                                $immagine = "../../img/icons/emptyStarRed.png";
                            }
                        } else {
                            echo "Errore: " . $connessione->error;
                        }
                    
                        echo '
                            <br>
                            <form action="tappe/index.php" method="post">
                                <div class="card " style="border:none;  text-align: left;">
                                    <div class="card-header" style="background-color:white; margin-left:0px; padding-left:0px;border:none; ">
                                        <p class="card-title"><img src="../../img/icons/marker.png" style="width: 30px; margin-bottom: 15px; ">'.$primaCitta.'</p>
                                    </div>
                                    <button style=" background-color: transparent; border:none;"><img style="border: 3px solid #B30000" src="../../img/percorsi/'.$row['id'].'.png" class="card-img-top" alt="..." style=" border-radius:0px;"></button>
                                    <div class="card-body" style="text-align: center; border-bottom: 2px dotted black;">

                                    <img class="preferito" id="' . $row['id'] . '" style="width:8%; margin:auto; padding-bottom:3px;" src= "'.$immagine.'" >


                                        <input type="hidden" name="idPercorso" value="' . $row['id'] . '">
                                        <h5 class="card-title"><input type="submit" value=" ' . $row['nome'] . '" style=" text-decoration: none; color: #B30000; font-size:18px; border: none; background-color:white"></h5>
                                        <p class="card-text">'.$row['descrizione'].'</p>
                                    </div>
                                </div>
                            </form>
                        ';
                    }
                    echo'</div>';
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
        $(function(){
    
            // opzionale, refresha all'infinito la pagina
            $.ajaxSetup ({
                cache: false
            });
           
            //quando clicco il bottone eseguo la query con ajax
            $(".preferito").click(function(){
                var idPercorso = $(this).attr("id");
                //alert(idPercorso);
                var id = $(this).attr("id");
                if($('#' + id).attr("src") == "../../img/icons/emptyStarRed.png"){ //se stella è vuota e quindi devo inserire il preferito
                    var url = "aggiungiPreferito.php";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {idPercorso: idPercorso},
                        success: function(data){
                            $('#' + id).attr("src","../../img/icons/fullStarRed.png");
                        }
                    });
                }
                else{ //se stella è piena e quindi devo togliere il preferito
                var url = "rimuoviPreferito.php";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {idPercorso: idPercorso},
                        success: function(data){
                            $('#' + id).attr("src","../../img/icons/emptyStarRed.png");
                        }
                    });
                }
            });
            $("input[name='ricerca']").keyup(function() {
                $.ajax({
                    type: "POST",
                    url: "suggestions.php",
                    data: {
                        query: $("input[name=ricerca]").val()
                    },
                    success: function(data) {
                        $("#contenuto").html(data);
                        //nascondi il div con id mostra
                        $("#mostra").hide();
                    }
                });
            });

        });
    </script>
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