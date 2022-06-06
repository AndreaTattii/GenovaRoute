<?php
	session_start();

    $host="localhost";
    $user="grovago";
    $password="";
    $database="my_grovago";

    $connessione= new mysqli($host, $user, $password , $database);

    if($connessione === false){
        die("Errore di connessione: ".$connessione->connect_error);
    }

    $idPercorso = $connessione->real_escape_string($_REQUEST['idPercorso']);
    
    
    

    $sql = "DELETE FROM tappa_appartiene_percorso
            WHERE id_percorso = ".$idPercorso.";";

    if ($result = $connessione->query($sql)) {


    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }

    $sql = "DELETE FROM percorso
            WHERE id = ".$idPercorso.";";

    if ($result = $connessione->query($sql)) {
        header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/pc/admin/index.php");


    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }

    $connessione->close();
/**/

    
?>