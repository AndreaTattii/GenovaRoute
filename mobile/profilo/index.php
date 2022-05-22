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
</head>

<body class="d-flex flex-column min-vh-100">


    <!-- NAVBAR BASSA -->
    <div class="container fixed-bottom" style="background-color: white; border-top-color:black;  border-top-style: solid; border-top-width: 1px; height: 70px;">
        <div class="row  justify-content-center" style="padding-top: 15px;">
            <div class="col s-4" style="padding-top: 15px; ">
                <center>
                    <a class="navbar-brand" href="../percorsi/index.php">
                        <img id="percorso" src="../../img/icons/percorso.png">
                    </a>
                </center>

            </div>
            <div class="col s-4" style="padding-top: 15px; ">
                <center>
                    <a class="navbar-brand" href="../scanner/index.php">
                        <img id="scannerizza" src="../../img/icons/scannerizza.png">
                    </a>
                </center>

            </div>
            <div class="col s-4">
                <center>
                    <a class="navbar-brand" href="./">
                        <img id="accountSfondo" src="../../img/icons/accountSfondo.png">
                    </a>
                </center>

            </div>
        </div>


    </div>


    <div class="container">
        <!-- NAVBAR ALTA -->
        <div class="row justify-content-center align-items-center" style="background-color: #B30000;  padding-top: 10px; height:60px">
            <div class="col-2">
            </div>
            <div class="col-8 ">
                <h1 style="font-family: 'Amiri', serif; color: white; font-weight: bold; text-align: center;"><?php echo $username; ?></h1>
            </div>
            <div class="col-2 ">
                <a class="navbar-brand" href="settings.php">
                    <img id="setting" src="../../img/icons/setting.png">
                </a>
            </div>
        </div>



        <!-- INTESTAZIONE  -->
        <div class="row justify-content-center" style="padding-top: 20px; padding-bottom: 20px; ">
            <div class="col s-2" id="immagineProfilo">
                <img style="width:100px;height:100px; border-radius: 50%" src="../../img/propics/<?php echo $_SESSION['email']; ?>.png">
            </div>

            <div class="col" id="nomeUtente" style="padding-top: 25px; padding-right:80px">

                <?php echo  ' <h1 style="font-weight: bold; font-size: 20px; color: black; text-align: left;">' . $nome . ' ' . $cognome . '</h1> ';  ?>


            </div>
        </div>

        <!-- CONTENUTO PAGINA -->
        <div class="row" style="margin:none; padding:none; border: solid 2px #C4C4C4; ">
            <div class="col-4" style="border-right: solid 1px #C4C4C4; text-align:center; padding:0px; margin:auto;">
                <img class="cuore" src="../../img/icons/cuorePieno.png" style="width:30px">
            </div>
            <div class="col-4" style="text-align:center;  padding:0px; margin:auto; ">
                <img class="occhio" src="../../img/icons/occhioCancellato.png" style="width:35px;">
            </div>
            <div class="col-4" style="border-left: solid 1px #C4C4C4; text-align:center; padding:0px; margin:auto;">
                <img class="star" src="../../img/icons/emptyStarRed.png" style="width:30px">
            </div>
        </div>
        <br>
        
    <!-- QUI STAMPO IN BASE AL BOTTONE PREMUTO -->
    <div id="contenuto"></div>

    </div>
    <script>
        $(document).ready(function() {
            
            // opzionale, refresha all'infinito la pagina
            $.ajaxSetup ({
                cache: false
            });

            $(".cuore").click(function() {
                $.ajax({
                    type: "POST",
                    url: "mostraLike.php",
                    data: {
                        email: "<?php echo $_SESSION['email']; ?>"
                    },
                    success: function(data) {
                        $("#contenuto").html(data);
                        $(".cuore").attr("src", "../../img/icons/cuorePieno.png");
                        $(".occhio").attr("src", "../../img/icons/occhioCancellato.png");
                        $(".star").attr("src", "../../img/icons/emptyStarRed.png");

                    }
                });
            });

            $(".occhio").click(function() {
                $.ajax({
                    type: "POST",
                    url: "mostraVisitati.php",
                    data: {
                        email: "<?php echo $_SESSION['email']; ?>"
                    },
                    success: function(data) {
                        $("#contenuto").html(data);
                        $(".cuore").attr("src", "../../img/icons/cuoreVuoto.png");
                        $(".occhio").attr("src", "../../img/icons/occhioAperto.png");
                        $(".star").attr("src", "../../img/icons/emptyStarRed.png");
                    }
                });
            });

            $(".star").click(function() {
                $.ajax({
                    type: "POST",
                    url: "mostraPreferiti.php",
                    data: {
                        email: "<?php echo $_SESSION['email']; ?>"
                    },
                    success: function(data) {
                        //alert(data);
                        $("#contenuto").html(data);
                        $(".cuore").attr("src", "../../img/icons/cuoreVuoto.png");
                        $(".occhio").attr("src", "../../img/icons/occhioCancellato.png");
                        $(".star").attr("src", "../../img/icons/fullStarRed.png");

                    }
                });
            });
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
    </script>
</body>

</html>