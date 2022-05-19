<?php
session_start();

$idTappa = $_POST['idTappa'];
$idPercorso = $_POST['idPercorso'];
$nomePercorso = $_POST['nomePercorso'];

$pathQR = "qrCodes/".$idPercorso . "." . $idTappa . ".png";


$host = "127.0.0.1";
$user = "root";
$password = "";
$database = "GenovaRoute";

$connessione = new mysqli($host, $user, $password, $database);

if ($connessione === false) {
    die("Errore di connessione: " . $connessione->connect_error);
}

$sql = "SELECT nome FROM Tappa WHERE id = ".$idTappa;

if ($result = $connessione->query($sql)) {
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $nomeTappa = $row['nome'];
    }

} else {
echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
}
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
                <h1><?php echo $nomePercorso ?>: <?php echo $nomeTappa ?></h1>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-3">
                <img src="<?php echo $pathQR; ?>" alt="qr code" width="300" height="300">
            </div>

        </div>
        <div style="text-align:center; ">
            <a style="color:#B30000; font-size:30px;" href="<?php echo $pathQR; ?>" download="<?php echo $idPercorso.'.'.$idTappa.'.png' ?>">Scarica</a>
        </div>
        <div class="row">
            <b><p>N.B.</p></b>
            <p>Il QR-CODE identifica una tappa in un percorso. Una tappa, quindi, ha un QR-CODE diverso per ogni percorso.</p>
            <p>Presta attenzione a mettere, su una tappa, un QR-CODE per ogni percorso tramite il quale può essere raggiunta.</p>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
</body>