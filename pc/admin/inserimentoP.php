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

    $nome = $connessione->real_escape_string($_REQUEST['nome']);
    $descrizione = $connessione->real_escape_string($_REQUEST['descrizione']);
    $idTappa = $connessione->real_escape_string($_REQUEST['idTappa']);
    
    

    
    $sql="INSERT INTO Percorso (nome, descrizione) VALUES ('$nome', '$descrizione')";
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
        echo "New record created successfully";
    }else{
        echo "Errore durante inserimento: ".$connessione->error;
    }

    if (isset($_FILES['copertina'])) {
        $errors = array();
        $file_name = $_FILES['copertina']['name'];
        $file_size = $_FILES['copertina']['size'];
        $file_tmp = $_FILES['copertina']['tmp_name'];
        $file_type = $_FILES['copertina']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['copertina']['name'])));
        $expensions = array("jpeg", "jpg", "png");
        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }
        if ($file_size > 10000000) {
            $errors[] = 'File size must be excately 10 MB';
        }
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "../../img/percorsi/$idPercorso.png");
            echo "Success";
        } else {
            print_r($errors);
        }
    }

    $connessione->close();
    header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/pc/admin/formP.php");

?>