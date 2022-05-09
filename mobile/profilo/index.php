<?php session_start();

$host = "127.0.0.1";
$user = "root";
$pass = "";
$database = "genovaroute";

$connessione = new mysqli($host, $user, $pass, $database);


if ($connessione === false) {
    die("Errore: " . $connessione->connect_error);
}

$sql = "SELECT nome, cognome FROM utente WHERE email = '" . $_SESSION['email'] . "'";

if ($result = $connessione->query($sql)) {
    $row = $result->fetch_array();
    $nome = $row['nome'];
    $cognome = $row['cognome'];
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
    <link rel="icon" href="img/g.png" type="image/icon type">
</head>

<body class="d-flex flex-column min-vh-100">


    <!-- NAVBAR BASSA -->
    <div class="container fixed-bottom" style="background-color: white; border-top-color:black;  border-top-style: solid; border-top-width: 4px; height: 70px;">
        <div class="row  justify-content-center" style="padding-top: 15px;">
            <div class="col s-4" style="padding-top: 15px; ">
                <center>
                    <a class="navbar-brand" href="../percorsi/index.php">
                        <img src="../../img/icons/percorso.png">
                    </a>
                </center>

            </div>
            <div class="col s-4" style="padding-top: 15px; ">
                <center>
                    <a class="navbar-brand" href="../scanner/index.php">
                        <img src="../../img/icons/scannerizza.png">
                    </a>
                </center>

            </div>
            <div class="col s-4">
                <center>
                    <a class="navbar-brand" href="./">
                        <img src="../../img/icons/accountSfondo.png">
                    </a>
                </center>

            </div>
        </div>


    </div>


    <div class="container">
        <!-- NAVBAR ALTA -->
        <div class="row justify-content-center align-items-center" style="background-color: #B30000; border-bottom-color:black;  border-bottom-style: solid; border-bottom-width: 2px; padding-top: 10px;">
            
            <div class="col ">
                <h1 style="font-family: 'Amiri', serif; color: white; font-weight: bold; text-align: center;">Profilo</h1>
            </div>
        </div>
        <!-- INTESTAZIONE  -->
        <div class="row justify-content-center" style="padding-top: 20px">
            <div class="col s-2" id="immagineProfilo">
                <img src="../../img/FotoProfilo.png">
            </div>

            <div class="col" id="nomeUtente" style="padding-top: 10px; padding-right:80px">

                <?php echo  ' <h1 style="font-weight: bold; font-size: 30px; color: black; text-align: center;">' . $nome . ' ' . $cognome . '</h1> ';  ?>


            </div>
        </div>

        <!-- CONTENUTO PAGINA -->
        <div class="row justify-content-end " style="border-bottom-color:#E4E4E4;  border-bottom-style: solid; border-bottom-width: 2px; ">
            <div class="col -3">
                
            </div>
            <div class="col -3" style="padding-bottom: 10px;">
                <form action="logout/logout.php" method="POST">
                    <button type="submit" class="btn btn-primary" style="background-color: white; border-color:#B30000; font-size: 15px; color:#B30000 ; text-align: center; ">Log out</button>
                </form>
            </div>
            <div class="col -6" style="padding-bottom: 10px;">
                <form action="cambiaPsw/index.php" method="POST" >
                    <button type="submit" class="btn btn-primary" style="background-color: white; border-color:#B30000; font-size: 15px; color:#B30000 ; text-align: center; ">Password</button>
                </form>
            </div>
        </div>


        <br>
        
    </div>
    <script>
        window.addEventListener("orientationchange", function() {
            if (window.orientation == 90 || window.orientation == -90) {
                alert("Gira lo schermo in verticale!!!")
                //window.orientation = 0;
                //document.getElementById("orientation").style.display = "none";
                //window.location.reload();
            }
        });
    </script>
</body>

</html>