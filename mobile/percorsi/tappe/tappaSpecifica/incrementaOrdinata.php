<?php 
    session_start();

    

    $host = "127.0.0.1";
    $user = "root";
    $pass = "";
    $database = "genovaroute";

    $connessione = new mysqli($host, $user, $pass, $database);

    
    //error_reporting(0);

    if ($connessione === false) {
        die("Errore: " . $connessione->connect_error);
    }
    $i = 0;
    
    if($_SESSION['ordine'] < $_SESSION['quanteTappe']){
        $_SESSION['ordine'] = $_SESSION['ordine']+1;
    }

    header("Location: index.php");
?>