<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Personale-->
    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,400;1,700&display=swap" rel="stylesheet">

    <title>Login</title>
</head>

<body class="d-flex flex-column min-vh-100" style="background-image: url('img/foto_epoca_genova.png'); background-repeat: no-repeat; background-size: cover;">

    <nav class="navbar  navbar-expand-lg " style="background-color: #B30000;">
        <div class="container p-2">
            <a class="navbar-brand" style="font-family: 'Amiri', serif; color: white; font-weight: bold;" href="./">
                <h1>Genova Route</h1>
            </a>
        </div>
    </nav>
    <div class="container pt-5  p-1">
        <div class="row justify-content-md-center " style="font-family: 'Helvetica', 'Arial', sans-serif; padding: 20px;">
            <div class="col-sm-6" style=" background-color: white; border-style:solid; border-color:black; border-width:2px; border-radius: 80px;">
                <div class="row justify-content-md-center">
                    <h1 style="font-weight: bold; font-size: 30px; color: black; text-align: center;">Login</h1>
                </div>
                <!-- form -->
                <div id="login" style="margin:5px; padding:20px; ">

                    <form class="row g-3" action="loginUtente.php" method="post">

                        <div class="col-12">

                            <label for="inputAddress" class="form-label">Mail</label>
                            <input type="email" class="form-control" id="mail" name="mail" required>

                        </div>

                        <div class="col-12">

                            <label for="inputAddress2" class="form-label">Password </label>
                            <input type="password" class="form-control" id="password" name="password" required>

                        </div>

                        <div class="col-12">
                            <div class="form-check">

                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Ricordami
                                </label>

                            </div>
                        </div>

                        <br><br>
                        <?php

                        if (isset($_SESSION['errore'])) { ?>
                            <div class="col-12">
                                <p style="color: red;">Dati inseriti errati</p>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="col-12">
                            <br>
                            <button type="submit" class="btn btn-primary" style="background-color: #B30000; border-color: black;">Accedi</button>
                            <br><br>
                        </div>
                    </form>
                    <p>Non hai un account? <a href="registra/formRegistra.html" style="color: #B30000; ">Registrati</a> </p>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
<?php session_destroy(); ?>