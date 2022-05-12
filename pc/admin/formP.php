<?php session_start();


//fai una funzione getPercorsi() che crea per ogni record della tabella percorso un array di percorsi e restituisce l'array di percorsi




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
        <div class="container p-2">
            <a class="navbar-brand" style="font-family: 'Amiri', serif; color: white; font-weight: bold;" href="./">
                <h1>Genova Route</h1>
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php" style="color: white">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formP.php" style="color: white">Percorsi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formT.php" style="color: white">Tappe</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <!-- CORPO -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Gestione Percorsi</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Inserisci un nuovo percorso</h5>
                        <form action="inserimentoP.php" method="POST">
                            <div class="form-group">
                                <label for="nomeP">Nome percorso</label>
                                <input type="text" class="form-control" id="nomeP" name="nomeP" placeholder="Inserisci il nome del percorso">
                            </div>
                            <div class="form-group">
                                <label for="descrizioneP">Descrizione percorso</label>
                                <textarea class="form-control" id="descrizioneP" name="descrizioneP" rows="3" placeholder="Inserisci la descrizione del percorso"></textarea>
                            </div>

                            
                            <button type="submit" class="btn btn-primary" style="background-color:#B30000; border-color:#B30000; margin-top:15px;">Inserisci</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <br>
    <br>
    <br>
    <!-- Fai un form per associare una tappa ad un percorso -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Associa una tappa ad un percorso</h5>
                        <form action="associa.php" method="POST">
                            <div class="form-group">
                                <label for="nomeP">Id percorso</label>
                                <input type="text" class="form-control" id="idP" name="idP" placeholder="Inserisci l'id del percorso">                             
                            </div>
                            <div class="form-group">
                                <label for="nomeT">Id tappa</label>
                                <input type="text" class="form-control" id="idT" name="idT" placeholder="Inserisci l'id della tappa">                   
                            </div>
                            <button type="submit" class="btn btn-primary" style="background-color:#B30000; border-color:#B30000; margin-top:15px;">Associa</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
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