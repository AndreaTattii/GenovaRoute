<?php session_start();

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
    
    <!-- Fai un form per l'inserimento di records nella tabella tappa nel db-->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Inserimento nuova città</h1>
            </div>
        </div>
        <form action="inserimentoC.php" method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Inserisci il nome della città" maxlength="30" required>
            </div>
            <div class="form-group">
                <label for="Longitudine">Longitudine</label>
                <input type="text" class="form-control"  name="longitudine" placeholder="Inserisci la longitudine" required>

            </div>
            <div class="form-group">
                <label for="Latitudine">Latitudine</label>
                <input type="text" class="form-control"  name="latitudine" placeholder="Inserisci la latitudine" required>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 15px; background-color:#B30000; border-color:#B30000;">Inserisci</button>
            <?php 
                if(isset($_SESSION['errore'])){
                    echo "<p style='color:red;'>".$_SESSION['errore']."</p>";
                    unset($_SESSION['errore']);
                } 
            ?>
        </form>
    </div>














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
                        <p>GrovaGO©</p>
                    </center>
                </div>
            </div>
    </div>
    </footer>
    </div>

</body>

</html>