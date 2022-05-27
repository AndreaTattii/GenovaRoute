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

    //crea un sistema di livelli, ogni utente ha un livello dell'account, per salire di livello bisogna raggiungere tot xp raddoppiano per ogni livello da raggiungere 
    //il livello massimo è 50
    //il livello minimo è 1
    //scannerizzando una tappa si ottengono 100 xp, completando un percorso se ne ottengono 500

    //fai una query per vedere di che livello è l'utente 
    $sql = "SELECT xp, livello FROM utente WHERE email='".$_SESSION['email']."';";

    if($result = $connessione->query($sql); === true){
        $row = $result->fetch_assoc();
        $xp = $row['xp'];
        $livello = $row['livello'];
    }
    else{
        echo "Errore: ".$connessione->error;        
    }

    $xpPerLivello = 200;
    $xpNecessari=$xpPerLivello*$livello;
    $xpMancanti=$xpNecessari-$xp;

?>