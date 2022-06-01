<?php
    session_start();
    $host = "127.0.0.1";
    $user = "root";
    $pass = "";
    $database = "genovaroute";
    $connessione = new mysqli($host, $user, $pass, $database);
    if ($connessione === false) {
        die("Errore: " . $connessione->connect_error);
    }
    $search = $connessione->real_escape_string($_POST['query']);
    $sql = "SELECT * FROM tappa WHERE nome LIKE '%$search%'";
    if ($result = $connessione->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) { 
                echo 'Ciò che voglio stampare';
            }
        } else {
            echo "Nessun risultato...";
        }
    } else {
        echo "Impossibile eseguire la query";
    }
?>