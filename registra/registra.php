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

    $nome = $connessione->real_escape_string($_REQUEST['nome']);
    $cognome = $connessione->real_escape_string($_REQUEST['cognome']);
    $mail = $connessione->real_escape_string($_REQUEST['mail']);
    $password = $connessione->real_escape_string($_REQUEST['password']);
    
    //hashing della password
    $password = hash("sha256", $password);

    $sql = "INSERT INTO utente (nome, cognome, email, psw) VALUES 
    ('$nome','$cognome', '$mail', '$password')";

    
    if($connessione->query($sql) === true){
        $_SESSION['email']= $mail;
        if($_SESSION['dispositivo']=='mobile'){
            header("Location: ../mobile/percorsi/index.php");
        }
        else{
            header("Location: ../pc/index.php");
        }
        //header("location: ../".$_SESSION['dispositivo']."/percorsi/index.php");
        echo "Utente inserito con successo";
    }else{
        echo "Errore durante inserimento: ".$connessione->error;
    }


    
?>