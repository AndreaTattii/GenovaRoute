<?php
session_start();

$host = "127.0.0.1";
$user = "root";
$pass = "";
$database = "GenovaRoute";
$connessione = new mysqli($host, $user, $pass, $database);

if(isset($_POST['idTappa'])){
    $_SESSION['idTappa'] = $connessione->real_escape_string($_REQUEST['idTappa']);
}


if ($connessione === false) {
    echo "Errore: " . $connessione->error;
}
$sql = "SELECT nome FROM tappa WHERE id = ".$_SESSION['idTappa']."";

if ($result = $connessione->query($sql)) {
    $row = $result->fetch_assoc();
    $nomeTappa = $row['nome'];
} else {
    echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
}
?>
<!doctype html>
<html lang="en">

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

    <!-- CORPO -->
    <br>
    <br>

    <!-- Fai un form per l'inserimento di records nella tabella tappa nel db-->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center"> <?php echo $nomeTappa ?></h1>
            </div>
        </div>


        <form action="modificaT/modificaNomeT.php" method="POST">
            <div class="row" style="margin:10px;">
                <div class="col">
                    <input type="text" class="form-control" id="contenuto" name="contenuto" placeholder="Nome della tappa">
                </div>
                <div class="col">
                    <?php
                    echo "<input type='hidden' name='idTappa' value='" . $_SESSION['idTappa'] . "'>"
                    ?>
                    <button type="submit" class="btn btn-primary" style=" background-color:#B30000; border-color:#B30000;">Modifica</button>
                </div>
            </div>
        </form>

        <form action="modificaT/modificaDescrizioneT.php" method="POST">
            <div class="row" style="margin:10px;">
                <div class="col">
                    <input type="text" class="form-control" id="contenuto" name="contenuto" placeholder="Descrizione della tappa">
                </div>
                <div class="col">
                    <?php
                    echo "<input type='hidden' name='idTappa' value='" . $_SESSION['idTappa'] . "'>"
                    ?>
                    <button type="submit" class="btn btn-primary" style=" background-color:#B30000; border-color:#B30000;">Modifica</button>
                </div>
            </div>
        </form>

        <form action="modificaT/modificaImg1T.php" method="POST">
            <div class="row" style="margin:10px;">
                <div class="col">
                    <input type="text" class="form-control" id="contenuto" name="contenuto" placeholder="Url immagine 1 ">
                </div>
                <div class="col">
                    <?php
                    echo "<input type='hidden' name='idTappa' value='" . $_SESSION['idTappa'] . "'>"
                    ?>
                    <button type="submit" class="btn btn-primary" style=" background-color:#B30000; border-color:#B30000;">Modifica</button>
                </div>
            </div>
        </form>

        <form action="modificaT/modificaImg2T.php" method="POST">
            <div class="row" style="margin:10px;">
                <div class="col">
                    <input type="text" class="form-control" id="contenuto" name="contenuto" placeholder="Url immagine 2">
                </div>
                <div class="col">
                    <?php
                    echo "<input type='hidden' name='idTappa' value='" . $_SESSION['idTappa'] . "'>"
                    ?>
                    <button type="submit" class="btn btn-primary" style=" background-color:#B30000; border-color:#B30000;">Modifica</button>
                </div>
            </div>
        </form>

        <form action="modificaT/modificaImg3T.php" method="POST">
            <div class="row" style="margin:10px;">
                <div class="col">
                    <input type="text" class="form-control" id="contenuto" name="contenuto" placeholder="Url immagine 3">
                </div>
                <div class="col">
                    <?php
                    echo "<input type='hidden' name='idTappa' value='" . $_SESSION['idTappa'] . "'>"
                    ?>
                    <button type="submit" class="btn btn-primary" style=" background-color:#B30000; border-color:#B30000;">Modifica</button>
                </div>
            </div>
        </form>

        <form action="modificaT/modificaViaT.php" method="POST">
            <div class="row" style="margin:10px;">
                <div class="col">
                    <input type="text" class="form-control" id="contenuto" name="contenuto" placeholder="Via">
                </div>
                <div class="col">
                    <?php
                    echo "<input type='hidden' name='idTappa' value='" . $_SESSION['idTappa'] . "'>"
                    ?>
                    <button type="submit" class="btn btn-primary" style=" background-color:#B30000; border-color:#B30000;">Modifica</button>
                </div>
            </div>
        </form>

        <form action="modificaT/modificaLonT.php" method="POST">
            <div class="row" style="margin:10px;">
                <div class="col">
                    <input type="text" class="form-control" id="contenuto" name="contenuto" placeholder="Longitudine">
                </div>
                <div class="col">
                    <?php
                    echo "<input type='hidden' name='idTappa' value='" . $_SESSION['idTappa'] . "'>"
                    ?>
                    <button type="submit" class="btn btn-primary" style=" background-color:#B30000; border-color:#B30000;">Modifica</button>
                </div>
            </div>
        </form>
        
        <form action="modificaT/modificaLatT.php" method="POST">
            <div class="row" style="margin:10px;">
                <div class="col">
                    <input type="text" class="form-control" id="contenuto" name="contenuto" placeholder="Latitudine">
                </div>
                <div class="col">
                    <?php
                    echo "<input type='hidden' name='idTappa' value='" . $_SESSION['idTappa'] . "'>"
                    ?>
                    <button type="submit" class="btn btn-primary" style=" background-color:#B30000; border-color:#B30000;">Modifica</button>
                </div>
            </div>
        </form>


        


    <!-- stampa tanti br -->
    <?php
    for ($i = 0; $i < 15; $i++) {
        echo "<br>";
    }
    ?>
    <div class="footer-clean" style="background-color:white; border-top-color:#F0F0F0;  border-top-style: solid; border-top-width: 3px; margin-top: 40px; position:fixed; bottom:0px; width:100%;">
        <footer>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-4 ">
                    </div>
                    <div class="col-4"></div>
                    <center>
                        <p style="text-decoration: none; color:black">Partita Iva: 02070920992</p>
                        <p>GenovaRoute ©</p>
                    </center>
                </div>
            </div>
    </div>
    </footer>
    </div>

</body>

</html>