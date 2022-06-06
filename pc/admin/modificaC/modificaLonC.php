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

    $nomeCitta = $connessione->real_escape_string($_REQUEST['nomeCitta']);
    $contenuto = $connessione->real_escape_string($_REQUEST['contenuto']);
    
    echo $idTappa;
    echo $contenuto;
    
    $sql="UPDATE citta SET x = '".$contenuto."'
            WHERE nome = ".$nome;
    if ($result = $connessione->query($sql)) {
        header("Location: ../formModificaT.php");
        
    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }



    $connessione->close();
/**/

    
?>