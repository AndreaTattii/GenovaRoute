<?php
session_start();
if(isset($_POST['idPercorso'])){
    $_SESSION['idPercorso'] = $_POST['idPercorso'];
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
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <link href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../../bootstrap/js/bootstrap.min.js"></script>
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

    <title>GrovaGO</title>
    <link rel="icon" href="../../../img/g.png" type="image/icon type">

</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar  navbar-expand-lg" style="background-color: #B30000;">
        <div class="container p-2">
            <a class="navbar-brand" style="font-family: 'Amiri', serif; color: white; font-weight: bold;" href="../../index.php">
                <h1>GrovaGO</h1>
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
	    		<ul class="navbar-nav">
	    			<li class="nav-item">
	    				<a class="nav-link" href="../index.php" style="color: white">Percorsi</a>
	    			</li>
	    			<li class="nav-item">
	    				<a class="nav-link" href="../../preferiti/index.php" style="color: white">Preferiti</a>
	    			</li>
	    			<li class="nav-item">
	    				<a class="nav-link" href="../../profilo/index.php" style="color: white">Account</a>
	    			</li>
	    		</ul>
	    	</div>
        </div>
    </nav>

    <h2 style="color:#B30000; font-weight:bold; padding-top:15px; font-size:40px; padding-left:150px"><?php echo $_SESSION['nomePercorso']?></h2>
    <h1 style="font-weight:bold; padding-left:150px; font-size:30px;">Scegli una tappa</h1>

    
    
    <div class="container" style="margin:0px; padding:0px">
        <div class="row" style="margin-top:100px">
        <div class="col-7">

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
                    //fai una query per controllare se l'utente ha già scannerizzato la tappa, ovvero se la sua la variabile di sessione email è presente nella tabella utente_percorre_tappa, se è presente allora la tappa è stata scannerizzata, altrimenti non è stata scannerizzata
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
                        $linea=" border-left: 7px solid #B30000; height: 40px;   position: relative; left: 170px; margin-left: 95px; top: 0; ";

                        if($visualizzataSuc){
                            $linea2=" border-left: 7px solid #B30000; height: 40px;   position: relative; left: 170px; margin-left: 95px; top: 0;  ";
                        }else{
                            $linea2=" border-left: 7px dashed #B30000; height: 40px;   position: relative; left: 170px; margin-left: 95px; top: 0; margin-top:5px";

                        }
                        
                    }else{
                        if($visualizzataSuc  && $visualizzata){
                            $linea=" border-left: 7px solid #B30000; height: 40px;   position: relative; left: 170px; margin-left: 95px; top: 0; ";
                            $linea2=" border-left: 7px solid #B30000; height: 80px;   position: relative; left: 170px; margin-left: 95px; top: 0; ";
                        }else{
                            $linea=" border-left: 7px dashed #B30000; height: 40px;   position: relative; left: 170px; margin-left: 95px; top: 0; margin-bottom:px";
                            $linea2=" border-left: 7px dashed #B30000; height: 40px;   position: relative; left: 170px; margin-left: 95px; top: 0; ";

                        }
                        

                    }
                    $ordineVisualizza=$row['ordine']+1;
                    echo '
                        
                        

                        

                        <form action="tappaSpecifica/index.php" method="post" id="'.$i.'" >
                            <input type="hidden" name="ordineTappa" value="' . $row['ordine'] . '">
                            <input type="hidden" name="idTappa" value="' . $row['id'] . '">
                        </form>
                    
                        <div class="row" onclick="submit('.$i.')" style="margin:none;padding-left:100px; padding-bottom:100px; height: 300px; width:100%">
                            <div class="col-3">
                                <img src="../../../img/tappe/'.$row['id'].'.1.png" style="height:300px; width:300px; border-radius: 50%; border: 5px solid '.$coloreBordo.';  margin-left:20px">
                            </div>
                            <div class="col-5" style="margin-left:150px">
                                <div class="row" style="text-align:center;margin-top:85px"">
                                    <h3 style="color:#b30000">'.$row['nome'].'</h3>
                                </div>
                                <div class="row" style="text-align:center;margin-top:20px"">
                                    <p class="card-title" style="font-weight: bold; margin-left: 10px;"><img src="../../../img/icons/marker.png" style="width: 30px; margin-bottom: 15px; ">'.$row['via'].'</p>
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
        </div>
        <div class="col-5" style="padding-top:25px" ><div id="osm-map"></div></div>
        </div>
        <script>
            element = document.getElementById('osm-map');
            element.style = 'height:'.concat(500, 'px;');
            var map = L.map(element);
            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {minZoom: 14}).addTo(map);
            map.setView(['44.409369955825774', '8.941610113846902'], 14);



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

                $sql = 'SELECT lat,lon,Tappa.nome, ordine
                FROM Tappa, Percorso, Tappa_Appartiene_Percorso 
                Where Tappa.id = Tappa_Appartiene_Percorso.id_tappa 
                AND percorso.id = Tappa_Appartiene_Percorso.id_percorso 
                AND  percorso.id = '.$_SESSION['idPercorso'].';';

                $result = $connessione->query($sql);
              

                while($row = $result->fetch_assoc()){
                    echo "L.marker(
                        ['".$row["lon"]."', '".$row["lat"]."'],
                        {
                            icon: Icon".$row["ordine"]."
                        }
                        ).addTo(map)   
                        .bindPopup('".$row["nome"]."')
                        ";
                }
            
            
            ?>
        </script>
    </div>
    

    <div class="footer-clean" style="border-top-color:#F0F0F0;  border-top-style: solid; border-top-width: 3px; margin-top: 40px;  bottom:0px; width:100%; background-color:white;">
		<footer>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-4 ">
					</div>
					<div class="col-4" ></div>
						<center>
							<p style="text-decoration: none; color:black">Partita Iva: 02070920992</p>
							<p>GenovaRoute ©</p> 
						</center>
					</div>
				</div>
			</div>
		</footer>
	</div>


    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
        function submit( idForm){
            var id= idForm;
            document.forms[id].submit();
        }
    </script>
</body>

</html>