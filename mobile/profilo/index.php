<?php session_start();

if(isset($_GET['emailUtente'])){
    $emailUtente=$_GET['emailUtente'];
}

$host = "127.0.0.1";
$user = "root";
$pass = "";
$database = "genovaroute";

$connessione = new mysqli($host, $user, $pass, $database);


if ($connessione === false) {
    die("Errore: " . $connessione->connect_error);
}
if(isset($_GET['emailUtente'])){
    $sql = "SELECT xp, livello,nome, cognome, username FROM utente WHERE email = '" . $emailUtente . "'";
}
else{
    $sql = "SELECT xp, livello,nome, cognome, username FROM utente WHERE email = '" . $_SESSION['email'] . "'";
}
if ($result = $connessione->query($sql)) {
    $row = $result->fetch_array();
    $nome = $row['nome'];
    $cognome = $row['cognome'];
    $username = $row['username'];
    $xp = $row['xp'];
    $livello = $row['livello'];
} else {
    echo "Impossibile eseguire la query";
}
//xp e livelli
$xpPerLivello = 200;
$xpNecessari=$xpPerLivello*($livello+1);
$xpMancanti=$xpNecessari-$xp;
$percentuale=($xp/$xpNecessari)*100;
//togli le cifre decimali
$percentuale=number_format($percentuale,0);
//echo$xp;
//echo'<br>';
//echo$xpNecessari;
//echo'<br>';
//
//echo $percentuale;


?>
<!doctype html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>

    <!-- Required meta tags -->
    <meta charset="ansi">
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


    <div class="container" style="margin-bottom:100px; padding-left:0px; ">
        <!-- NAVBAR ALTA -->
        <div class="row justify-content-center align-items-center" style="background-color: #B30000;  padding-top: 10px; height:60px">
            <div class="col-2">
                <?php
                    if(isset($_GET['emailUtente'])){
                        if(isset($_SESSION['vengoDaClassifica'])){
                            unset($_SESSION['vengoDaClassifica']);
                            $link="leaderboard.php";
                        }
                        else{
                            $link="../ricerca/index.php";
                        }
                ?>
                <a href="<?php echo $link; ?>">
                    <img id="back" style="padding-bottom:8px" src="../../img/icons/back.png">
                </a>
                <?php
                    }
                    else{
                ?>
                <a href="leaderboard.php">
                    <img id="leaderboard" style="width:30px; padding-bottom:7px" src="../../img/icons/leaderboard.png">
                </a>
                <?php
                }
                ?>
            </div>
            <div class="col-8 ">
                <h1 style=" color: white; font-weight: bold; text-align: center;"><?php echo $username; ?></h1>
            </div>
            <div class="col-2 ">
                <?php
                    if(!(isset($_GET['emailUtente']))){
                ?>
                <a class="navbar-brand" href="settings.php">
                    <img id="setting" src="../../img/icons/setting.png">
                </a>
                <?php
                    }
                ?>
            </div>
        </div>



        <!-- INTESTAZIONE  -->
        <div class="row justify-content-center" style="padding-top: 20px; padding-bottom: 20px; padding-left:5px">
            <div class="col s-2" id="immagineProfilo">
                <?php
                    if(isset($_GET['emailUtente'])){
                ?>
                        <a class="navbar-brand" href="settings.php">
                            <label  style="width:100px;height:100px; border-radius: 50%;background-size: cover; background-image: url('../../img/propics/<?php echo $emailUtente;; ?>.png<?php echo "?t=".time()?>');">

                        </a>


                        <div>
                            <span style="left:95px; top:92px" class="position-absolute top-70 start-600 translate-middle badge rounded-pill bg-danger">
                                <?php echo $livello; ?>
                            </span>
                        </div>
                <?php
                    }
                    else{
                ?>
                        <a class="navbar-brand" href="settings.php">
                            <label  style="width:100px;height:100px; border-radius: 50%;background-size: cover; background-image: url('../../img/propics/<?php echo $_SESSION['email']; ?>.png<?php echo "?t=".time()?>');">
                        </a>



                        <div>
                            <span style="left:95px; top:92px" class="position-absolute top-70 start-600 translate-middle badge rounded-pill bg-danger">
                                <?php echo $livello; ?>
                            </span>
                        </div>
                <?php
                }
                ?>
            </div>

            <div class="col" id="nomeUtente" style="padding-top: 25px; padding-right:80px">

                <?php echo  ' <h1 style="font-weight: bold; font-size: 20px; color: black; text-align: left;">' . $nome . ' ' . $cognome . '</h1> ';  ?>
                <?php if(!(isset($_GET['emailUtente']))){echo  ' <div class="progress" style="border:1px solid black" >
                                 <div class="progress-bar bg-danger" role="progressbar" style="width: '.$percentuale.'%" aria-valuenow="'.$percentuale.'" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <p>'.$xp.'/'.$xpNecessari.' xp</p>';}                    
                ?>

            </div>
        </div>

        <!-- CONTENUTO PAGINA -->
        <div class="row" style="margin:none; padding:none;  ">
            <div class="col-4" id="colCuore" style="border-bottom:2px solid #b30000; text-align:center; padding:0px; margin:auto;">
                <img class="cuore" id="cuore" src="../../img/icons/cuorePieno.png" style="width:30px">
            </div>
            <div class="col-4" id="colOcchio"  style="text-align:center;  padding:0px; margin:auto; ">
                <img class="occhio" id="occhio" src="../../img/icons/occhioCancellato.png" style="width:35px;">
            </div>
            <div class="col-4" id="colStar"  style=" text-align:center; padding:0px; margin:auto;">
                <img class="star"  id="star" src="../../img/icons/emptyStarRed.png" style="width:30px">
            </div>
        </div>
        <br>
        
    <!-- QUI STAMPO IN BASE AL BOTTONE PREMUTO -->
    <div id="contenuto">

    


    <?php
    if(isset($_GET['emailUtente'])){
        $email=$_GET['emailUtente'];
    }
    else{
        $email=$_SESSION['email'];
    }

    $i=0;
    $sql = "SELECT * FROM utente_percorre_tappa, tappa WHERE email = '" . $email . "' AND tappa.id=id_tappa AND piace=1 ORDER BY (utente_percorre_tappa.data)DESC";
    $result = $connessione->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($i % 3 == 0 && $i!=0) {
                echo '</div>';
            }
            if ($i % 3 == 0 || $i = 0) {
                echo '<div class="row" style="width:100%; padding:0px; margin:0px; ">';
            }
            echo   "
                        <div class='col-4' style='height: 90px; padding:0px; margin:0px; padding-left:0px' >
                            <a  href='mostraTappa.php?idTappa=".$row['id']."&email=".$email."'>   <img src='../../img/tappe/" . $row['id'] . ".1.png' style='width:100%; height: 100%;padding:1px; margin:5px; position: relative; left: 0px;' > </a>
                        </div>
                    ";
            
            $i++;
        }

        
        echo "<br><br><br><br>";
    } else {
        if ($_SESSION['email'] == $email) {
            echo '
                <div class="row" style="margin-top:100px">
                    <div class="col-12" style="text-align:center">
                        <img src="../../img/icons/greyHearth.png" style="width:20%">
                    </div>
                </div>
                <div class="row" style="text-align:center">
                    <b><p style="color:#909090; margin-bottom:30px; ">Non hai ancora messo mi piace a nessuna tappa</p></b>
                </div>
            ';
        } else {
            echo '
                <div class="row" style="margin-top:100px">
                    <div class="col-12" style="text-align:center">
                        <img src="../../img/icons/greyHearth.png" style="width:20%">
                    </div>
                </div>
                <div class="row" style="text-align:center">
                    <b><p style="color:#909090; margin-bottom:30px; ">Non ha ancora messo mi piace a nessuna tappa</p></b>
                </div>
            ';
        }
    }
    ?>
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
    </div>
    <script>
        $(window).on('load', function() {
            $(".loader-wrapper").fadeOut("slow");
        });
    </script>
    

    <script>



        $(document).ready(function() {
            // opzionale, refresha all'infinito la pagina
            $.ajaxSetup ({
                cache: false
            });

            $(".cuore").click(function() {
                $.ajax({
                    type: "POST",
                    url: "mostraLike.php",
                    data: {
                        email: "<?php 
                            if(isset($_GET['emailUtente'])){
                                echo $emailUtente;
                            }
                            else{
                                echo $_SESSION['email'];
                            } 
                             ?>"
                    },
                    success: function(data) {
                        $("#contenuto").html(data);
                        $(".cuore").attr("src", "../../img/icons/cuorePieno.png");
                        $(".occhio").attr("src", "../../img/icons/occhioCancellato.png");
                        $(".star").attr("src", "../../img/icons/emptyStarRed.png");

                        $("#colCuore").css("border-bottom", "2px solid #b30000");
                        $("#colOcchio").css("border-bottom", "none");
                        $("#colStar").css("border-bottom", "none");
                    }
                });
            });

            $(".occhio").click(function() {
                $.ajax({
                    type: "POST",
                    url: "mostraVisitati.php",
                    data: {
                        email: "<?php 
                            if(isset($_GET['emailUtente'])){
                                echo $emailUtente;
                            }
                            else{
                                echo $_SESSION['email'];
                            } 
                             ?>"
                    },
                    success: function(data) {
                        $("#contenuto").html(data);
                        $(".cuore").attr("src", "../../img/icons/cuoreVuoto.png");
                        $(".occhio").attr("src", "../../img/icons/occhioAperto.png");
                        $(".star").attr("src", "../../img/icons/emptyStarRed.png");

                        $("#colCuore").css("border-bottom", "none");
                        $("#colOcchio").css("border-bottom", "2px solid #b30000");
                        $("#colStar").css("border-bottom", "none");
                    }
                });
            });

            $(".star").click(function() {
                $.ajax({
                    type: "POST",
                    url: "mostraPreferiti.php",
                    data: {
                        email: "<?php 
                            if(isset($_GET['emailUtente'])){
                                echo $emailUtente;
                            }
                            else{
                                echo $_SESSION['email'];
                            } 
                             ?>"
                    },
                    success: function(data) {
                        //alert(data);
                        $("#contenuto").html(data);
                        $(".cuore").attr("src", "../../img/icons/cuoreVuoto.png");
                        $(".occhio").attr("src", "../../img/icons/occhioCancellato.png");
                        $(".star").attr("src", "../../img/icons/fullStarRed.png");

                        $("#colCuore").css("border-bottom", "none");
                        $("#colOcchio").css("border-bottom", "none");
                        $("#colStar").css("border-bottom", "2px solid #b30000");

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