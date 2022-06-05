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
            <div class="col-2">
                <a href="index.php">
                    <img id="back" style="padding-bottom:8px" src="../../img/icons/back.png">
                </a>
            </div>
            <div class="col-8" onclick="toCima()">
                <h1  style=" color: white; font-weight: bold; text-align: center;">FAQ</h1>
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
    <div class="accordion accordion-flush"  id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne" >
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <strong>Cosa posso fare con GrovaGO?</strong>
                    </button>
                </form>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p>GrovaGO è un app che si propone come guida turistica personale. </p><p>Grazie all'app è possibile visualizzare una lista di percorsi e le relative tappe con foto e descrizioni.</p><p>A ogni tappa è associato un QR Code che se scansionato aggiunge la tappa alla lista di quelle visitate, dando la possibilità all'utente di mettere un like o un commento.</p>
                </div>
              </div>
            </div>
    </div>
    <div class="accordion accordion-flush"  id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne" >
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseOne">
                    <strong>Come si scannerizza una qr code?</strong>
                    </button>
                </form>
              </h2>
              <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p>Scannerizzare un qr code è molto semplice</p><p><strong>1.</strong>Nel menu in basso clicca sulla fotocamera</p><p><strong>2.</strong>Fornisci l'autorizzazione all'utilizzo della fotocamera</p><p><strong>3.</strong>Inquadra il qr code che si trova nella tappa. FATTO!</p>
                </div>
              </div>
            </div>
    </div>
    <div class="accordion accordion-flush"  id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne" >
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseOne">
                    <strong>Cos'è quel numero nella mia foto profilo?</strong>
                    </button>
                </form>
              </h2>
              <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p>Quel numero indica il livello del tuo account.</p><p>Ogni account parte dal livello 1.</p><p>Scannerizzando una tappa ottieni 200 punti xp, nella pagina del tuo profilo vedrai una barra che indicherà quanti punti ti mancano per salire di livello.</p><p>Scannerizza più tappe che puoi e sali di livello conquistando la vetta della classifica!</p>
                </div>
              </div>
            </div>
    </div>
    <div class="accordion accordion-flush"  id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne" >
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseOne">
                      <strong>Cos'è quella barra che compare sotto ogni percorso?</strong>
                    </button>
                </form>
              </h2>
              <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p>Quella barra indica quante tappe hai visitato di quel percorso.</p><p>Scannerizzando le tappe di quel percorso farai avanzare la barra.</p>
                </div>
              </div>
            </div>
    </div>
    <div class="accordion accordion-flush"  id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne" >
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseOne">
                      <strong>Cosa sono quei simboli nella pagina profilo?</strong>
                    </button>
                </form>
              </h2>
              <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p><img src="../../img/icons/cuoreVuoto.png" style="width:20px"> = tappe alle quali hai messo mi piace</p><p><img src="../../img/icons/occhioCancellato.png" style="width:20px"> = tappe che hai scannerizzato</p><p><img src="../../img/icons/emptyStarRed.png" style="width:20px"> = percorsi preferiti</p>
                </div>
              </div>
            </div>
    </div>
    <div class="accordion accordion-flush"  id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne" >
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseOne">
                      <strong>Come si mette un like/commento a una tappa?</strong>
                    </button>
                </form>
              </h2>
              <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p>Ricorda che per poter mettere like e commentare è necessario prima aver scansionato il qr code di quella tappa</p><p><strong>1.</strong> Raggiungi la pagina della tappa desiderata attraverso il menu dei percorsi o la ricerca</p><p><strong>2.</strong> Clicca sul cuore per mettere un like, clicca sul baloon per lasciare un commento o leggere quelli degli altri utenti!</p>
                </div>
              </div>
            </div>
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
                            echo'<center><p style="text-align:center; font-size:15px;"><strong>Tip:</strong> scannerizza più tappe possibili per ottenere più punti xp e scalare la classifica!</p></center>';
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

        function toCima() {
            const element = document.getElementById("Logo");
            element.scrollIntoView();
        }
    </script>
</body>

</html>