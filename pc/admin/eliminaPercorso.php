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

    $idPercorso = $connessione->real_escape_string($_REQUEST['idPercorso']);
    
    
    /*$sql = "SELECT id_tappa 
            FROM tappa_appartiene_percorso
            WHERE id_percorso = ".$idPercorso."";

    if ($result = $connessione->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
               $query = "DELETE FROM tappa_appartiene_percorso
                        WHERE id_percorso = ".$idPercorso."
                            AND id_tappa =".$row['id_tappa']."";
            }
        } else {
            echo "Nessun percorso presente";
        }
    } else {
    echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }*/

    $sql = "DELETE FROM tappa_appartiene_percorso
            WHERE id_percorso = ".$idPercorso.";";

    if ($result = $connessione->query($sql)) {
        //header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/pc/admin/index.php");


    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }

    $sql = "DELETE FROM percorso
            WHERE id = ".$idPercorso.";";

    if ($result = $connessione->query($sql)) {
        //header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/pc/admin/index.php");


    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }

    $connessione->close();
/**/

    
?>