<?php
session_start();

//header('Content-Type: text/html; charset=ISO-8859-1');
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
                <a class="navbar-brand" style="font-family: 'Amiri', serif; color: white; font-weight: bold; text-align: center; " href="./">
                    <h1>Genova Route Administration</h1>
                </a>
            </div>

        </div>
    </nav>

    <!-- CORPO -->



    <div class="container">

        <br>
        <br>
        <br>


        <!-- PERCORSI -->
        <div class="row" style="margin-top:20px; padding: 10px; border-top-color:#F0F0F0;  border-top-style: solid; border-top-width: 3px; border-bottom-color:#F0F0F0;  border-bottom-style: solid; border-bottom-width: 3px; ">
            <h2 style="color:#B30000; text-align:center;">Percorsi</h2>
        </div>
        <br>
        <div class="container" style="border-color : black;  border-style: solid; border-width: 1px;">
            <div class="row" style="border-bottom-color : black;  border-bottom-style: solid; border-bottom-width: 1px;">
                <div class="col-1">
                    <h3>ID</h3>
                </div>
                <div class="col-2">
                    <h3>Nome</h3>
                </div>
                <div class="col-5">
                    <h3>Descrizione</h3>
                </div>
            </div>
            <?php

            $host = "127.0.0.1";
            $user = "root";
            $pass = "";
            $database = "GenovaRoute";
            $connessione = new mysqli($host, $user, $pass, $database);

            $i = 0;
            error_reporting(0);

            if ($connessione === false) {
                echo "Errore: " . $connessione->error;
            }

            //stampa tutti i percorsi
            $sql = "SELECT * FROM percorso";
            $result = $connessione->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if ($i % 2 == 0) {
                        $sfondo = "background-color:#F0F0F0;";
                    } else {
                        $sfondo = "background-color:white;";
                    }
                    echo "<div class='row' style='" . $sfondo . "; padding:10px' >";
                    echo "<div class='col-1'>";
                    echo $row["id"];
                    echo "</div>";

                    echo "<div class='col-2'>";
                    echo $row["nome"];
                    echo "</div>";

                    echo "<div class='col-5'>";
                    echo $row["descrizione"];
                    echo "</div>";

                    echo "<div class='col-2'>";
                    echo "
                                    <form action='percorso.php' method='POST'>
                                        <input type='hidden' name='idPercorso' value='" . $row["id"] . "'>
                                        <button type='submit' style='color:white; background-color:#B30000; width:100%; border-color:#B30000; border-radius:50px'>Gestisci</button>
                                    </form>
                                ";
                    echo "</div>";

                    echo "<div class='col-2'>";
                    echo "
                                    <center>
                                        <form action='eliminaPercorso.php' method='POST'>
                                            <input type='hidden' name='idPercorso' value='" . $row["id"] . "'>
                                            <button type='submit' style='color:white; background-color:#B30000; width:50px; border-color:#B30000; border-radius:50px'> - </button>
                                        </form>
                                    </center>
                                ";
                    echo "</div>";
                    echo "</div>";
                    $i++;
                }
            } else {
                echo "Nessun percorso presente";
            }
            $connessione->close();

            if ($i % 2 == 0) {
                $sfondo = "background-color:#F0F0F0;";
            } else {
                $sfondo = "background-color:white;";
            }

            ?>

            <div class='row' style="<?php echo $sfondo ?>; padding:10px; border-style:solid; border-width:1px; ">
                <form action="modificaP/modificaNomeP.php" action="POST">
                    <div class="row">
                        <div class="col-3">
                            <input type="text" name="idPercorso" placeholder="Inserisci l'id" required>
                        </div>
                        <div class="col-7">
                            <input type="text" name="nuovoNome" placeholder="Inserisci nome" style="width: 90%;" maxlength="20" required>
                        </div>
                        <div class="col-1">
                            <button type="submit" style="color:white; background-color:#B30000; ; border-color:#B30000; width:150px;">Modifica</button>
                        </div>
                    </div>

                </form>
            </div>

            

            <div class='row' style="<?php echo $sfondo ?>; padding:10px; border-style:solid; border-width:1px; ">
                <form action="modificaP/modificaDescrizioneP.php" action="POST">
                    <div class="row">
                        <div class="col-3">
                            <input type="text" name="idPercorso" placeholder="Inserisci l'id" required>
                        </div>
                        <div class="col-7">
                            <input type="text" name="nuovaDescrizione" placeholder="Inserisci descrizione" style="width: 90%;" maxlength="80"  required>
                            

                        </div>
                        <div class="col-1">
                            <button type="submit" style="color:white; background-color:#B30000; ; border-color:#B30000; width:150px;">Modifica</button>
                        </div>
                    </div>
                </form>
            </div>


            <div class='row' style="<?php echo $sfondo ?>; padding:10px; border-style:solid; border-width:1px; ">
                <form action="inserimentoP.php" action="POST">
                    <div class="row">
                        <div class="col-3">
                            <input type="text" name="nomeP" placeholder="Inserisci il nome" maxlength="20" required>
                        </div>
                        <div class="col-4">
                            <input type="text" name="descrizioneP" placeholder="Inserisci la descrizione" style="width: 90%;" maxlength="80" required>
                        </div>
                        <div class="col-3">
                            <input type="text" name="idTappa" placeholder="Inserisci id tappa" required>
                        </div>
                        <div class="col-1">
                            <button type="submit" style="color:white; background-color:#B30000; ; border-color:#B30000; width:150px;">Crea</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>



        <br>
        <br>
        <br>
        <!-- TAPPE -->
        <div class="row" style="margin-top:40px; padding: 10px; border-top-color:#F0F0F0;  border-top-style: solid; border-top-width: 3px; border-bottom-color:#F0F0F0;  border-bottom-style: solid; border-bottom-width: 3px; ">
            <h2 style="color:#B30000; text-align:center;">Tappe</h2>
        </div>
        <br>
        <div class="row" style="padding:15px; margin:15px;">
            <div class="col">

            </div>
            <div class="col">

                <div class="row" style="margin-top:20px">
                    <form action="formT.php" method="POST">
                        <button type="submit" class="btn btn-primary" style="background-color:#B30000; width:100%; border-color:#B30000">Crea nuove tappe</button>
                    </form>
                </div>
            </div>
            <div class="col">

            </div>
        </div>
        <div class="container" style="border-color : black;  border-style: solid; border-width: 1px;">
            <div class="row" style="border-bottom-color : black;  border-bottom-style: solid; border-bottom-width: 1px;">
                <div class="col-1">
                    <h3>ID</h3>
                </div>
                <div class="col-2">
                    <h3>Nome</h3>
                </div>
                <div class="col-4">
                    <h3>Descrizione</h3>
                </div>
                <div class="col-1">
                    <h3>Via</h3>
                </div>
            </div>
            <?php

            $host = "127.0.0.1";
            $user = "root";
            $pass = "";
            $database = "GenovaRoute";
            $connessione = new mysqli($host, $user, $pass, $database);

            error_reporting(0);

            if ($connessione === false) {
                echo "Errore: " . $connessione->error;
            }

            //stampa tutte le tappe
            $sql = "SELECT * FROM tappa";
            $result = $connessione->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if ($i % 2 == 0) {
                        $sfondo = "background-color:#F0F0F0;";
                    } else {
                        $sfondo = "background-color:white;";
                    }
                    echo "<div class='row' style='" . $sfondo . " padding: 10px;'>";
                    echo "<div class='col-1'>";
                    echo $row["id"];
                    echo "</div>";
                    echo "<div class='col-2'>";
                    echo $row["nome"];
                    echo "</div>";
                    echo "<div class='col-4'>";
                    echo $row["descrizione"];
                    echo "</div>";
                    echo "<div class='col-1'>";
                    echo $row["via"];
                    echo "</div>";


                    echo "<div class='col-2'>";
                    echo "
                                    <center>
                                        <form action='formModificaT.php' method='POST'>
                                            <input type='hidden' name='idTappa' value='" . $row["id"] . "'>
                                            <button type='submit' style='color:white; background-color:#B30000; width:50%; border-color:#B30000; border-radius:50px'>Modifica </button>
                                        </form>
                                    </center>
                                ";
                    echo "</div>";
                    echo "<div class='col-2'>";
                    echo "
                                    <center>
                                        <form action='eliminaTappa.php' method='POST'>
                                            <input type='hidden' name='idTappa' value='" . $row["id"] . "'>
                                            <button type='submit' style='color:white; background-color:#B30000; width:50px; border-color:#B30000; border-radius:50px'> - </button>
                                        </form>
                                    </center>
                                ";
                    echo "</div>";
                    echo "</div>";
                    $i++;
                }
            } else {
                echo "Nessuna tappa presente";
            }
            $connessione->close();



            ?>

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