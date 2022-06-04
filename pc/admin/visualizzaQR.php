<?php
session_start();

$idPercorso = $_POST['idPercorso'];
$nomePercorso = $_POST['nomePercorso'];
$ordine = $_POST['ordine'];



$host = "127.0.0.1";
$user = "grovago";
$pass = "";
$database="my_grovago";

$connessione = new mysqli($host, $user, $pass, $database);

//error_reporting(0);

if ($connessione === false) {
    die("Errore: " . $connessione->connect_error);
}
$sql = "SELECT tappa.nome, tappa.id
        FROM tappa, tappa_appartiene_percorso, percorso 
        WHERE tappa.id=tappa_appartiene_percorso.id_tappa 
        AND ordine=".$ordine." AND percorso.id=tappa_appartiene_percorso.id_percorso 
        AND percorso.id=". $idPercorso."";
if ($result = $connessione->query($sql)) {
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $nome = $row['nome'];
} else {
    echo "Impossibile eseguire la query nr.1";
}
$sql = "SELECT COUNT(tappa_appartiene_percorso.id_tappa) AS numeroTappe FROM tappa, percorso, tappa_appartiene_percorso WHERE percorso.nome='" . $nomePercorso . "' AND percorso.id=tappa_appartiene_percorso.id_percorso AND tappa.id=tappa_appartiene_percorso.id_tappa";

if ($result = $connessione->query($sql)) {
    $row = $result->fetch_assoc();
    $_SESSION['quanteTappe'] = $row['numeroTappe'];
} else {
    echo "Impossibile eseguire la query nr.2";
}

$pathQR = "qrCodes/".$idPercorso . "." . $id . ".png";

?>

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
    <link rel="icon" href="../../img/Admin.png" type="image/icon type">

</head>

<body class="d-flex flex-column min-vh-100">

    <!-- NAVBAR -->
    <nav class="navbar  navbar-expand-lg" style="background-color: #B30000;">
        <div class="container">
            <div class="col">
                <a class="navbar-brand" style="font-family: 'Amiri', serif; color: white; font-weight: bold; text-align: center; " href="index.php">
                    <h1>Genova Route Administration</h1>
                </a>
            </div>

        </div>
    </nav>
    <br>
    <br>
    <br>

    <div class="container">

        <div class="row">
            <div class="col-8">
                <h1><?php echo $nomePercorso ?>: <?php echo $nome ?></h1>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-3">
                <img src="<?php echo $pathQR; ?>" alt="qr code" width="300" height="300">
            </div>

        </div>
        <div style="text-align:center; ">
            <a style="color:#B30000; font-size:30px;" href="<?php echo $pathQR; ?>" download="<?php echo $idPercorso.'.'.$id.'.png' ?>">Scarica</a>
            <strong style="text-align:center"><a style="color:black; font-size:25px;" href="percorso.php">&nbsp;Torna alla modifica del percorso&nbsp;</a></strong>
        </div>
        <br>
        <div class="row">
            <!--<h3>Contenuto del QR Code--> <?php //echo $idPercorso.'.'.$id.'' ;?> <!-- (IdPercorso= --> <?php //echo $idPercorso;?> <!--idTappa= --> <?php //echo $id;?><!-- )</h3> -->
            <b>N.B.</b>
            <p>Il QR-CODE identifica una tappa in un percorso. Una tappa, quindi, ha un QR-CODE diverso per ogni percorso.</p>
        </div>

            <div style="float:left;">
                <?php
                    if ($ordine != 0) {
                        $ordine = $ordine - 1;
                            echo '
                                <form method="post" action="../admin/visualizzaQR.php">
                                    <input type="hidden" name="ordine" value="' . $ordine . '">
                                    <input type="hidden" name="nomePercorso" value="' . $nomePercorso . '">
                                    <input type="hidden" name="idPercorso" value="' . $idPercorso . '">
                                    <input type="image" src="../../img/icons/PcBackRed.png" name="tappa" value="Avanti" class="" style="width:50px">
                                </form>
                            ';
                            $ordine = $ordine + 1;
                    }
                ?>
            </div>
            <div style="float:right;">
                <?php
                    if ($ordine != $_SESSION['quanteTappe'] - 1) {
                        $ordine = $ordine + 1;
                        echo '
                            <form method="post" action="../admin/visualizzaQR.php">
                                <input type="hidden" name="ordine" value="' . $ordine. '">
                                <input type="hidden" name="nomePercorso" value="' . $nomePercorso . '">
                                <input type="hidden" name="idPercorso" value="' . $idPercorso . '">
                                <input type="image" src="../../img/icons/PcForwardRed.png" name="tappa" value="Avanti" class="" style="width:50px">
                            </form>
                        ';
                        $ordine = $ordine - 1;
                    }
                ?>
            </div>

    </div>
    <br>
    <br> 
    <br>
    <br>
</body>