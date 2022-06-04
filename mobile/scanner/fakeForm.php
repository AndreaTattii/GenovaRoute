<?php
    session_start();
    //decommenta questa riga se vuoi testare l'altro scanner
    //$risultato=$_POST['risultato'];
    $risultato=$_GET['risultato'];

    //$risultato contiene il risultato della scansione, cioè due numeri separati da un .
    //Il primo numero è il numero del percorso, il secondo è il numero della tappa
    //estrapola dalla variabile $risultato i due numeri
    $pos = strpos($risultato, ".");
    $_SESSION['idPercorso'] = substr($risultato, 0, $pos);
    $_SESSION['idTappa'] = substr($risultato, $pos+1, strlen($risultato));

    //$_SESSION['idTappa'] = $risultato;

    $host = "localhost";
    $user = "grovago";
    $pass = "";
    $database="my_grovago";

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

    //controlla che la tappa sia stata già scansionata
    $sql = "SELECT id_tappa 
            FROM utente_percorre_tappa 
            WHERE id_tappa = ".$_SESSION['idTappa']."
            AND email = '".$_SESSION['email']."';
            ";
    $result = mysqli_query($connessione, $sql);
    if($result->num_rows > 0){
        echo'Tappa già scansionata';
    }else{
        $_SESSION['primaVolta']=1;

        //fai una query che inserisca nella tabella Utente_Percorre_Tappa la mail dell'utente e l'id della tappa
        $sql = "INSERT INTO utente_percorre_tappa (email, id_tappa, piace, commento, data) VALUES ('".$_SESSION['email']."', '".$_SESSION['idTappa']."', null, null, curdate())";
        $connessione->query($sql);

        $sql = "UPDATE utente SET xp=(xp+200) WHERE email='".$_SESSION['email']."'";
        $connessione->query($sql);

        $sql = "SELECT xp, livello FROM utente WHERE email='".$_SESSION['email']."'";
        $result = $connessione->query($sql);
        $row = $result->fetch_assoc();
        $xp = $row['xp'];
        $livello = $row['livello'];

        
        $xpPerLivello = 200;
        $xpNecessari=$xpPerLivello*$livello+1;
        $xpMancanti=$xpNecessari-$xp;

        if($xp>=$xpNecessari){
            $sql = "UPDATE utente SET livello=(livello+1) WHERE email='".$_SESSION['email']."'";
            $connessione->query($sql);
            $sql = "UPDATE utente SET xp=(0) WHERE email='".$_SESSION['email']."'";
            $connessione->query($sql);
            $_SESSION['levelup']=1;
        }
    }

    header("Location: ../percorsi/tappe/tappaSpecifica/index.php");
?>
