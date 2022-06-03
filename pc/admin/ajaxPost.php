<?php 
session_start();
    $host="127.0.0.1";
    $user="root";
    $pass="";
    $database="GenovaRoute";

    $mysqli = new mysqli($host, $user, $pass , $database);


$allData = $_POST['allData'];
$i = 0;
foreach ($allData as $key => $value) {
    $sql = "UPDATE tappa_appartiene_percorso SET ordine=".$i." WHERE id_tappa=".$value." and id_percorso=".$_SESSION['idPercorso']."";
    $mysqli->query($sql);
    $i++;
}
