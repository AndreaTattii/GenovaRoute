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

    $commento = $_POST['commento'];
    $email = $_POST['email'];
    $idTappa = $_POST['idTappa'];
    
    
    $sql="UPDATE utente_percorre_tappa SET commento = '".$commento."'
            WHERE id_tappa = ".$idTappa."
                AND email ='".$email."'";
                
    if ($result = $connessione->query($sql)) {
        header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/mobile/profilo/commenti.php?idTappa=".$idTappa."");
    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }



    $connessione->close();
    
?>