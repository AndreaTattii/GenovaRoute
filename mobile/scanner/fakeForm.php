<?php
    session_start();

    $risultato=$_GET['risultato'];

    //$risultato contiene il risultato della scansione, cioè due numeri separati da un .
    //Il primo numero è il numero del percorso, il secondo è il numero della tappa
    //estrapola dalla variabile $risultato i due numeri
    $pos = strpos($risultato, ".");
    $_SESSION['idPercorso'] = substr($risultato, 0, $pos);
    $_SESSION['idTappa'] = substr($risultato, $pos+1, strlen($risultato));

    //$_SESSION['idTappa'] = $risultato;

    $host = "127.0.0.1";
    $user = "root";
    $pass = "";
    $database = "genovaroute";

    $connessione = new mysqli($host, $user, $pass, $database);

    if ($connessione === false) {
        die("Errore: " . $connessione->connect_error);
    }
    $sql = "SELECT ordine 
            FROM percorso, tappa_appartiene_percorso, tappa 
            WHERE id_tappa = ". $_SESSION['idTappa']."
            AND percorso.id = tappa_appartiene_percorso.id_percorso
            AND tappa.id = tappa_appartiene_percorso.id_tappa
            AND percorso.id = ".$_SESSION['idPercorso']."";

    $result = $connessione->query($sql);
    $_SESSION['ordineTappa'] = $result->fetch_assoc()['ordine'];

    header("Location: ../percorsi/tappe/tappaSpecifica/index.php");
?>
