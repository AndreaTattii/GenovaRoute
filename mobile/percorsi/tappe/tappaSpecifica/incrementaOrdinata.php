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
    $sql = "SELECT MAX(tappa.ordine)  FROM tappa, Tappa_Appartiene_Percorso, percorso WHERE percorso.nome = '" . $_SESSION['nomePercorso'] . "' AND Tappa_Appartiene_Percorso.id_tappa=tappa.id AND percorso.id=Tappa_Appartiene_Percorso.id_percorso ";
    if ($result = $connessione->query($sql)) {
        $row = $result->fetch_assoc();
        $_SESSION['quanteTappe'] = $row['MAX(tappa.ordine)'];
    }

    if($_SESSION['ordine'] < $_SESSION['quanteTappe']){
        $_SESSION['ordine'] = $_SESSION['ordine']+1;
    }

    header("Location: index.php");
?>