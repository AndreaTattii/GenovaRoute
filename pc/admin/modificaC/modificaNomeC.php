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

    $nomeCitta = $connessione->real_escape_string($_REQUEST['nomeCitta']);
    $contenuto = $connessione->real_escape_string($_REQUEST['contenuto']);
 
    
    $sql="UPDATE citta SET nome = '".$contenuto."'
            WHERE nome = '".$nomeCitta."';";
    if ($result = $connessione->query($sql)) {
        header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/pc/admin/");
        
    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }



    $connessione->close();
/**/

    
?>