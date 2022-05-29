<?php
	session_start();

    $host="127.0.0.1";
    $user="root";
    $password="";
    $database="GenovaRoute";

    $connessione= new mysqli($host, $user, $password , $database);

    if($connessione === false){
        die("Errore di connessione: ".$connessione->connect_error);
    }

    $idTappa = $connessione->real_escape_string($_REQUEST['idTappa']);
    $contenuto = $connessione->real_escape_string($_REQUEST['contenutoLat']);
    
    
    $sql="UPDATE tappa SET lat = '".$contenuto."'
            WHERE id = ".$idTappa;
    if ($result = $connessione->query($sql)) {
        header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/pc/admin/formModificaT.php");
        
    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }



    $connessione->close();
/**/

    
?>