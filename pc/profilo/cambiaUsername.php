<?php
	session_start();

    $host ="localhost";
    $user="grovago";
    $password="";
    $database="my_grovago";

    $connessione= new mysqli($host, $user, $password , $database);

    if($connessione === false){
        die("Errore di connessione: ".$connessione->connect_error);
    }

    $username = $_POST['username'];

    $sql="UPDATE utente SET username = '".$username."'
            WHERE email = '".$_SESSION['email']."'";

    if ($result = $connessione->query($sql)) {
        header("Location: settings.php") ;       
    }
    else{
        echo "Errore nella query";
    }


    $connessione->close();
?>