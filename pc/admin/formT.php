<?php session_start();

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
                <h1 class="text-center">Inserimento nuova tappa</h1>
            </div>
        </div>
        <form action="inserimentoT.php" enctype="multipart/form-data" method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Inserisci il nome della tappa" maxlength="30" required>
            </div>
            <div class="form-group">
                <label for="descrizione">Descrizione</label>
                <textarea class="form-control" placeholder="Inserisci descrizione" name="nuovaDescrizione" maxlength="2000"  required></textarea>
            </div>
            <div class="form-group">
                <label for="immagine">Immagine 1</label>
                <div class="row">
                    <input type="file" name="img1" required>
                </div>
            </div>
            <div class="form-group">
                <label for="immagine">Immagine 2</label>
                <div class="row">
                    <input type="file" name="img2" required>
                </div>
            </div>
            <div class="form-group">
                <label for="immagine">Immagine 3</label>
                <div class="row">
                    <input type="file" name="img3" required>
                </div>
            </div>
            <div class="form-group">
                <label for="percorso">Via</label>
                <input type="text" class="form-control" id="via" name="via" placeholder="Inserisci l'indirizzo della tappa" maxlength="30" required>
            </div>
            <div class="form-group">
                <label for="nome">Città</label>
                <input type="text" class="form-control" id="città" name="città" placeholder="Inserisci la città della tappa" maxlength="30" required>
            </div>
            <div class="form-group">
                <label for="percorso">Longitudine</label>
                <input type="text" class="form-control" id="longitudine" name="longitudine" placeholder="Inserisci la longitudine della tappa" maxlength="100" required>
            </div>
            <div class="form-group">
                <label for="percorso">Latitudine</label>
                <input type="text" class="form-control" id="latitudine" name="latitudine" placeholder="Inserisci la latitudine della tappa" maxlength="100" required>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 15px; background-color:#B30000; border-color:#B30000;">Inserisci</button>
        </form>
    </div>  <!-- fine container -->
    <!-- stampa tanti br -->
    <?php
    for ($i = 0; $i < 2; $i++) {
        echo "<br>";
    }
    ?>
    <div class="row">
        <div class="col-3"></div>
            <div class="col-6">
                <h1>Seleziona le coordinate</h1>
                <div id="osm-map"></div>
            </div>
        <div class="col-3"></div>
    </div>
    <div class="footer-clean" style="background-color:white; border-top-color:#F0F0F0;  border-top-style: solid; border-top-width: 3px; margin-top: 40px; bottom:0px; width:100%;">
        <footer>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-4 ">
                    </div>
                    <div class="col-4"></div>
                    <center>
                        <p style="text-decoration: none; color:black">Partita Iva: 02070920992</p>
                        <p>GrovaGO©</p>
                    </center>
                </div>
            </div>
    </div>
    </footer>
    </div>
        <script>
            element = document.getElementById('osm-map');
            element.style = 'height:'.concat(500, 'px;');
            var map = L.map(element);
            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {}).addTo(map);

            //when the user types in the input with name città, send a query to coordinateCitta.php with ajax jquery with json dataType
            $("input[name='città']").keyup(function() {
                var città = $("input[name='città']").val()
                $.ajax({
                    url: 'coordinateCitta.php',
                    type: 'POST',
                    data: {
                        città: città
                    },
                    success: function(data) {
                        //change the view of the map to the coordinates of the city
                        map.setView([<?php echo $_SESSION['x']; ?>, <?php echo $_SESSION['y']; ?>], 15);
                        //if the query is successful, the coordinates are shown in the map
                        //map.setView([data.lat, data.lon], 13);
                    },
                    error : function () {
                        alert("error");
                    }
                });
            });

            var markerGroup = L.layerGroup().addTo(map);       
            
           //when the user clicks on the map, create a layer with a draggable marker and prevent to create multiple markers
            map.on('click', function(e) {
                //delete all markers from marker group
                markerGroup.clearLayers();
                marker = new L.marker(e.latlng, {draggable: true}).addTo(markerGroup);
                var coord = marker.getLatLng();
                document.getElementById('latitudine').value = coord.lat;
                document.getElementById('longitudine').value = coord.lng;

                marker.on('dragend', function(e) {
                    var coord = marker.getLatLng();
                    document.getElementById('latitudine').value = coord.lat;
                    document.getElementById('longitudine').value = coord.lng;
                });
            });
    </script>
</body>

</html>