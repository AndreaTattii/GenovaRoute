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
    $nuovaDescrizione = $connessione->real_escape_string($_REQUEST['nuovaDescrizione']);

    
    $sql = "UPDATE percorso SET descrizione = '".$nuovaDescrizione."'
            WHERE id = ".$idPercorso.";";
    if ($result = $connessione->query($sql)) {
        header("Location: ../index.php");
    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }


    
?>