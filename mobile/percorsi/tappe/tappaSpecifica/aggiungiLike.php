<?php
    session_start(); 
    
    $host="127.0.0.1";
    $user="root";
    $pass="";
    $database="GenovaRoute";

    $connessione = new mysqli($host, $user, $pass , $database);
    
    if($connessione === false){
        echo "Errore: ".$connessione->error;
    }

    $id=$_POST['idTappa'];
    //crea una query sql per inserire 1 nell'attributo piace della tabella della tappa
    $sql = "UPDATE Utente_Percorre_Tappa SET piace=1 WHERE email='".$_SESSION['email']."' AND id_tappa=".$id.";";
    mysqli_query($connessione, $sql);
    echo "Errore: ".$connessione->error;
?>