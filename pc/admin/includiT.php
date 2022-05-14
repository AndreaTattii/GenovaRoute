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
    $_SESSION['idTappa'] = $idTappa;
    $idPercorso = $connessione->real_escape_string($_REQUEST['idPercorso']);
    $_SESSION['idPercorso'] = $idPercorso;
    $ordineTappa = $connessione->real_escape_string($_REQUEST['ordineTappa']);
    $_SESSION['ordineTappa'] = $ordineTappa;
    
    /*
    $sql="SELECT * FROM tappa_appartiene_percorso";
    if ($result = $connessione->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if($row['ordine'] >= $ordineTappa){
                    $query = "UPDATE  tappa_appartiene_percorso 
                            SET ordine = (ordine+1) 
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
    */  
    $sql="UPDATE tappa_appartiene_percorso SET ordine = (ordine+1)
            WHERE ordine >= ".$ordineTappa."
            AND id_percorso = ".$idPercorso;

    if ($result = $connessione->query($sql)) {

    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }

    $sql = "INSERT  INTO tappa_appartiene_percorso (id_tappa, id_percorso, ordine) VALUES 
    ('$idTappa','$idPercorso', '$ordineTappa')";

    if ($result = $connessione->query($sql)) {
        header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/pc/admin/QRCode.php");


    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }

    $connessione->close();
/**/

    
?>