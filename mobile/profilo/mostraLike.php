<?php
    session_start(); 

    $host="127.0.0.1";
    $user="root";
    $pass="";
    $database="GenovaRoute";

    $connessione = new mysqli($host, $user, $pass , $database);

    if($connessione === false){
        echo "Errore: ".$connessione->error;
    }

    //$sql = "";
    //$result = $connessione->query($sql);


    //header("Location: ../percorsi/index.php");
?>