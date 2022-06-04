<?php
    session_start(); 
    
    $host="127.0.0.1";
    $user="grovago";
    $pass="";
    $database="my_grovago";

    $connessione = new mysqli($host, $user, $pass , $database);
    
    if($connessione === false){
        echo "Errore: ".$connessione->error;
    }

    $id=$_POST['idTappa'];
    //crea una query sql per inserire 1 nell'attributo piace della tabella della tappa
    $sql = "UPDATE Utente_Percorre_Tappa SET piace=null WHERE id_tappa='$id' AND email='".$_SESSION['email']."';";
    mysqli_query($connessione, $sql);
?>