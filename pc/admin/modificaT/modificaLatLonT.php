<?php
	session_start();

    $host="127.0.0.1";
    $user="grovago";
    $password="";
    $database="my_grovago";

    $connessione= new mysqli($host, $user, $password , $database);

    if($connessione === false){
        die("Errore di connessione: ".$connessione->connect_error);
    }

    $idTappa = $connessione->real_escape_string($_REQUEST['idTappa']);
    $contenutoLat = $connessione->real_escape_string($_REQUEST['contenutoLat']);
    $contenutoLon = $connessione->real_escape_string($_REQUEST['contenutoLon']);
    
    
    $sql="UPDATE tappa SET lat = '".$contenutoLat."'
            WHERE id = ".$idTappa;
    if ($result = $connessione->query($sql)) {
        
    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    } 
    $sql="UPDATE tappa SET lon = '".$contenutoLon."'
            WHERE id = ".$idTappa;
    if ($result = $connessione->query($sql)) {
        header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/pc/admin/formModificaT.php");
    
    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }
    



    $connessione->close();
/**/

    
?>