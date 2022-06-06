<?php 
session_start();
    $host="localhost";
    $user="grovago";
    $pass="";
    $database="my_grovago";

    $mysqli = new mysqli($host, $user, $pass , $database);


$allData = $_POST['allData'];
$i = 0;
foreach ($allData as $key => $value) {
    $sql = "UPDATE tappa_appartiene_percorso SET ordine=".$i." WHERE id_tappa=".$value." and id_percorso=".$_SESSION['idPercorso']."";
    $mysqli->query($sql);
    $i++;
}
