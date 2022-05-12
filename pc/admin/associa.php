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

    $id_tappa = $connessione->real_escape_string($_REQUEST['nomeP']);
    $id_percorso = $connessione->real_escape_string($_REQUEST['descrizioneP']);
    
    $sql = "INSERT INTO tappa_appartiene_percorso (id_tappa, id_percorso) VALUES 
    ('".$id_tappa."','".$id_percorso."')";

    if($connessione->query($sql) === true){
        header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/pc/admin/formP.php");
    }else{
        echo "Errore durante inserimento: ".$connessione->error;
    }

    $connessione->close();
    


    
?>