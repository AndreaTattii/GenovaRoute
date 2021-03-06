<?php
session_start();
if(!isset($_SESSION['tip'])){
    $_SESSION['tip']=0;
}
//error_reporting(0);


?>
<!doctype html>
<html>

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


    <!-- NAVBAR BASSA -->
    <div class="container fixed-bottom" style="background-color: white; border-top-color:black;  border-top-style: solid; border-top-left-radius: 25px;border-top-right-radius: 25px; border-top-width: 1px; height: 50px;">
        <div class="row  justify-content-center" >
            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="./">
                        <img id="percorsoSfondo" src="../../img/icons/percorsoRosso.png">
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
        <div class="row justify-content-center align-items-center" style="background-color: #B30000;  padding-top: 10px; height:60px">
            <div class="col-2" >
                <a class="navbar-brand" href="faq.php" >
                    <img id="percorsoSfondo" src="../../img/icons/questionMark.png" style="width:17px;padding-bottom:10px;">
                </a>
            </div>
            <div class="col-8" onclick="toCima()">
                <h1  style=" color: white; font-weight: bold; text-align: center;">Percorsi</h1>
            </div>
            <div class="col-2">

            </div>
        </div>
    </div>

    

    <!-- CONTENUTO PAGINA -->

    <div class="container" style="margin:0px; padding:0px" id="Logo">
    <br>
    <br>
    <br>
    <?php
    if(isset($_POST['ordina'])){
    $ordina = $_POST['ordina'];
    //echo $ordina;
    }
    ?>

    <div id="contenuto">
        <div class="accordion accordion-flush"  id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne" >
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                      Ordina per: &nbsp; <?php if(isset($ordina) && $ordina=="like"){echo' <strong style="color:#B30000"> Like</strong>';}
                                        if(isset($ordina) && $ordina=="commenti"){echo' <strong style="color:#B30000"> Commenti</strong>';}  
                                        if(isset($ordina) && $ordina=="time"){echo' <strong style="color:#B30000"> Recenti</strong>';}  
                                        if(isset($ordina) && $ordina=="visitati"){echo' <strong style="color:#B30000"> Visite</strong>';} 
                                  ?>
                    </button>
                </form>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div id="orderLike" class="accordion-body">
                    <form method="POST" action="index.php">
                        <input type="hidden" name="ordina" value="like">
                        <button type="submit" style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">Pi?? like</button>
                    </form>
                </div>
              </div>
              <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <form method="POST" action="index.php">
                        <input type="hidden" name="ordina" value="time">
                        <button type="submit" style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">Pi?? recenti</button>
                    </form>
                </div>
              </div>
              <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <form method="POST" action="index.php">
                        <input type="hidden" name="ordina" value="commenti">
                        <button type="submit" style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">Pi?? commenti</button>
                    </form>
                </div>
              </div>
              <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <form method="POST" action="index.php">
                        <input type="hidden" name="ordina" value="visitati">
                        <button type="submit" style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">Pi?? visitati</button>
                    </form>
                </div>
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

            if(isset($ordina) && $ordina=="like"){
                //riempo la colonna like_tot per ogni percorso
                $sql = "SELECT * FROM percorso";
                if ($result = $connessione->query($sql)) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_array()) { 
                            $sql2="UPDATE percorso SET like_tot=(SELECT COUNT(*)
                                                                 FROM utente_percorre_tappa, percorso, tappa_appartiene_percorso
                                                                 WHERE tappa_appartiene_percorso.id_percorso=".$row['id']."
                                                                 AND tappa_appartiene_percorso.id_percorso=percorso.id
                                                                 AND tappa_appartiene_percorso.id_tappa=utente_percorre_tappa.id_tappa
                                                                 AND utente_percorre_tappa.piace=1)
                                   WHERE id=".$row['id'].";";
                            $result2 = $connessione->query($sql2);
                        }
                    }
                }
                $sql = "SELECT * FROM percorso ORDER BY (like_tot)DESC";
            }
            else{
                if(isset($ordina) && $ordina=="time"){
                    $sql = "SELECT * FROM percorso ORDER BY (dataInserimento)DESC";
                }
                else{
                    if(isset($ordina) && $ordina=="commenti"){
                        //riempo la colonna commenti_tot per ogni percorso
                        $sql = "SELECT * FROM percorso";
                        if ($result = $connessione->query($sql)) {
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_array()) { 
                                    $sql2="UPDATE percorso SET commenti_tot=(SELECT COUNT(*)
                                                                         FROM utente_percorre_tappa, percorso, tappa_appartiene_percorso
                                                                         WHERE tappa_appartiene_percorso.id_percorso=".$row['id']."
                                                                         AND tappa_appartiene_percorso.id_percorso=percorso.id
                                                                         AND tappa_appartiene_percorso.id_tappa=utente_percorre_tappa.id_tappa
                                                                         AND utente_percorre_tappa.commento IS NOT NULL)
                                           WHERE id=".$row['id'].";";
                                    $result2 = $connessione->query($sql2);
                                }
                            }
                        }
                        $sql = "SELECT * FROM percorso ORDER BY (commenti_tot)DESC";    
                    }
                    else{
                        if(isset($ordina) && $ordina=="visitati"){
                            //riempo la colonna visite_tot per ogni percorso
                            $sql = "SELECT * FROM percorso";
                            if ($result = $connessione->query($sql)) {
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_array()) { 
                                        $sql2="UPDATE percorso SET visite_tot=(SELECT COUNT(*)
                                                                             FROM utente_percorre_tappa, percorso, tappa_appartiene_percorso
                                                                             WHERE tappa_appartiene_percorso.id_percorso=".$row['id']."
                                                                             AND tappa_appartiene_percorso.id_percorso=percorso.id
                                                                             AND tappa_appartiene_percorso.id_tappa=utente_percorre_tappa.id_tappa)
                                               WHERE id=".$row['id'].";";
                                        $result2 = $connessione->query($sql2);
                                    }
                                }
                            }
                            $sql = "SELECT * FROM percorso ORDER BY (visite_tot)DESC";  
                        }
                        else{
                            $sql = "SELECT * FROM percorso ORDER BY (dataInserimento)DESC";
                        }
                    }

                }

            }


            $i = 0;
            if ($result = $connessione->query($sql)) {
                if ($result->num_rows > 0) {
                    echo '<div id="mostra">';
                    while ($row = $result->fetch_array()) { //da risolvere il decentramento verticale del bottone in ogni card
                        $i++;
                        

                        //query per vedere se utente ha completato percorso
                        $sql2 = "SELECT * FROM utente_percorre_tappa WHERE email = '" . $_SESSION['email'] . "' 
                                 AND id_tappa IN (SELECT id_tappa FROM tappa_appartiene_percorso, percorso 
                                                  WHERE id_percorso=" . $row['id'] . ");";
                        
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

                        if ($result2 = $connessione->query($sql2)) {
                            $nTappeCompletate=$result2->num_rows;
                            if ($result2->num_rows == $quanteTappe) {
                                $completato=true;
                            } else {
                                $completato=false;
                            }
                        } else {
                            echo "Errore: " . $connessione->error;
                        }
                        $percentuale=($nTappeCompletate/$quanteTappe)*100;
                        if($percentuale<=50){
                            $colorePercentuale="progress-bar bg-danger";
                        }else if($percentuale<=99){
                            $colorePercentuale="progress-bar bg-warning";
                        }else{
                            $colorePercentuale="progress-bar bg-success";
                        }

                        //query per vedere la prima citt?? del percorso
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
                                        <a href="../ricerca/mappaCitta.php?citta='.$primaCitta.'&provenienza=percorsi/index" style="text-decoration:none; color:black;"><p class="card-title"><img src="../../img/icons/marker.png" style="width: 30px; margin-bottom: 15px; ">'.$primaCitta.'</p></a>
                                    </div>
                                        <button style=" background-color: transparent; border:none;"><img style="border: 3px solid #B30000; position: relative;z-index: 1;" src="../../img/percorsi/'.$row['id'].'.png" class="card-img-top" alt="..." style=" border-radius:0px;"></button>
                                        <!--<img src="../../img/icons/tick.png" style="width:20%;  position: relative;z-index: 2;top: -150px;left: 150px;"> -->
                                    <div class="card-body" style="text-align: center; margin-bottom:20px">
                                        <div class="progress">
                                            <div class="'.$colorePercentuale.'" role="progressbar" style="width: '.$percentuale.'%" aria-valuenow="'.$percentuale.'" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p>'.$nTappeCompletate.'/'.$quanteTappe.'<img src="../../img/icons/occhioCancellato.png" style="width:25px; padding-bottom:2px"></p>
                                        <img class="preferito" id="' . $row['id'] . '" style="width:10%; margin:auto; padding-bottom:3px;" src= "'.$immagine.'" >
                                        <input type="hidden" name="idPercorso" value="' . $row['id'] . '">
                                        <h5 class="card-title"><input type="submit" value=" ' . $row['nome'] . '" style="font-weight:bold; text-decoration: none; color: #B30000; font-size:18px; border: none; background-color:white"></h5>
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
        </div>

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
        <div>
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
            <br>
            <br>
            <br>
            <br>
            <?php
            if($_SESSION['tip']==0){
                $_SESSION['tip']=$_SESSION['tip']+1;
                echo'<center><p style="text-align:center; font-size:15px;"><strong>Tip:</strong> in home, clicca su "Genova Route" per tornare in cima alla lista</p></center>';
            }
            else{
                if($_SESSION['tip']==1){
                    $_SESSION['tip']=$_SESSION['tip']+1;
                    echo'<center><p style="text-align:center; font-size:15px;"><strong>Tip:</strong> nella pagina della tappa, puoi navigare tra le tappe con le freccette rosse oppure fare uno swipe</p></center>';
                }
                else{
                    if($_SESSION['tip']==2){
                        $_SESSION['tip']=$_SESSION['tip']+1;
                        echo'<center><p style="text-align:center; font-size:15px;"><strong>Tip:</strong> aggiungi i percorsi ai preferiti cliccando sulla stella per poi visualizzarli sul tuo profilo!</p></center>';
                    }
                    else{
                        if($_SESSION['tip']==3){
                            $_SESSION['tip']=$_SESSION['tip']+1;
                            echo'<center><p style="text-align:center; font-size:15px;"><strong>Tip:</strong> scannerizza pi?? tappe possibili per ottenere pi?? punti xp e scalare la classifica!</p></center>';
                        }
                        else{
                            if($_SESSION['tip']==4){
                                $_SESSION['tip']=0;
                                echo'<center><p style="text-align:center; font-size:15px;"><strong>Tip:</strong> non trovi la tappa che cercavi? Usa la barra di ricerca cliccando sulla lente nel menu in basso!</p></center>';
                            }
                        }
                    }
                }
            }
            ?>       
        </div>
    </div>
    <script>
        $(window).on('load', function() {
            $(".loader-wrapper").fadeOut("slow");
        });
    </script>
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
                if($('#' + id).attr("src") == "../../img/icons/emptyStarRed.png"){ //se stella ?? vuota e quindi devo inserire il preferito
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
                else{ //se stella ?? piena e quindi devo togliere il preferito
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
            //quando viene cliccato l'id orderLike, eseguo la query con ajax
            //$("#orderLike").click(function(){
            //    //alert("like");
            //    $.ajax({
            //        type: "POST",
            //        data: {ordina: "like"},
            //        success: function(data){
            //            //$("#contenuto").html('');
            //            //$("#contenuto").html(data);
            //        }
            //    });
            //});
            //$("#orderTime").click(function(){
            //    //alert("like");
            //    $.ajax({
            //        type: "POST",
            //        data: {ordina: "time"},
            //        success: function(data){
            //            //$("#contenuto").html('');
            //            //$("#contenuto").html(data);
            //        }
            //    });
            //});
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

        function toCima() {
            const element = document.getElementById("Logo");
            element.scrollIntoView();
        }
    </script>
</body>

</html>