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
<?php
session_start();
error_reporting(0);
$risultato=$_GET['risultato'];
echo $risultato;

//$risultato contiene il risultato della scansione, cioè due numeri separati da un .
//Il primo numero è il numero del percorso, il secondo è il numero della tappa
//estrapola dalla variabile $risultato i due numeri
//$pos = strpos($risultato, ".");
//$_SESSION['nomePercorso'] = substr($risultato, 0, $pos);
//$_SESSION['ordine'] = substr($risultato, $pos+1, strlen($risultato));

$_SESSION['idTappa'] = $risultato;

$host = "127.0.0.1";
$user = "root";
$pass = "";
$database = "genovaroute";

$connessione = new mysqli($host, $user, $pass, $database);

if ($connessione === false) {
    die("Errore: " . $connessione->connect_error);
}

$sql = "SELECT percorso.id, percorso.nome, percorso.descrizione FROM tappa, percorso, tappa_appetiene_percorso WHERE idTappa = '" . $_SESSION['idTappa'] . "'AND tappa.id = tappa_appartiene_percorso.id_tappa AND percorso.id = tappa_appartiene_percorso.id_percorso";
if ($result = $connessione->query($sql)) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) { 
            $i++;
            if ($i % 2 == 0) {
                $coloreRiga = "white";
            } else {
                $coloreRiga = "#F0F0F0";
            }
            echo '
            <form action="tappe/index.php" method="post">
                <div class="container " style="width:100%;  background-color: ' . $coloreRiga . '; padding-bottom: 15px; padding-top: 15px">
                    <div class="row justify-content-center " style="background-color: ' . $coloreRiga . ';">
                        <div class="col-xs ">
                            <div class="row">
                                <input type="hidden" name="idPercorso" value="' . $row['id'] . '">
                                <input type="submit" value="' . $row['nome'] . '" style="background-color: ' . $coloreRiga . '; text-decoration: none; color: #B30000; font-size:20px; border: none; font-weight: bold; float: left;"> 
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <center>
                                <p>'.$row['descrizione'].'</p>
                            </center>                         
                        </div>
                        <div class="row justify-content-center" >                               
                                <button type="submit" class="btn btn-primary" style="width:100px; background-color: #B30000; border-color:#B30000; font-size: 15px; color:white ; text-align: center; float: right;">Visualizza</button>                                   
                        </div>
                    </div>            
                </div>
            </form>
            ';                                                                            
        }
    } else {
        echo "Non ci sono percorsi salvati nel database";
    }
} else {
    echo "Impossibile eseguire la query";
}
//echo 'il percorso è' . $percorso . ' e la tappa è ' . $tappa;
header("Location: ../percorsi/tappe/tappaSpecifica/index.php");
?>
</html>