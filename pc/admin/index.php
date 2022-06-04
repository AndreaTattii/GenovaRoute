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
    <style>
        button:hover{
            background-color: white;
            color: #B30000;
        }

        
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- NAVBAR -->

    <div class="container" style="background-color: #B30000; position:fixed; top:0px; left:0px; right:0px; width:100%; height: 120px; ">
        <div class="row">
            <div class="col-12" style="height:50px">
                <a class="navbar-brand" style="font-family: 'Amiri', serif; color: white; font-weight: bold; text-align: center; " href="./">
                    <h1>GrovaGO Administration</h1>
                </a>
            </div>
        </div>

        <div class="row justify-content-center" style="margin-top: 0px; padding-top: 0px;">
            <div class="col-4"  style="text-align:center; padding-bottom:10px;  ">
                    <button class="buttonNav" onclick="toPercorsi()" style="background-color:#B30000; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; ">Percorsi</button>
            </div>
            <div class="col-4" style="text-align:center; padding-bottom:10px">
                <button class="buttonNav" onclick="toTappe()" style="background-color:#B30000; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;">Tappe</button>
            </div>
            <div class="col-4" style="text-align:center; padding-bottom:10px">
                <button class="buttonNav" onclick="toCitta()" style="background-color:#B30000; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;">Città</button>
            </div>
        </div>

    </div>

    <!-- CORPO -->

    <!-- crea un bottone che porta in questa pagina nel punto dove inizia la tabella delle tappee -->

    <div class="container">

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>


        <!-- PERCORSI -->
        <div class="row" id="percorsi" style="margin-top:20px; padding: 10px; border-top-color:#F0F0F0;  border-top-style: solid; border-top-width: 3px; border-bottom-color:#F0F0F0;  border-bottom-style: solid; border-bottom-width: 3px;">
            <h2 style="color:#B30000; text-align:center;">Percorsi</h2>
        </div>
        <br>
        <div class="container" id="divPercorsi" style="border-color : black;  border-style: solid; border-width: 1px;">
            <div class="row" style="border-bottom-color : black;  border-bottom-style: solid; border-bottom-width: 1px;">
                <div class="col-1">
                    <h3>ID</h3>
                </div>
                <div class="col-2">
                    <h3>Nome</h3>
                </div>
                <div class="col-8">
                    <h3>Descrizione</h3>
                </div>

                <div class="col-1">
                    <form action="formP.php" method="POST">
                        <button type="submit" class="btn btn-primary" style="background-color:white; width:100%; border-color:white">➕</button>
                    </form>
                </div>
            </div>
            <?php

            $host = "127.0.0.1";
            $user = "grovago";
            $pass = "";
            $database="my_grovago";
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
                                        <button     onmouseover='this.style.background-color='#B30000'' type='submit' style='color:white; background-color:white; border-color:black; ;width:50px; border-radius:50px; shadow:none'> ⚙ </button>
                                    </form>
                                ";
                    echo "</div>";

                    echo "<div class='col-2'>";
                    echo "
                                    <center>
                                        <form action='eliminaPercorso.php' method='POST'>
                                            <input type='hidden' name='idPercorso' value='" . $row["id"] . "'>
                                            <button type='submit' onmouseover='background-color:#B30000' style='color:white; background-color: white; width:50px; border-color:black; border-radius:50px'> 🗑 </button>
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

            <div class="row" style="<?php echo $sfondo ?>; padding:10px; border-style:solid; border-width:1px; ">
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



            <div class="row" style="<?php echo $sfondo ?>; padding:10px; border-style:solid; border-width:1px; ">
                <form action="modificaP/modificaDescrizioneP.php" action="POST">
                    <div class="row">
                        <div class="col-3">
                            <input type="text" name="idPercorso" placeholder="Inserisci l'id" required>
                        </div>
                        <div class="col-7">
                            <input type="text" name="nuovaDescrizione" placeholder="Inserisci descrizione" style="width: 90%;" maxlength="80" required>


                        </div>
                        <div class="col-1">
                            <button type="submit" style="color:white; background-color:#B30000; ; border-color:#B30000; width:150px;">Modifica</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row" style="<?php echo $sfondo ?>; padding:10px; border-style:solid; border-width:1px; ">
                <form action="modificaP/modificaImgP.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-3"> 
                            <input type="text" name="idPercorso" placeholder="Inserisci l'id" required>
                        </div>
                        <div class="col-7">
                            <input type="file" accept=".png,.jpg,.jpeg" name="img" required>
                        </div>
                        <div class="col-1">
                            <button type="submit" style="color:white; background-color:#B30000; ; border-color:#B30000; width:150px;">Modifica</button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>



        <br>
        <br>
        <br>
        <!-- TAPPE -->
        <div class="row" id="tappe" style="margin-top:40px; padding: 10px; border-top-color:#F0F0F0;  border-top-style: solid; border-top-width: 3px; border-bottom-color:#F0F0F0;  border-bottom-style: solid; border-bottom-width: 3px; ">
            <h2 style="color:#B30000; text-align:center;">Tappe</h2>
        </div>
        <br>

        <div class="container" id="divTappe" style="border-color : black;  border-style: solid; border-width: 1px;">
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
                <div class="col-4">
                    <h3>Via</h3>
                </div>
                <div class="col-1">
                    <form action="formT.php" method="POST">
                        <button type="submit" class="btn btn-primary" style="background-color:white; width:100%; border-color:white">➕</button>
                    </form>
                </div>
            </div>
            <?php

            $host = "127.0.0.1";
            $user = "grovago";
            $pass = "";
            $database="my_grovago";
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
                                            <button type='submit' style='color:white; background-color:white; width:50px; border-color:black; border-radius:50px'> ⚙ </button>
                                        </form>
                                    </center>
                                ";
                    echo "</div>";
                    echo "<div class='col-2'>";
                    echo "
                                    <center>
                                        <form action='eliminaTappa.php' method='POST'>
                                            <input type='hidden' name='idTappa' value='" . $row["id"] . "'>
                                            <button type='submit' style='color:white; background-color:white; width:50px; border-color:black; border-radius:50px'> 🗑 </button>
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

        <br>
        <br>
        <br>
        <!-- CITTA' -->
        <div class="row" id="citta" id="divCitta" style="margin-top:40px; padding: 10px; border-top-color:#F0F0F0;  border-top-style: solid; border-top-width: 3px; border-bottom-color:#F0F0F0;  border-bottom-style: solid; border-bottom-width: 3px; ">
            <h2 style="color:#B30000; text-align:center;">Città</h2>
        </div>
        <br>
        <div class="container" style="border-color : black;  border-style: solid; border-width: 1px;">
            <div class="row" style="border-bottom-color : black;  border-bottom-style: solid; border-bottom-width: 1px;">
                <div class="col-3">
                    <h3>Nome</h3>
                </div>
                <div class="col-3">
                    <h3>Longitudine</h3>
                </div>
                <div class="col-5">
                    <h3>Latitudine</h3>
                </div>
                <div class="col-1">
                    <form action="formC.php" method="POST">
                        <button type="submit" class="btn btn-primary" style="background-color:white; width:100%; border-color:white; ">➕</button>
                    </form>
                </div>
            </div>
            <?php

            $host = "127.0.0.1";
            $user = "grovago";
            $pass = "";
            $database="my_grovago";
            $connessione = new mysqli($host, $user, $pass, $database);

            error_reporting(0);

            if ($connessione === false) {
                echo "Errore: " . $connessione->error;
            }

            $sql = "SELECT * FROM citta";
            $result = $connessione->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if ($i % 2 == 0) {
                        $sfondo = "background-color:#F0F0F0;";
                    } else {
                        $sfondo = "background-color:white;";
                    }
                    echo "<div class='row' style='" . $sfondo . " padding: 10px;'>";
                    echo "<div class='col-3'>";
                    echo $row["nome"];
                    echo "</div>";
                    echo "<div class='col-3'>";
                    echo $row["x"];
                    echo "</div>";
                    echo "<div class='col-2'>";
                    echo $row["y"];
                    echo "</div>";


                    echo "<div class='col-2'>";
                    echo "
                                        <center>
                                            <form action='formModificaC.php' method='POST'>
                                                <input type='hidden' name='nomeCitta' value='" . $row["nome"] . "'>
                                                <button type='submit' style='color:white; background-color:white; width:50px; border-color:black; border-radius:50px'> ⚙ </button>
                                            </form>
                                        </center>
                                    ";
                    echo "</div>";
                    echo "<div class='col-2'>";
                    echo "
                                        <center>
                                            <form action='eliminaCitta.php' method='POST'>
                                                <input type='hidden' name='nomeCitta' value='" . $row["nome"] . "'>
                                                <button type='submit' style='color:white; background-color:white; width:50px; border-color:black; border-radius:50px'> 🗑 </button>
                                            </form>
                                        </center>
                                    ";
                    echo "</div>";
                    echo "</div>";
                    $i++;
                }
            } else {
                echo "Nessuna citta presente";
            }

            $connessione->close();
            ?>



        </div>
    </div>
    </div>


    <!-- stampa tanti br -->
    <?php
    for ($i = 0; $i < 15; $i++) {
        echo "<br>";
    }
    ?>
    <div class="footer-clean" style="background-color:white; border-top-color:#F0F0F0;  border-top-style: solid; border-top-width: 3px; margin-top: 40px;  width:100%;">
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
        </footer>
    </div>

    <script>
        function toPercorsi() {
            const element = document.getElementById("percorsi");
            element.scrollIntoView();
        }

        function toTappe() {
            const element = document.getElementById("tappe");
            element.scrollIntoView();
        }

        function toCitta() {
            const element = document.getElementById("citta");
            element.scrollIntoView();
        }
    </script>

</body>

</html>