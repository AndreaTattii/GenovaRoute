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

    $nome = $connessione->real_escape_string($_REQUEST['nome']);
    $descrizione = $connessione->real_escape_string($_REQUEST['descrizione']);
    $copertina = $connessione->real_escape_string($_REQUEST['copertina']);

    $idTappa = $connessione->real_escape_string($_REQUEST['idTappa']);
    
    

    
    $sql="INSERT INTO Percorso (nome, descrizione, copertina) VALUES ('$nome', '$descrizione', '$copertina')";
    if ($result = $connessione->query($sql)) {
        echo "Percorso inserito con successo";
    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }


    //restituisci ultimo percroso inserito
    $sql="SELECT id FROM Percorso
        WHERE nome = '$nome'
        AND descrizione = '$descrizione'
    ";
    if ($result = $connessione->query($sql)) {
        if($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $idPercorso = $row['id'];
            }
        } else {
            echo "Nessun percorso presente";
        }
    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }



    $sql = "INSERT INTO tappa_appartiene_percorso (id_tappa, id_percorso, ordine) VALUES 
    ('".$idTappa."','".$idPercorso."', 0)";

    if($connessione->query($sql) === true){
        header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/pc/admin/index.php");
    }else{
        echo "Errore durante inserimento: ".$connessione->error;
    }


    $connessione->close();
?>