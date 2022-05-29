<?php
session_start();

$host = "127.0.0.1";
$user = "root";
$pass = "";
$database = "GenovaRoute";
$connessione = new mysqli($host, $user, $pass, $database);

if(isset($_POST['idTappa'])){
    $_SESSION['idTappa'] = $connessione->real_escape_string($_REQUEST['idTappa']);
}


if ($connessione === false) {
    echo "Errore: " . $connessione->error;
}
$sql = "SELECT * FROM tappa WHERE id = ".$_SESSION['idTappa']."";

if ($result = $connessione->query($sql)) {
    $row = $result->fetch_assoc();
    $nomeTappa = $row['nome'];
    $descrizioneTappa = $row['descrizione'];
    $via = $row['via'];
    $longitudine = $row['lon'];
    $latitudine = $row['lat'];
} else {
    echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
}
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
    <link rel="icon" href="../../img/Admin.png" type="image/icon type">

</head>

<body class="d-flex flex-column min-vh-100">

    <!-- NAVBAR -->
    <nav class="navbar  navbar-expand-lg" style="background-color: #B30000;">
        <div class="container">
            <div class="col">
                <a class="navbar-brand" style="font-family: 'Amiri', serif; color: white; font-weight: bold; text-align: center; " href="index.php">
                    <h1>GrovaGO Administration</h1>
                </a>
            </div>

        </div>
    </nav>

    <!-- CORPO -->
    <br>
    <br>

    <!-- Fai un form per l'inserimento di records nella tabella tappa nel db-->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center"> <?php echo $nomeTappa ?></h1>
            </div>
        </div>
        <div class="row" style="width=100%">
            <div class="col-6">
                <form action="modificaT/modificaNomeT.php" method="POST">
                    <div class="row" style="margin:10px;">
                        <div class="col">
                            <input type="text" class="form-control" id="contenuto" name="contenuto" placeholder="Nome della tappa" value="<?php echo $nomeTappa ?>" maxlength="20" required>
                        </div>
                        <div class="col">
                            <?php
                            echo "<input type='hidden' name='idTappa' value='" . $_SESSION['idTappa'] . "'>"
                            ?>
                            <button type="submit" class="btn btn-primary" style=" background-color:#B30000; border-color:#B30000;">Modifica</button>
                        </div>
                    </div>
                </form>

                <form action="modificaT/modificaDescrizioneT.php" method="POST">
                    <div class="row" style="margin:10px;">
                        <div class="col">
                            <textarea class="form-control" id="contenuto" name="contenuto" placeholder="Descrizione della tappa" name="nuovaDescrizione" maxlength="2000"  required><?php echo $descrizioneTappa ?></textarea>

                        </div>
                        <div class="col">
                            <?php

                            //<textarea class="form-control" placeholder="Inserisci descrizione" name="nuovaDescrizione" maxlength="2000"  required></textarea>
                            echo "<input type='hidden' name='idTappa' value='" . $_SESSION['idTappa'] . "'>"
                            ?>
                            <button type="submit" class="btn btn-primary" style=" background-color:#B30000; border-color:#B30000;">Modifica</button>
                        </div>
                    </div>
                </form>

                <form action="modificaT/modificaImg1T.php" method="POST" enctype="multipart/form-data">
                    <div class="row" style="margin:10px;">
                        <div class="col">
                            <div class='row'>
                                <input type='file' accept=".png,.jpg,.jpeg" name='img1' required>
                            </div>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary" style=" background-color:#B30000; border-color:#B30000;">Modifica</button>
                        </div>
                    </div>
                </form>

                <form action="modificaT/modificaImg2T.php" method="POST" enctype="multipart/form-data">
                    <div class="row" style="margin:10px;">
                        <div class="col">
                            <div class="row">
                                <input type='file' accept=".png,.jpg,.jpeg" name='img2' required>
                            </div>
                        </div>
                        <div class="col">
                            <?php
                            echo "<input type='hidden' name='idTappa' value='" . $_SESSION['idTappa'] . "'>"
                            ?>
                            <button type="submit" class="btn btn-primary" style=" background-color:#B30000; border-color:#B30000;">Modifica</button>
                        </div>
                    </div>
                </form>

                <form action="modificaT/modificaImg3T.php" method="POST" enctype="multipart/form-data">
                    <div class="row" style="margin:10px;">
                        <div class="col">
                            <div class='row'>
                                <input type='file' accept=".png,.jpg,.jpeg" name='img3' required>
                            </div>
                        </div>
                        <div class="col">
                            <?php
                            echo "<input type='hidden' name='idTappa' value='" . $_SESSION['idTappa'] . "'>"
                            ?>
                            <button type="submit" class="btn btn-primary" style=" background-color:#B30000; border-color:#B30000;">Modifica</button>
                        </div>
                    </div>
                </form>

                <form action="modificaT/modificaViaT.php" method="POST">
                    <div class="row" style="margin:10px;">
                        <div class="col">
                            <input type="text" class="form-control" id="contenuto" name="contenuto" placeholder="Via" value="<?php echo $via ?>" maxlength="30" required>
                        </div>
                        <div class="col">
                            <?php
                            echo "<input type='hidden' name='idTappa' value='" . $_SESSION['idTappa'] . "'>"
                            ?>
                            <button type="submit" class="btn btn-primary" style=" background-color:#B30000; border-color:#B30000;">Modifica</button>
                        </div>
                    </div>
                </form>

                <form action="modificaT/modificaLonT.php" method="POST">
                    <div class="row" style="margin:10px;">
                        <div class="col">
                            <input type="text" class="form-control" id="lon" name="contenuto" placeholder="Longitudine" value="<?php echo $longitudine ?>" maxlength="100" required>
                        </div>
                        <div class="col">
                            <?php
                            echo "<input type='hidden' name='idTappa' value='" . $_SESSION['idTappa'] . "'>"
                            ?>
                            <button type="submit" class="btn btn-primary" style=" background-color:#B30000; border-color:#B30000;">Modifica</button>
                        </div>
                    </div>
                </form>

                <form action="modificaT/modificaLatT.php" method="POST">
                    <div class="row" style="margin:10px;">
                        <div class="col">
                            <input type="text" class="form-control" id="lat" name="contenuto" placeholder="Latitudine" value="<?php echo $latitudine ?>" maxlength="100" required>
                        </div>
                        <div class="col">
                            <?php
                            echo "<input type='hidden' name='idTappa' value='" . $_SESSION['idTappa'] . "'>"
                            ?>
                            <button type="submit" class="btn btn-primary" style=" background-color:#B30000; border-color:#B30000;">Modifica</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <div id="osm-map"></div>
            </div>
        </div>
        
    </div>
    <script>
        <?php
            $sql="SELECT x, y FROM tappa, citta WHERE id=".$_SESSION['idTappa']." AND citta.nome=tappa.citta;";
            $result = $connessione->query($sql);
            $row = $result->fetch_array();
            $x=$row['x'];
            $y=$row['y'];
        ?>
            element = document.getElementById('osm-map');
            element.style = 'height:'.concat(400, 'px;');
            var map = L.map(element, {
                zoomControl: false
            });
            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {}).addTo(map);
            map.setView([<?php echo $x; ?>, <?php echo $y; ?>], 14);
            var markerGroup = L.layerGroup().addTo(map);       

            var Icon1 = L.icon({
                            iconUrl: '../../img/icons/marker.png',
                            iconSize:     [40, 40]
                        });
                        
            var IconB = L.icon({
                iconUrl: '../../img/GB.png',
                iconSize:     [40, 40]
            });
            <?php
            //query per ottenere lat e lon e nome delle tappe che fanno parte degli stessi percorsi di cui fa parte la tappa con id = $_SESSION['idTappa'], senza usare la citta
            //header("Location: index.php");
            
            $sql3="SELECT DISTINCT lat, lon, nome FROM tappa_appartiene_percorso, tappa 
                  WHERE id!=".$_SESSION['idTappa']." 
                  AND id_percorso IN (SELECT percorso.id FROM tappa, percorso, tappa_appartiene_percorso
                                      WHERE tappa.id=".$_SESSION['idTappa']." 
                                      AND tappa_appartiene_percorso.id_tappa=tappa.id
                                      AND tappa_appartiene_percorso.id_percorso=percorso.id)
                                       ;";
                $result3 = $connessione->query($sql3);
                //$row = $result->fetch_array();
                //$lat=$row['lat'];
                //$lon=$row['lon'];
                //$nome=$row['nome'];
                if($result3->num_rows > 0){
                    $i=0;
                    while($row3 = $result3->fetch_assoc()){
                        $i++;
                        //print a marker for each row
                        echo "L.marker(
                            ['".$row3["lat"]."', '".$row3["lon"]."'],
                            {
                                icon: Icon1
                            }
                            ).addTo(map)   
                            .bindPopup('".$row3["nome"]."')
                            ";
                    }
                }
                $sql2 = 'SELECT lat,lon,Tappa.nome
                FROM Tappa, Percorso, Tappa_Appartiene_Percorso 
                WHERE tappa.id='.$_SESSION['idTappa'].'  
                AND percorso.id = Tappa_Appartiene_Percorso.id_percorso 
                AND tappa.id=id_tappa ';
                $result2 = $connessione->query($sql2);
                $row2 = $result2->fetch_array();
                    echo "
                    marker = new L.marker(['".$row2["lat"]."', '".$row2["lon"]."'], {draggable: true,icon: IconB}).addTo(markerGroup).bindPopup('".$row2["nome"]."').openPopup();;;";
            ?>
            //when the marker is dragged, update the values in the input fields
            marker.on('dragend', function(e) {
                var position = marker.getLatLng();
                document.getElementById('lat').value = position.lat;
                document.getElementById('lon').value = position.lng;
            });

        </script>
</body>

</html>