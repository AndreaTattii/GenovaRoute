<?php
session_start();
if(isset($_POST['percorso'])){
    $_SESSION['nomePercorso'] = $_POST['percorso'];
}

$host = "127.0.0.1";
$user = "root";
$pass = "";
$database = "genovaroute";

$connessione = new mysqli($host, $user, $pass, $database);


?>
<!doctype html>
<html lang="en">

<head>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <link href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" rel="stylesheet"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="../../../css/style.css">
    <!-- Bootstrap CSS 
    -->

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

<!-- NAVBAR ALTA -->
<div class="container fixed-top" >
        <div class="row justify-content-center align-items-center" style="background-color: #B30000; height:60px; padding-top: 10px;">

            <div class="col-2">
                <a href="../tappe/index.php">
                    <img id="back" src="../../../img/icons/back.png">
                </a>
            </div>
            <div class="col-8">
                <h1 style=" color: white; font-weight: bold; text-align: center; font-size: 17px;"><?php echo $_SESSION['nomePercorso']  ?> </h1>
            </div>
            <div class="col-2">
                 <h1 style="font-family: 'Amiri', serif; color: white; font-weight: bold; text-align: center;"></h1>
            </div>
        </div>
    </div>

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

        

    </div>
    <br>
    <br>
    <div id="content"></div>
    <div id="osm-map"></div>
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
            element = document.getElementById('osm-map');
            element.style = 'height:'.concat(window.innerHeight, 'px;');
            var map = L.map(element, {
                zoomControl: false
            });

            <?php
            //query per selezionare le coordinate della prima tappa del percorso
            $sql = 'SELECT lon, lat, Tappa.nome, ordine
            FROM Tappa, Percorso, Tappa_Appartiene_Percorso
            WHERE  Tappa.id = Tappa_Appartiene_Percorso.id_tappa
            AND  percorso.id = Tappa_Appartiene_Percorso.id_percorso 
            AND  percorso.id = '.$_GET["percorsi"].'
            AND ordine = 0';
            
            $result = $connessione->query($sql);

            $row = $result->fetch_assoc();

            ?>

            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {}).addTo(map);
            map.setView(['<?php echo $row["lat"];?>', '<?php echo $row["lon"]?>'], 13.5);
            



            <?php
            for($i=0;$i<10;$i++){
                $n = $i+1;
                echo"
                var Icon".$i." = L.icon({
                    iconUrl: '../../../img/icons/markers/marker".$n.".png',
                    iconSize:     [30, 40],
                });
                ";
            }
            if(!empty($_GET["percorsi"])){
                $sql = 'SELECT lat,lon,Tappa.nome, ordine, tappa.id
                FROM Tappa, Percorso, Tappa_Appartiene_Percorso 
                Where Tappa.id = Tappa_Appartiene_Percorso.id_tappa 
                AND percorso.id = Tappa_Appartiene_Percorso.id_percorso 
                AND  percorso.id = '.$_GET["percorsi"].';';

                $result = $connessione->query($sql);
              

                while($row = $result->fetch_assoc()){
                    echo "L.marker(
                        ['".$row["lat"]."', '".$row["lon"]."'],
                        {
                            icon: Icon".$row["ordine"]."
                        }
                        ).addTo(map).on('click', onClick)   
                        //metti nel bindPopup un tag a cui passare l'id del percorso e l'id della tappa
                        .bindPopup('<a href=\"tappaSpecifica/index.php?idPercorso=".$_GET["percorsi"]."&ordineTappa=".$row["ordine"]."\">".$row["nome"]."</a>');
                        ";
                }
            }
            ?>
            function onClick(e) { 
                //var popup = e.target.getPopup();
                //var idPercorso = <?php echo $_GET["percorsi"]; ?>;
                //var url = "popup.php";
                //    $.ajax({
                //        type: "POST",
                //        url: url,
                //        data: {idPercorso: idPercorso,
                //               nomeTappa: popup.getContent()},
                //        success: function(data){
                //            $("#content").html(data);
                //        }
                //    });
            }
        </script>
</body>
</html>