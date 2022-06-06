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

    $idTappa = $connessione->real_escape_string($_REQUEST['idTappa']);   
    $idPercorso = $connessione->real_escape_string($_REQUEST['idPercorso']);
    
    $sql = "SELECT ordine
            FROM tappa_appartiene_percorso
            WHERE id_tappa = ".$idTappa."
            AND id_percorso = ".$idPercorso."";

    if ($result = $connessione->query($sql)) {
        $row = $result->fetch_assoc();
        $ordineTappa = $row['ordine'];
    }else{
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;    

    }


    $sql="SELECT * FROM tappa_appartiene_percorso";
    if ($result = $connessione->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if($row['ordine'] >= $ordineTappa){
                    $query = "UPDATE  tappa_appartiene_percorso 
                            SET ordine = (ordine-1) 
                            WHERE id_tappa = ".$row['id_tappa']."
                                AND id_percorso = ".$row['id_percorso'].";";
                            if($connessione->query($query)){

                            }else {
                                echo "Errore nella query: " . $sql . "<br>" . $connessione->error;  
                            }
                }
            }
        } else {
            echo "Nessun percorso presente";
        }
    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }



    $sql = "DELETE FROM tappa_appartiene_percorso
            WHERE id_tappa = ".$idTappa."
            AND id_percorso = ".$idPercorso.";";

    if ($result = $connessione->query($sql)) {
        header("Location: index.php");
    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }

    $connessione->close();
/**/

    
?>