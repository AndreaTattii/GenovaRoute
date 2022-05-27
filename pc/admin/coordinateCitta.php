<?php
    session_start(); 

    $host="127.0.0.1";
    $user="root";
    $pass="";
    $database="GenovaRoute";

    $connessione = new mysqli($host, $user, $pass , $database);
    
    if($connessione === false){
        echo "Errore: ".$connessione->error;
    }

    $nome = $_POST['città'];
    //query to get the coordinates of the city
    $sql = "SELECT x,y FROM citta WHERE nome='".$nome."'";
    $result = $connessione->query($sql);
    $row = $result->fetch_assoc();
    //$res = array(
    //    'x' => $row['x'],
    //    'y' => $row['y'],
    // );
    //echo json_encode($res);
    //$_SESSION['x'] = $row['x'];
    //$_SESSION['y'] = $row['y'];
    $test = array();
    $test['x'] = $row['x'];
    $test['y'] = $row['y'];

    echo json_encode($test);
?>
