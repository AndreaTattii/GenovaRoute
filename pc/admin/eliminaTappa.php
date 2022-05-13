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
    
    
    

    $sql="UPDATE tappa_appartiene_percorso SET ordine =(ordine+1)
            WHERE id_tappa > ".$row['id_tappa'];

    if ($result = $connessione->query($sql)) {

    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }

    $sql = "DELETE FROM tappa
            WHERE id = ".$idTappa.";";

    if ($result = $connessione->query($sql)) {
        header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/pc/admin/index.php");


    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }

    $connessione->close();

?>