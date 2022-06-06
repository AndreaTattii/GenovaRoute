<?php
	session_start();

    $host="localhost";
    $user="grovago";
    $password="";
    $database="my_grovago";

    $connessione= new mysqli($host, $user, $password , $database);

    if($connessione === false){
        die("Errore di connessione: ".$connessione->connect_error);
    }

    $cognome = $_POST['cognome'];
    $username = $_POST['username'];
    $nome = $_POST['nome'];

    
    $sql="UPDATE utente SET cognome = '".$cognome."'
            WHERE email = '".$_SESSION['email']."'";

    if ($result = $connessione->query($sql)) {
    }
    else{
        echo "Errore nella query";
    }

    $sql="UPDATE utente SET nome = '".$nome."'
            WHERE email = '".$_SESSION['email']."'";

    if ($result = $connessione->query($sql)) {
    }
    else{
        echo "Errore nella query";
    }

    $sql="UPDATE utente SET username = '".$username."'
            WHERE email = '".$_SESSION['email']."'";

    if ($result = $connessione->query($sql)) {
        header("Location: index.php") ;       
    }
    else{
        echo "Errore nella query";
    }

    
    $connessione->close();
?>