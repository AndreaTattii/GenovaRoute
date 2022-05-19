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

    $nome = $connessione->real_escape_string($_POST['nomeCitta']);

    $sql = "DELETE FROM citta
            WHERE nome = '".$nome."'";

    if ($result = $connessione->query($sql)) {
        header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/pc/admin/index.php");
        

    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }

    

    $connessione->close();
/**/

    
?>