<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="../../bootstrap/js/bootstrap.min.js"></script>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS Personale-->
        <link rel="stylesheet" href="../../css/style.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

        <!-- font -->
        <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,400;1,700&display=swap" rel="stylesheet">

        <title>Genova Route</title>
        <link rel="icon" href="img/g.png" type="image/icon type">
    </head>    
    <body>

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

    $sql = "SELECT percorso.id, percorso.nome, percorso.descrizione 
            FROM percorso, tappa_appartiene_percorso 
            WHERE id_tappa = " . $_SESSION['idTappa'] . "
            AND percorso.id = tappa_appartiene_percorso.id_percorso";

    if ($result = $connessione->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) { 
                echo '';                                                                            
            }
        } else {
            echo "Non ci sono percorsi salvati nel database che contengono questa tappa";
        }
    } else {
        echo "Impossibile eseguire la query";
    }
    //echo 'il percorso è' . $percorso . ' e la tappa è ' . $tappa;
    header("Location: ../percorsi/tappe/tappaSpecifica/index.php");
    ?>
</body>
</html>