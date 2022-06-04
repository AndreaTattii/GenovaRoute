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

    $nome = $connessione->real_escape_string($_POST['nomeCitta']);

    $sql = "DELETE FROM citta
            WHERE nome = '".$nome."'";

    if ($result = $connessione->query($sql)) {
        header("Location: index.php");
        

    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }

    

    $connessione->close();
/**/

    
?>