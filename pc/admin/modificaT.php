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

    $nome = $connessione->real_escape_string($_REQUEST['nome']);
    $descrizione = $connessione->real_escape_string($_REQUEST['descrizione']);
    $via = $connessione->real_escape_string($_REQUEST['via']);
    $img1 = $connessione->real_escape_string($_REQUEST['immagine1']);
    $img2 = $connessione->real_escape_string($_REQUEST['immagine2']);
    $img3 = $connessione->real_escape_string($_REQUEST['immagine3']);
    $lon = $connessione->real_escape_string($_REQUEST['longitudine']);
    $lat = $connessione->real_escape_string($_REQUEST['latitudine']);
    
    //hashing della password
    $password = hash("sha256", $password);

    $sql = "INSERT INTO Tappa (nome, descrizione, via, img1, img2, img3, lon, lat) VALUES 
    ('".$nome."','".$descrizione."', '".$via."', '".$img1."','".$img2."','".$img3."','".$lon."','".$lat."')";
    
    if($connessione->query($sql) === true){
        header("Location: formT.php");
    }else{
        echo "Errore durante inserimento: ".$connessione->error;
    }
/**/

    
?>