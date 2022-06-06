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
    $nuovoNome = $connessione->real_escape_string($_REQUEST['nuovoNome']);

    //modifica nome del percroso
    $sql = "UPDATE percorso SET nome = '".$nuovoNome."'
            WHERE id = ".$idPercorso.";";
    if ($result = $connessione->query($sql)) {
        header("../index.php");
    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }
    

    
?>