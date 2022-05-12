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
    <link rel="icon" href="../img/g.png" type="image/icon type">

</head>

<body class="d-flex flex-column min-vh-100">

    <!-- NAVBAR -->
    <nav class="navbar  navbar-expand-lg" style="background-color: #B30000;">
        <div class="container p-2">
            <a class="navbar-brand" style="font-family: 'Amiri', serif; color: white; font-weight: bold;" href="index.php">
                <h1>Genova Route</h1>
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php" style="color: white">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gestioneP.php" style="color: white">Percorsi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gestioneT.php" style="color: white">Tappe</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CORPO -->
    <br>
    <br>
    <br>
    <br>
    <!-- Fai un form per l'inserimento di records nella tabella tappa nel db-->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Gestione Tappe</h1>
            </div>
        </div>
        <form action="inserimentoT.php" method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Inserisci il nome della tappa">
            </div>
            <div class="form-group">
                <label for="descrizione">Descrizione</label>
                <input type="text" class="form-control" id="descrizione" name="descrizione" placeholder="Inserisci la descrizione della tappa">
            </div>
            <div class="form-group">
                <label for="immagine">Immagine 1</label>
                <input type="text" class="form-control" id="immagine1" name="immagine1" placeholder="Inserisci l'url dell' immagine">
            </div>
            <div class="form-group">
                <label for="immagine">Immagine 2</label>
                <input type="text" class="form-control" id="immagine2" name="immagine2" placeholder="Inserisci l'url dell' immagine">
            </div>
            <div class="form-group">
                <label for="immagine">Immagine 3</label>
                <input type="text" class="form-control" id="immagine3" name="immagine3" placeholder="Inserisci l'url dell' immagine">
            </div>
            <div class="form-group">
                <label for="percorso">Via</label>
                <input type="text" class="form-control" id="via" name="via" placeholder="Inserisci l'indirizzo della tappa">
            </div>
            <div class="form-group">
                <label for="percorso">Longitudine</label>
                <input type="text" class="form-control" id="longitudine" name="longitudine" placeholder="Inserisci la longitudine della tappa">
            </div>
            <div class="form-group">
                <label for="percorso">Latitudine</label>
                <input type="text" class="form-control" id="latitudine" name="latitudine" placeholder="Inserisci la latitudine della tappa">
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 15px; background-color:#B30000; border-color:#B30000;">Inserisci</button>
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
                        <p>GenovaRoute ©</p>
                    </center>
                </div>
            </div>
    </div>
    </footer>
    </div>

</body>

</html>