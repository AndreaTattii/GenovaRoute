<?php session_start(); ?>
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

    <title>GrovaGO</title>
    <link rel="icon" href="../../img/g.png" type="image/icon type">

</head>

<body class="d-flex flex-column min-vh-100">

    <nav class="navbar  navbar-expand-lg" style="background-color: #B30000;">
        <div class="container p-2">
            <a class="navbar-brand" style="font-family: 'Amiri', serif; color: white; font-weight: bold;" href="../index.php">
                <h1>GrovaGO</h1>
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../percorsi/index.php" style="color: white">Percorsi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: white">Preferiti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../profilo/index.php" style="color: white">Account</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h1 style="font-weight:bold; padding-top:15px; padding-left:150px">Scegli un percorso tra i tuoi preferiti</h1>


    <div class="container" style="padding-top:30px; margin-bottom: 100px;">
        <?php
        $host = "localhost";
        $user = "grovago";
        $pass = "";
        $database="my_grovago";

        $connessione = new mysqli($host, $user, $pass, $database);

        //error_reporting(0);

        if ($connessione === false) {
            die("Errore: " . $connessione->connect_error);
        }
        $sql = "SELECT * FROM percorso, utente_preferisce_percorso ORDER BY (SELECT COUNT(*) AS numero_tappe FROM percorso, tappa, tappa_appartiene_percorso, utente_preferisce_percorso WHERE tappa_appartiene_percorso.id_percorso=percorso.id AND id_tappa=tappa.id AND utente_preferisce_percorso.id_percorso=percorso.id AND utente_preferisce_percorso.email='" . $_SESSION['email'] . "')";
        if ($result = $connessione->query($sql)) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_array()) {

                    echo '
                    <div class="col-sm align-self-center" style="width:60%; padding-top:30px; ">       
                        <div class="card text-center align-self-center" style="width:100%;  background-color: #F0F0F0;">
                            <div class="card-body">
                                <form action="tappe/index.php" method="post">
                                    <p class="card-title">
                                        <input type="hidden" name="nomePercorso" value="' . $row['nome'] . '">
                                        <input type="hidden" name="idPercorso" value="' . $row['id'] . '">
                                        <input type="submit" value="' . $row['nome'] . '" style="background-color: #F0F0F0; text-decoration: none; color: #B30000; font-size:20px; border: none; font-weight: bold; float: left;"> 
                                        <button type="submit" class="btn btn-primary" style="background-color: #B30000; font-weight:bold; border-color:#B30000; font-size: 15px; color:white ; text-align: center; float: right;">Visualizza</button>
                                    </p>
                                </form>
                            </div>
                        </div>                                        
                    </div>
                    ';
                }
            } else {
                echo "<p style='text-align: center'>Non hai nessun percorso tra i preferiti</p>";
            }
        } else {
            echo "Impossibile eseguire la query";
        }
        ?>
    </div>





    <div class="footer-clean" style="border-top-color:#F0F0F0;  border-top-style: solid; border-top-width: 3px; margin-top: 40px; position:fixed; bottom:0px; width:100%; background-color:white;">
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



    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>