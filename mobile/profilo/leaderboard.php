<?php session_start();

$_SESSION['vengoDaClassifica']=true;

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


    <div class="container">
        <!-- NAVBAR ALTA -->
        <div class="row justify-content-center align-items-center" style="background-color: #B30000;  padding-top: 10px; height:60px">
            <div class="col-2">
                <a href="index.php">
                    <img id="back" style="padding-bottom:8px" src="../../img/icons/back.png">
                </a>
            </div>
            <div class="col-8 ">
                <h1 style=" color: white; font-weight: bold; text-align: center;">Classifica</h1>
            </div>
            <div class="col-2 ">
            </div>
        </div>

        <!-- CONTENUTO PAGINA -->
        <br>
        <br>
        <div class="container">
            <?php
                $sql = "SELECT nome, cognome, username, email, livello, xp FROM utente WHERE username!='admin' ORDER BY livello DESC, xp DESC;";
                if ($result = $connessione->query($sql)) {
                    if ($result->num_rows > 0) {
                        echo '';
                        $i=0;
                        while ($row = $result->fetch_array()) { 
                            $i++;    
                            if($i==1){
                                echo '<a style="text-decoration:none; color:black;" href="../profilo/index.php?emailUtente=' . $row["email"] . '"> 
                                        <div class="row justify-content-center" style="">                
                                            <div class="col" style="text-align:center;">
                                                    <img src="../../img/propics/'.$row['email'].'.png" style="width:150px;height:150px;border-radius: 50%;margin-left:20px">
                                                    <span style="position: relative;z-index: 2;top: -50px;left: -30px;" class="badge rounded-pill bg-danger">
                                                        '.$row["livello"].'
                                                    </span>
                                                <br>
                                                <p style="color:black; font-size:22px"><strong style="color:#B30000; font-size:30px">' . $row['username'] . '</strong> ' . $row['xp'] . ' xp</p>
                                            </div>
                                          </div>
                                        </a>';
                            }
                            else{
                                if($i==2){
                                    echo '<div class="row" style="height:130px">
                                            <div class="col-6" style="float:left;padding-left:30px">
                                                <img src="../../img/propics/'.$row['email'].'.png" style="width:65px;height:65px;border-radius: 50%">
                                                <span style="position: relative;z-index: 2;top: -16px;left: -20px;" class="badge rounded-pill bg-danger">
                                                    '.$row["livello"].'
                                                </span>
                                                <br>
                                                <p style="padding-right:15px;color:black; font-size:12px"><strong style="color:#B30000; font-size:18px">' . $row['username'] . '</strong> ' . $row['xp'] . ' xp</p>
                                            </div>
                                          ';    
                                }
                                else{
                                    if($i==3){
                                        echo '
                                                <div class="col-2">
                                                </div>
                                                <div class="col-4" style="text-align:right; padding-top:50px; padding-right:30px">
                                                    <img src="../../img/propics/'.$row['email'].'.png" style="width:45px;height:45px;border-radius: 50%">
                                                    <span style="position: relative;z-index: 2;top: -16px;left: -20px;" class="badge rounded-pill bg-danger">
                                                        '.$row["livello"].'
                                                    </span>
                                                    <br>
                                                    <p style="padding-right:14px;color:black; font-size:12px"><strong style="color:#B30000; font-size:15px">' . $row['username'] . '</strong> ' . $row['xp'] . ' xp</p>
                                                </div>
                                              </div>';  
                                    }
                                    else{
                                        if($i==4){
                                            echo '
                                            <img src="../../img/icons/podioBigBlack.png" style="width:100%; position:relative; top:-100px">';
                                            echo "
                                            <a style='text-decoration:none; color:black;' href='../profilo/index.php?emailUtente=" . $row['email'] . "'> 
                                                <div class='row' style='width:100%;'>
                                                    <div class='col-2' style='align-items:center'>
                                                        <h5>".$i.".</h5>
                                                    </div> 
                                                    <div class='col-4'>
                                                        <img style='z-index: 1;width:50px;height:50px; border-radius: 50%' src='../../img/propics/".$row['email'].".png'>
                                                        <span style='position: relative;z-index: 2;top: -15px;left: -20px;' class='badge rounded-pill bg-danger'>
                                                            ".$row['livello']."
                                                        </span>
                                                    </div>
                                                    <div class='col-4'>
                                                        <h5>".$row['username']."</h5>
                                                    </div>   
                                                    <div class='col-2'>
                                                    <p>".$row['xp']." xp</p>
                                                </div>  
                                                </div>
                                            </a> ";
                                        }
                                        else{
                                            if($i>4){
                                                echo "
                                                <a style='text-decoration:none; color:black;' href='../profilo/index.php?emailUtente=" . $row['email'] . "'> 
                                                    <div class='row' style='width:100%; padding-top:20px'>
                                                        <div class='col-2' style='align-items:center'>
                                                            <h5>".$i.".</h5>
                                                        </div> 
                                                        <div class='col-4'>
                                                            <img style='z-index: 1;width:50px;height:50px; border-radius: 50%' src='../../img/propics/".$row['email'].".png'>
                                                            <span style='position: relative;z-index: 2;top: -15px;left: -20px;' class='badge rounded-pill bg-danger'>
                                                                ".$row['livello']."
                                                            </span>
                                                        </div>
                                                        <div class='col-4'>
                                                            <h5>".$row['username']."</h5>
                                                        </div>   
                                                        <div class='col-2'>
                                                        <p>".$row['xp']." xp</p>
                                                    </div>  
                                                    </div>
                                                </a>";
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        echo'<br><br><br>';
                    } else {
                        echo "Nessun risultato";
                    }
                } else {
                    echo "Impossibile eseguire la query";
                }
            ?>
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