<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href='global.css'>
    <link rel='stylesheet' href='bundle.css'>
    <script defer src='bundle.js'></script>
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

<body class="d-flex flex-column min-vh-100" onload="submitform()">


    <!-- NAVBAR -->
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

                <div class="col s-3" style="">
                    <center>
                        <a class="navbar-brand" href="./ ">
                            <img style="width:49px" src="../../img/icons/scannerizzaSfondo.png">
                        </a>
                    </center>

                </div>

                <div class="col s-3" style="padding-top:10px; ">
                    <center>
                        <a class="navbar-brand" href="../percorsiPersonali/index.php">
                            <img style="width:25px" src="../../img/icons/aggiungiPercorso.png">
                        </a>
                    </center>

                </div>

                <div class="col s-3" style="padding-top:10px; ">
                    <center>
                        <a class="navbar-brand" href="../profilo/index.php">
                            <img id="account" src="../../img/icons/account.png">
                        </a>
                    </center>
                </div>
            </div>
        </div>

    </div>

    
    <!-- LOGO -->
    


    <!-- TITOLO PAGINA -->
    <!-- <br>
    <div style="border-top-color:#B30000;  border-top-style: solid; border-top-width: 2px; border-bottom-color:#B30000;  border-bottom-style: solid; border-bottom-width: 2px;">
        <center>
            <h1 style="color: #B30000;">Scanner<h1>
        </center>
    </div> -->
    

    <!-- CONTENUTO PAGINA -->
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