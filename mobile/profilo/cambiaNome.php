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

    $nome = $_POST['nome'];

    $sql="UPDATE utente SET nome = '".$nome."'
            WHERE email = '".$_SESSION['email']."'";

    if ($result = $connessione->query($sql)) {
        header("Location: settings.php") ;       
    }
    else{
        echo "Errore nella query";
    }


    $connessione->close();
?>