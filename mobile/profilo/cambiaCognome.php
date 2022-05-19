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

    $cognome = $_POST['cognome'];

    $sql="UPDATE utente SET cognome = '".$cognome."'
            WHERE email = '".$_SESSION['email']."'";

    if ($result = $connessione->query($sql)) {
        header("Location: settings.php") ;       
    }
    else{
        echo "Errore nella query";
    }


    $connessione->close();
?>