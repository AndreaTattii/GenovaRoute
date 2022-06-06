<?php
session_start();

$host="localhost";
$user="grovago";
$pass = "";
$database="my_grovago";
$connessione = new mysqli($host, $user, $pass, $database);


$nomeCitta = $connessione->real_escape_string($_REQUEST['nomeCitta']);



if ($connessione === false) {
    echo "Errore: " . $connessione->error;
}






$sql = "SELECT x, y FROM citta WHERE nome = '".$nomeCitta."'";

if($result = $connessione->query($sql)){
    $row = $result->fetch_assoc();
    $latitudine = $row['x'];
    $longitudine = $row['y'];
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
                    <h1>GrovaGO Administration</h1>
                </a>
            </div>

        </div>
    </nav>

    <!-- CORPO -->
    <br>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center"> <?php echo $nomeCitta ?></h1>
            </div>
        </div>


        <form action="modificaC/modificaNomeC.php" method="POST">
            <div class="row" style="margin:10px;">
                <div class="col">
                    <input type="text" class="form-control" id="contenuto" name="contenuto" placeholder="Nome della citta" value="<?php echo $nomeCitta ?>" maxlength="20" required> </input>
                </div>
                <div class="col">
                    <?php
                        echo "<input type='hidden' name='nomeCitta' value='" .$nomeCitta . "'>"
                    ?>
                    <button type="submit" class="btn btn-primary" style=" background-color:#B30000; border-color:#B30000;">Modifica</button>
                </div>
            </div>
        </form>

        <form action="modificaC/modificaLatC.php" method="POST">
            <div class="row" style="margin:10px;">
                <div class="col">
                    <input type="text" class="form-control" id="contenuto" name="contenuto" placeholder="Longitudine" value="<?php echo $longitudine ?>" maxlength="100" required>
                </div>
                <div class="col">
                    <?php

                    echo "<input type='hidden' name='nomeCitta' value='" . $nomeCitta . "'>"
                    ?>
                    <button type="submit" class="btn btn-primary" style=" background-color:#B30000; border-color:#B30000;">Modifica</button>
                </div>
            </div>
        </form>

        <form action="modificaC/modificaLonC.php" method="POST">
            <div class="row" style="margin:10px;">
                <div class="col">
                    <input type="text" class="form-control" id="contenuto" name="contenuto" placeholder="Latitudine" value="<?php echo $latitudine ?>" required>
                </div>
                <div class="col">
                    <?php
                    echo "<input type='hidden' name='nomeCitta' value='" . $nomeCitta . "'>"
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
        
    </div>
</body>

</html>