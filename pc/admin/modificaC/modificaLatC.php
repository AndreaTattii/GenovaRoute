<?php
	session_start();

    $host="127.0.0.1";
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
    
    $sql="UPDATE citta SET y = '".$contenuto."'
            WHERE nome = ".$nome;
    if ($result = $connessione->query($sql)) {
        header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/pc/admin/formModificaT.php");
        
    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }



    $connessione->close();
/**/

    
?>