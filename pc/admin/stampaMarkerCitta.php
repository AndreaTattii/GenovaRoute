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
    //query per selezionare lat, lon e nome delle tappe che si trovano nella città che ha come nome la variabile $nome
    $sql = "SELECT lat, lon, nome FROM tappa WHERE citta='".$nome."'";
    $result = $connessione->query($sql);
    $i=0;
    while($row = $result->fetch_assoc()){
        $i++;
        $test2 = array(
            'lat' => $row['lat'],
            'lon' => $row['lon'],
            'nome' => $row['nome'],
        );
    }
    echo json_encode($test2);
?>