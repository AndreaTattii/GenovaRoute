<?php session_start();

function isMobile()
{
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
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
    <link rel="icon" href="../img/g.png" type="image/icon type">

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
                        <a class="nav-link" href="percorsi/index.php" style="color: white">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: white">Percorsi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profilo/index.php" style="color: white">Tappe</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CORPO -->

    <div class="container">
        <div class="row">
            <h1>Home</h1>
        </div>
        <div class="row" style="padding:15px; margin:15px;">
            <div class="col">

            </div>
            <div class="col">
                <div class="row  align-self-center" style="margin:20px;">
                    <form action="gestioneP.php" method="POST">
                        <button type="submit" class="btn btn-primary" style="background-color:#B30000; width:100%; border-color:#B30000">Gestisci i percorsi</button>
                    </form>
                </div>
                <div class="row align-self-center" style="margin:20px">
                    <form action="gestioneT.php" method="POST">
                        <button type="submit" class="btn btn-primary" style="background-color:#B30000; width:100%; border-color:#B30000">Gestisci le tappe</button>
                    </form>
                </div>
            </div>
            <div class="col">

            </div>
        </div>
        <div class="row">
            <h2 style="color:#B30000;" >Percorsi</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>Nome</h3>
                </div>
                <div class="col">
                    <h3>Descrizione</h3>   
                </div>
            </div>
        </div>
    </div>





    <div class="footer-clean" style="border-top-color:#F0F0F0;  border-top-style: solid; border-top-width: 3px; margin-top: 40px; position:fixed; bottom:0px; width:100%;">
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