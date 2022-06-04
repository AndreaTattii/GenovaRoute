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

    $idTappa = $connessione->real_escape_string($_REQUEST['idTappa']);
    $contenuto = $connessione->real_escape_string($_REQUEST['contenutoLat']);
    
    
    $sql="UPDATE tappa SET lat = '".$contenuto."'
            WHERE id = ".$idTappa;
    if ($result = $connessione->query($sql)) {
        header("Location: formModificaT.php");
        
    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }



    $connessione->close();
/**/

    
?>