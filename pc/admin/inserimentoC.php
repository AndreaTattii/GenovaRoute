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

    $nome = $connessione->real_escape_string($_POST['nome']);
    $x = $connessione->real_escape_string($_POST['latitudine']);
    $y = $connessione->real_escape_string($_POST['longitudine']);

    //controlla se esistono già citta con lo stesso nome
    $sql = "SELECT * FROM citta WHERE nome = '".$nome."'";
    if ($result = $connessione->query($sql)) {
        $row = $result->fetch_assoc();
        if($row['nome'] == $nome){
            $_SESSION['errore'] = "Esiste già una città con lo stesso nome";
            header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/pc/admin/formC.php");
        }
    }
    


    $sql = "INSERT INTO Citta (nome, x, y) VALUES 
    ('".$nome."','".$x."', '".$y."')";
    
    if(($connessione->query($sql) === true)&&(!isset($_SESSION['errore']))){
        header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/pc/admin/formC.php");
    }else{
        echo "Errore durante inserimento: ".$connessione->error;
    }

    
?>