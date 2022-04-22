<?php
	session_start();

    $host="127.0.0.1";
    $user="root";
    $password="";
    $database="getnbite";

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

    $sql = "INSERT INTO utente (nome, cognome, email, pass) VALUES 
    ('$nome','$cognome', '$mail', '$password')";


    if($connessione->query($sql) === true){
        $_SESSION['email']= $mail;
        header("location: ../../../../");
        echo "Utente inserito con successo";
    }else{
        echo "Errore durante inserimento: ".$connessione->error;
    }

    $sql = "SELECT * FROM utente WHERE email='".$_SESSION['email']."'";
    $result = $connessione->query($sql);
    $row = $result->fetch_array();

    $sql = "INSERT INTO carrello (id_Utente) VALUES 
    ('".$row['id']."')";
    $connessione->query($sql);
    $connessione->close();
?>