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

    $idTappa = $connessione->real_escape_string($_REQUEST['idTappa']);
    
    
    $sql="SELECT id FROM Percorso
        WHERE id IN (
            SELECT DISTINCT id_percorso AS id 
            FROM tappa_appartiene_percorso
            WHERE id_tappa = ".$idTappa."
        )";
    if ($result = $connessione->query($sql)) {
        if($resultPercorso->num_rows > 0) {
            while ($rowPercorso = $resultPercorso->fetch_assoc()) {
                
                $query = "SELECT ordine FROM tappa_appartiene_percorso
                        WHERE id_tappa = ".$idTappa."
                        AND id_percorso = ".$rowPercorso['id']."
                ";
                echo $query;
                if($result = $connessione->query($sql)) {   
                    if($result->num_rows > 0){
                        $row = $result->fetch_assoc();
                        $ordineTappa = $row['ordine'];
                    }
                    
                } else {
                    echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
                }

                $query = "UPDATE tappa_appartiene_percorso SET ordine = (ordine-1)
                    WHERE ordine > $ordineTappa
                    AND id_percorso = ".$rowPercorso['id']."
                ";
                if ($result = $connessione->query($sql)) {
            
            
                } else {
                    echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
                }
            }
        } else {
            echo "Nessun percorso presente";
        }
    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }
    

    

    $sql = "DELETE FROM tappa
            WHERE id = ".$idTappa.";";

    if ($result = $connessione->query($sql)) {
        header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/pc/admin/index.php");


    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }

    $connessione->close();

?>