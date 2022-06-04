<?php
    session_start(); 
        
    $host ="localhost";
    $user="grovago";
    $pass="";
    $database="my_grovago";

    $conn = new mysqli($host, $user, $pass , $database);
    //prendi le variabili dell'email dell'utente e dell'id del percorso con il metodo post dal jquery ed esegui la query per rimuovere il preferito
    $email = $_SESSION['email'];
    $idPercorso = $_POST['idPercorso'];
    $query = "DELETE FROM utente_preferisce_percorso WHERE email = '$email' AND id_percorso = '$idPercorso'";
    $result = $conn->query($query);
    //se la query è andata a buon fine, restituisci un messaggio di successo al jquery
    if($result){
        echo "success";
    }
    else{
        echo "error";
    }
?>