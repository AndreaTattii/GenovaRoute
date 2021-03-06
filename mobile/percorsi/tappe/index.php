<?php
session_start();
if(isset($_POST['idPercorso'])){
    $_SESSION['idPercorso'] = $_POST['idPercorso'];
}
if(isset($_GET['idPercorso'])){
    $_SESSION['idPercorso'] = $_GET['idPercorso'];
}

$host = "127.0.0.1";
$user = "root";
$pass = "";
$database = "genovaroute";

$connessione = new mysqli($host, $user, $pass, $database);

$query = "SELECT nome FROM Percorso WHERE id = '".$_SESSION['idPercorso']."'";

if($result = $connessione->query($query)){
    while($row = $result->fetch_assoc()){
        
        $_SESSION['nomePercorso'] = $row['nome'];
    }
}

// NUMERO DI TAPPE
$sql = "SELECT MAX(ordine)  
    FROM  Tappa_Appartiene_Percorso
    WHERE id_percorso =  " . $_SESSION['idPercorso'] . "";

if ($result = $connessione->query($sql)) {
    $row = $result->fetch_assoc();
    $quanteTappe = $row['MAX(ordine)']+1;
} else {
    echo "Impossibile eseguire la query2";
}
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
    <link rel="stylesheet" href="../../../css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">

    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,400;1,700&display=swap" rel="stylesheet">

    <title>Genova Route</title>
    <link rel="icon" href="../../../img/G.png" type="image/icon type">
</head>

<body class="d-flex flex-column min-vh-100">


    <!-- NAVBAR BASSA -->
    <div class="container fixed-bottom" style="background-color: white; border-top-color:black;  border-top-style: solid; border-top-left-radius: 25px;border-top-right-radius: 25px; border-top-width: 1px; height: 50px;">
        <div class="row  justify-content-center" >
            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="../">
                        <img id="percorsoSfondo" src="../../../img/icons/percorsoRosso.png">
                    </a>
                </center>

            </div>
            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="../../ricerca/index.php">
                        <img id="ricercaNavImg" src="../../../img/icons/searchBlack.png">
                    </a>
                </center>

            </div>

            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="../../scanner/index.php ">
                        <img style="width:25px" src="../../../img/icons/scannerizza.png">
                    </a>
                </center>

            </div>
            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="../../percorsiPersonali/index.php ">
                        <img style="width:25px" src="../../../img/icons/aggiungiPercorso.png">
                    </a>
                </center>

            </div>
            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="../../profilo/index.php">
                        <img id="account" src="../../../img/icons/account.png">
                    </a>
                </center>
            </div>
        </div>
    </div>


    <!-- NAVBAR ALTA -->
    <div class="container fixed-top" >
        <div class="row justify-content-center align-items-center" style="background-color: #B30000;  padding-top: 10px; height:60px">

            <div class="col-2">
                <a <?php if(isset($_SESSION['arrivoDaCercaPerPercorsi'])){unset($_SESSION['arrivoDaCercaPerPercorsi']);echo'href="../../ricerca/index.php"';}else{echo'href="../../percorsi/index.php"';}?> >
                    <img id="back" src="../../../img/icons/back.png">
                </a>
            </div>
            <div class="col-8">
                <h1 style=" font-size: 17px; color: white; font-weight: bold; text-align: center;"><?php echo $_SESSION['nomePercorso'] ?> </h1>
            </div>
            <div class="col-2">
                <center>
                    <a class="navbar-brand" href="mappaStatica.php?percorsi=<?php echo $_SESSION['idPercorso']; ?>">
                        <img id="percorsoSfondo" src="../../../img/icons/percorsoSfondo.png" style="width:50px">
                    </a>
                </center>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>

    <div class="container" style="margin:0px; padding:0px">
        <!-- CONTENUTO PAGINA -->
        <?php

        

        unset($_SESSION['ordine']);
        //error_reporting(0);

        if ($connessione === false) {
            die("Errore: " . $connessione->connect_error);
        }
        $i = 0;

        
        

        $sql = "SELECT tappa.nome AS nome, tappa_appartiene_percorso.ordine AS ordine, tappa.id AS id, via 
                FROM tappa, tappa_appartiene_percorso, percorso 
                WHERE tappa.id = tappa_appartiene_percorso.id_tappa 
                    AND tappa_appartiene_percorso.id_percorso = percorso.id 
                    AND percorso.id = " . $_SESSION['idPercorso'] . " ORDER BY tappa_appartiene_percorso.ordine;";
        if ($result = $connessione->query($sql)) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_array()) { 
                    if ($i % 2 == 0) {
                        $coloreRiga = "white";
                    } else {
                        $coloreRiga = "#F0F0F0";
                    }
                    //query per selezionare solo le tappe che sono state visitate e quindi scannerizzate
                    //$sql2 = "SELECT * FROM utente_percorre_tappa WHERE id_tappa = " . $row['id'] . " AND email = " . $_SESSION['email'] ."";
                    //fai una query per controllare se l'utente ha gi?? scannerizzato la tappa, ovvero se la sua la variabile di sessione email ?? presente nella tabella utente_percorre_tappa, se ?? presente allora la tappa ?? stata scannerizzata, altrimenti non ?? stata scannerizzata
                    $sql2 = "SELECT * FROM utente_percorre_tappa WHERE id_tappa = " . $row['id'] . " AND email = '" . $_SESSION['email'] . "';";
                    if ($result2 = $connessione->query($sql2)) {
                        if ($result2->num_rows > 0) {
                            $visualizzata = true;
                            $coloreBordo = " #B30000; padding:4px";
                        } else {
                            $visualizzata = false;

                            $coloreBordo = "white";

                        }
                    } else {
                        echo "Errore: " . $connessione->error;
                    }


                    // GESTIONE LINEA
                    $prec = $i -1;
                    //controllo tappa precedente
                    $sql2 = "SELECT * 
                            FROM utente_percorre_tappa, tappa_appartiene_percorso 
                            WHERE  email = '" . $_SESSION['email'] . "'
                                AND utente_percorre_tappa.id_tappa = tappa_appartiene_percorso.id_tappa
                                AND tappa_appartiene_percorso.ordine = ".$prec." 
                            ;";
                    $sql2="SELECT *
                            FROM utente_percorre_tappa
                            WHERE email = '".$_SESSION['email']."'
                                AND id_tappa IN (
                                                SELECT id_tappa
                                                FROM tappa_appartiene_percorso
                                                WHERE id_percorso = ".$_SESSION['idPercorso']."
                                                    AND ordine = ".$prec."
                                            )
                    ";
                    if ($result2 = $connessione->query($sql2)) {
                        if ($result2->num_rows > 0) {
                            $visualizzataPrec = true;
                        } else {

                            $visualizzataPrec = false;

                        }
                    } else {
                        echo "Errore: " . $connessione->error;
                    }

                    $succ = $i+1;
                    
                    //controllo tappa sucessiva
                    $sql2 = "SELECT * 
                            FROM utente_percorre_tappa, tappa_appartiene_percorso 
                            WHERE  email = '" . $_SESSION['email'] . "'
                            AND Utente_percorre_tappa.id_tappa = tappa_appartiene_percorso.id_tappa
                            AND tappa_appartiene_percorso.ordine = ".$succ." 
                            ;";
                    
                    $sql2="SELECT *
                            FROM utente_percorre_tappa
                            WHERE email = '".$_SESSION['email']."'
                                AND id_tappa IN (
                                                SELECT id_tappa
                                                FROM tappa_appartiene_percorso
                                                WHERE id_percorso = ".$_SESSION['idPercorso']."
                                                    AND ordine = ".$succ."
                                            )
                    ";
                    if ($result2 = $connessione->query($sql2)) {
                        if ($result2->num_rows > 0) {
                            $visualizzataSuc = true;
                        } else {

                            $visualizzataSuc = false;

                        }
                    } else {
                        echo "Errore: " . $connessione->error;
                    }

                    if(($visualizzataPrec ||  $i == 0) && $visualizzata ){
                        $linea=" border-left: 3px solid #B30000; height: 40px;   position: relative; left: 62px; margin-left: -3px; top: 0; ";

                        if($visualizzataSuc){
                            $linea2=" border-left: 3px solid #B30000; height: 40px;   position: relative; left: 62px; margin-left: -3px; top: 0;  ";
                        }else{
                            $linea2=" border-left: 3px dashed #B30000; height: 40px;   position: relative; left: 62px; margin-left: -3px; top: 0; margin-top:5px";

                        }
                        
                    }else{
                        if($visualizzataSuc  && $visualizzata){
                            $linea=" border-left: 3px solid #B30000; height: 40px;   position: relative; left: 62px; margin-left: -3px; top: 0; ";
                            $linea2=" border-left: 3px solid #B30000; height: 80px;   position: relative; left: 62px; margin-left: -3px; top: 0; ";
                        }else{
                            $linea=" border-left: 3px dashed #B30000; height: 40px;   position: relative; left: 62px; margin-left: -3px; top: 0; margin-bottom:px";
                            $linea2=" border-left: 3px dashed #B30000; height: 40px;   position: relative; left: 62px; margin-left: -3px; top: 0; ";

                        }
                        

                    }
                    //CATTURA MI PIACE
                    $sql2 = "SELECT COUNT(*) AS nMiPiace
                            FROM utente_percorre_tappa
                            WHERE id_tappa = ".$row['id']."
                                AND piace IS NOT NULL
                        ";
                    if ($result2 = $connessione->query($sql2)) {
                        if ($result2->num_rows > 0) {
                            if($row2 = $result2->fetch_array()){
                                $nMiPiace = $row2['nMiPiace'];
                            }
                        } else {
                        }
                    } else {
                        echo "Errore: " . $connessione->error;
                    }

                    //CATTURA COMMENTI
                    $sql2 = "SELECT COUNT(*)
                    FROM utente_percorre_tappa
                    WHERE id_tappa = ".$row['id']."
                    AND commento IS NOT NULL
                    ";

                    if ($result2 = $connessione->query($sql2)) {
                        if ($result2->num_rows > 0) {
                            if($row2 = $result2->fetch_array()){
                                $nCommenti = $row2['COUNT(*)'];
                            }
                        } else {
                        }
                    } else {
                        echo "Errore: " . $connessione->error;
                    }

                    //CATTURA VISITE
                    $sql2 = "SELECT COUNT(*)
                    FROM utente_percorre_tappa
                    WHERE id_tappa = ".$row['id']."
                    ";

                    if ($result2 = $connessione->query($sql2)) {
                        if ($result2->num_rows > 0) {
                            if($row2 = $result2->fetch_array()){
                                $nVisitati = $row2['COUNT(*)'];
                            }
                        } else {
                        }
                    } else {
                        echo "Errore: " . $connessione->error;
                    }



                    $ordineVisualizza=$row['ordine']+1;
                    echo '
                        
                        

                        

                        <form action="tappaSpecifica/index.php" method="post" id="'.$i.'" >
                            <input type="hidden" name="ordineTappa" value="' . $row['ordine'] . '">
                            <input type="hidden" name="idTappa" value="' . $row['id'] . '">
                        </form>

                        <div class="row" onclick="submit('.$i.')" style="margin:none; padding:none; height: 100px; width:100%">
                            <div class="col-3">
                                <img src="../../../img/tappe/'.$row['id'].'.1.png" style="height:100px; width:100px; border-radius: 50%; border: 3px solid '.$coloreBordo.';  margin-left:10px">
                            </div>
                            <div class="col-9">
                                <div class="container">
                                    <div class="row" style="text-align:center;">
                                        <h3 style="color:#b30000">'.$row['nome'].'</h3>
                                    </div>
                                    <div class="row" style="text-align:center;">
                                        <p class="card-text">'.$nMiPiace.'<img style="width:25px" src="../../../img/icons/cuorePieno.png">   '. $nVisitati . '<img style="width:25px" src="../../../img/icons/occhioAperto.png">   ' . $nCommenti . '<img style="width:25px" src="../../../img/icons/commentoPieno.png">    </p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        ';
                        if($i != ($quanteTappe-1)){
                            echo '
                                <div class="row" style="width:100%; ">
                                    <div class="col-3">
                                        <div style=" '.$linea.' "></div>
                                    </div>
                                </div>

                                <div class="row" style="width:100%;">
                                    <div class="col-3">
                                        <div style=" '.$linea2.' "></div>
                                    </div>
                                </div>
                            ';
                        }
                    $i++;

                }
            } else {
                echo "Non ci sono tappe salvate nel database";
            }
        } else {
            echo "Impossibile eseguire la query";
        }
        ?>
        <br>
        <br>
        <br>
        <br>
        <div class="row">

        </div>
        <div class="row">

        </div>
    </div>

    


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
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
        window.addEventListener("orientationchange", function() {
            if (window.orientation == 90 || window.orientation == -90) {
                alert("Gira lo schermo in verticale!!!")
                //window.orientation = 0;
                //document.getElementById("orientation").style.display = "none";
                //window.location.reload();
            }
        });

        function submit( idForm){
            var id= idForm;
            document.forms[id].submit();
        }
    </script>
</body>

</html>
<?php
//unset($nomePercorso);
?>