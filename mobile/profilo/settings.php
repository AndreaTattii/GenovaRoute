<?php session_start();

$host = "127.0.0.1";
$user = "root";
$pass = "";
$database = "genovaroute";

$connessione = new mysqli($host, $user, $pass, $database);


if ($connessione === false) {
    die("Errore: " . $connessione->connect_error);
}

$sql = "SELECT nome, cognome, username FROM utente WHERE email = '" . $_SESSION['email'] . "'";

if ($result = $connessione->query($sql)) {
    $row = $result->fetch_array();
    $nome = $row['nome'];
    $cognome = $row['cognome'];
    $username = $row['username'];
    $_SESSION['username'] = $username;
} else {
    echo "Impossibile eseguire la query";
}


?>
<!doctype html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>

    <!-- Required meta tags -->
    <meta charset="ansi">
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
    <link rel="icon" href="img/g.png" type="image/icon type">


    <style>
        input[type="file"] {
            display: none;
        }

        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }

        
    </style>
</head>

<body class="d-flex flex-column min-vh-100">


    <!-- NAVBAR BASSA -->
    <div class="container fixed-bottom" style="background-color: white; border-top-color:black;  border-top-style: solid; border-top-left-radius: 25px;border-top-right-radius: 25px; border-top-width: 1px; height: 50px;">
        <div class="row  justify-content-center">
            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="../percorsi/index.php">
                        <img id="percorsoSfondo" src="../../img/icons/percorso.png">
                    </a>
                </center>

            </div>
            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="../ricerca/index.php">
                        <img id="ricercaNavImg" src="../../img/icons/searchBlack.png">
                    </a>
                </center>

            </div>

            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="../scanner/index.php ">
                        <img style="width:25px" src="../../img/icons/scannerizza.png">
                    </a>
                </center>

            </div>
            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="../percorsiPersonali/index.php">
                        <img style="width:25px" src="../../img/icons/aggiungiPercorso.png">
                    </a>
                </center>

            </div>
            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="./">
                        <img id="account" src="../../img/icons/accountRosso.png">
                    </a>
                </center>
            </div>
        </div>
    </div>


    <div class="container">
        <!-- NAVBAR ALTA -->
        <div class="row justify-content-center align-items-center" style="background-color: #B30000;  padding-top: 10px; height:60px">
            <div class="col-2">
                <a href="index.php">
                    <img id="back" style="padding-bottom:8px" src="../../img/icons/back.png">
                </a>
            </div>
            <div class="col-8 ">
                <h1 style=" color: white; font-weight: bold; text-align: center;">Impostazioni</h1>
            </div>
            <div class="col-2 ">

            </div>
        </div>

        <!-- CONTENUTO PAGINA -->
        <br>
        <br>
        <div class="container">

            <br>
            <div class="row" style="padding: 0px; margin:0px">
                <div class="col" style="margin:auto; text-align:center; padding: 0px; margin:0px">
                    <form id="propicForm"  method="post" enctype="multipart/form-data" action="salvaImg.php">
                        <label class="custom-file-upload" style="width:150px;height:150px; border-radius: 50%;background-size: cover; background-image: url('../../img/propics/<?php echo $_SESSION['email']; ?>.png<?php echo "?t=" . time() ?>');">
                            <input id="propicInput" type="file" name="propic" />

                        </label>
                    </form>
                </div>
            </div>
            

            
            <form id="dataForm" action="cambiaDatiUser.php" method="POST">
                <div class="row" style="margin-top: 30px;">
                    <div class="col-3 " style="padding-top: 5px;">
                        <b>
                            <p>Username</p>
                        </b>
                    </div>
                    <div class="col-9" style="text-align: center; ">
                            <input style="outline: none;" type="text" class="form-control " name="username" value="<?php echo $username; ?>" required>
                    </div>

                </div>


                <div class="row">
                    <div class="col-3 " style="padding-top: 5px;">
                        <b>
                            <p>Nome</p>
                        </b>
                    </div>
                    <div class="col-9" style="text-align: center">
                            <input style="outline: none;" type="text" class="form-control " name="nome" value="<?php echo $nome; ?>" maxlenght="8" required>
                    </div>
                </div>


                <div class="row">
                    <div class="col-3 " style="padding-top: 5px;">
                        <b>
                            <p>Cognome</p>
                        </b>
                    </div>
                    <div class="col-9" style="text-align: center">
                            <input style="outline:none;" type="text" class="form-control " name="cognome" value="<?php echo $cognome; ?>" maxlenght="8" required>
                    </div>

                </div>
            </form>
            


            <br>
            <div class="row">
                <div class="col-4" style="text-align:center;">
                    <form action="cambiaPsw/index.php" method="POST">
                        <button type="submit" class="btn btn-primary" style="background-color: white; border-color:#B30000; font-size: 15px; color:#B30000; width: 90%; ">Password</button>
                    </form>
                </div>

                <div class="col-4" style="text-align:center;">
                        <button onclick="submitData()"  class="btn " style="background-color: #b30000; border-color:#B30000; font-size: 15px; color:white; width: 90%;">Fine</button>
                </div>

                <div class="col-4" style="text-align:center;">
                    <form action="logout/logout.php" method="POST">
                        <button type="submit" class="btn btn-primary" style="background-color: white; border-color:#B30000; font-size: 15px; color:#B30000; width: 90%; ">Log out</button>
                    </form>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>

    </div>
    <div class="loader-wrapper">
        <div id="container">
            <svg viewBox="0 0 100 100">
                <defs>
                    <filter id="shadow">
                        <feDropShadow dx="0" dy="0" stdDeviation="1.5" flood-color="#fc6767" />
                    </filter>
                </defs>
                <circle id="spinner" style="fill:transparent;stroke:#dd2476;stroke-width: 7px;stroke-linecap: round;filter:url(#shadow);" cx="50" cy="50" r="45" />
            </svg>
        </div>
    </div>
    <script>
        $(window).on('load', function() {
            $(".loader-wrapper").fadeOut("slow");
        });
    </script>
    <script>
        window.addEventListener("orientationchange", function() {
            if (window.orientation == 90 || window.orientation == -90) {
                alert("Gira lo schermo in verticale!!!")
                //window.orientation = 0;
                //document.getElementById("orientation").style.display = "none";
                //window.location.reload();
            }
        });

        $('#propicInput').change(function() {
            startUpload();
        });

        function startUpload(){
            document.getElementById("propicForm").submit();
        }

        function submitData(){
            document.getElementById("dataForm").submit();
        }
    </script>
</body>

</html>