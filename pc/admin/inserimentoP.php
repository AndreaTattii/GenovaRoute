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

    $nome = $connessione->real_escape_string($_REQUEST['nomeP']);
    $descrizione = $connessione->real_escape_string($_REQUEST['descrizioneP']);
    
    //hashing della password
    $password = hash("sha256", $password);

    $sql = "INSERT INTO Percorso (nome, descrizione) VALUES 
    ('".$nome."','".$descrizione."')";
    
    if($connessione->query($sql) === true){
        header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/pc/admin/formP.php");
    }else{
        echo "Errore durante inserimento: ".$connessione->error;
    }


    
?>