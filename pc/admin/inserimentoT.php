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
    $descrizione = $connessione->real_escape_string($_REQUEST['nuovaDescrizione']);
    $categoria = $_POST['categoria'];
    $via = $connessione->real_escape_string($_REQUEST['via']);
    $città = $connessione->real_escape_string($_REQUEST['città']);
    $lon = $connessione->real_escape_string($_REQUEST['longitudine']);
    $lat = $connessione->real_escape_string($_REQUEST['latitudine']);

    
    $sql = "INSERT INTO Tappa (nome, descrizione, categoria, via, citta, lon, lat) VALUES 
    ('".$nome."','".$descrizione."', '".$categoria."', '".$via."', '".$città."','".$lon."','".$lat."')";
    
    if($connessione->query($sql) === true){
        echo "New record created successfully";
    }else{
        echo "Errore durante inserimento: ".$connessione->error;
    }
/**/
    $sql = "SELECT MAX(id) AS maxId FROM Tappa;";
    if ($risultato = $connessione->query($sql)) {
        $row = $risultato->fetch_assoc();
        $idMassimo = $row['maxId'];
        echo $idMassimo;
    } else {
        echo "Impossibile eseguire la query";
    }

    if (isset($_FILES['img1'])) {
        $errors = array();
        $file_name = $_FILES['img1']['name'];
        $file_size = $_FILES['img1']['size'];
        $file_tmp = $_FILES['img1']['tmp_name'];
        $file_type = $_FILES['img1']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['img1']['name'])));
        $expensions = array("jpeg", "jpg", "png");
        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }
        if ($file_size > 10000000) {
            $errors[] = 'File size must be excately 10 MB';
        }
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "../../img/tappe/$idMassimo.1.png");
            echo "Success";
        } else {
            print_r($errors);
        }
    }
    if (isset($_FILES['img2'])) {
        $errors = array();
        $file_name = $_FILES['img2']['name'];
        $file_size = $_FILES['img2']['size'];
        $file_tmp = $_FILES['img2']['tmp_name'];
        $file_type = $_FILES['img2']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['img2']['name'])));
        $expensions = array("jpeg", "jpg", "png");
        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }
        if ($file_size > 10000000) {
            $errors[] = 'File size must be excately 10 MB';
        }
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "../../img/tappe/$idMassimo.2.png");
            echo "Success";
        } else {
            print_r($errors);
        }
    }
    if (isset($_FILES['img3'])) {
        $errors = array();
        $file_name = $_FILES['img3']['name'];
        $file_size = $_FILES['img3']['size'];
        $file_tmp = $_FILES['img3']['tmp_name'];
        $file_type = $_FILES['img3']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['img3']['name'])));
        $expensions = array("jpeg", "jpg", "png");
        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }
        if ($file_size > 10000000) {
            $errors[] = 'File size must be excately 10 MB';
        }
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "../../img/tappe/$idMassimo.3.png");
            echo "Success";
        } else {
            print_r($errors);
        }
    }

    header("Location: formT.php");
?>