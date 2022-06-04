<?php
	session_start();

    $host ="localhost";
    $user="grovago";
    $password="";
    $database="my_grovago";

    $connessione= new mysqli($host, $user, $password , $database);

    if($connessione === false){
        die("Errore di connessione: ".$connessione->connect_error);
    }

    $commento = $_POST['commento'];
    $email = $_POST['email'];
    $idTappa = $_POST['idTappa'];
    
    
    $sql="UPDATE utente_percorre_tappa SET commento = '".$commento."'
            WHERE id_tappa = ".$idTappa."
                AND email ='".$email."'";
    if ($result = $connessione->query($sql)) {
        if(isset($_SESSION['arrivoDalCerca'])){
            unset($_SESSION['arrivoDalCerca']);
            header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/mobile/ricerca/commenti.php?idTappa=".$_SESSION['idTappa']."");
        }
        else{
            header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/mobile/percorsi/tappe/tappaSpecifica/commenti.php?idTappa=".$idTappa."");
        }
    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }



    $connessione->close();
/**/

    
?>