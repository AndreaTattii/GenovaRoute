<?php session_start();

if(isset($_GET['emailUtente'])){
    $emailUtente=$_GET['emailUtente'];
}

$host="localhost";
$user="grovago";
$pass = "";
$database="my_grovago";

$connessione = new mysqli($host, $user, $pass, $database);


if ($connessione === false) {
    die("Errore: " . $connessione->connect_error);
}
if(isset($_GET['emailUtente'])){
    $sql = "SELECT nome, cognome, username FROM utente WHERE email = '" . $emailUtente . "'";
}
else{
    $sql = "SELECT nome, cognome, username FROM utente WHERE email = '" . $_SESSION['email'] . "'";
}
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
                        <a class="nav-link" href="index.php" style="color: white">Account</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        



        <!-- INTESTAZIONE  -->
        <div class="row justify-content-center" style="padding-top: 20px; padding-bottom: 20px; ">
            <div class="col s-2" id="immagineProfilo">
                <?php
                    if(isset($_GET['emailUtente'])){
                ?>
                <img style="width:200px;height:200px; border-radius: 50%" src="../../img/propics/<?php echo $emailUtente; ?>.png">
                <?php
                    }
                    else{
                ?>
                <img style="width:200px;height:200px; border-radius: 50%" src="../../img/propics/<?php echo $_SESSION['email']; ?>.png">
                <?php
                }
                ?>
            </div>

            <div class="col" id="nomeUtente" style="padding-top: 25px; padding-right:80px">
                <?php echo  ' <h1 style="font-weight: bold; font-size: 45px; color: black; text-align: left;">' . $username . '</h1>';  ?>
                <?php echo  ' <h2 style="font-weight: bold; font-size: 25px; color: #B30000; text-align: left;">' . $nome . ' ' . $cognome . '</h2> ';  ?>


            </div>
        </div>
        <div class="row" style="padding-bottom:20px;" >
            <div class="col-4">
            </div>
            <div class="col-4" style="">
                <a href="settings.php"><button type="submit" class="btn btn-primary button-profile" style="margin:auto;width:100%;background-color: white; border-color:#B30000; font-size: 15px; color:#B30000 ; text-align: center; ">Impostazioni</button></a>
            </div>
            <div class="col-4">
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
        <div id="contenuto">
        <?php
        if(isset($_GET['emailUtente'])){
            $email=$_GET['emailUtente'];
        }
        else{
            $email=$_SESSION['email'];
        }

        $sql="SELECT * FROM utente_percorre_tappa, tappa WHERE email = '" . $email . "' AND tappa.id=id_tappa AND piace=1";
        $result = $connessione->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo   "<div class='row'>
                            <div class='col-sm-12'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>".$row['nome']."</h5>
                                        <p class='card-text'>".$row['descrizione']."</p>
                                        <a href='../../percorso/mostraPercorso.php?id=".$row['id']."' class='btn btn-primary'>Vai alla tappa</a>
                                    </div>
                                </div>
                            </div>
                        </div>";
            }
            echo"<br><br><br><br>";
        } else {
            if($_SESSION['email']==$email){
                echo "Non hai messo mi piace a nessuna tappa";
            }
            else{
                echo "Non ha messo mi piace a nessuna tappa";
            }
        }
        ?>
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
                        email: "<?php 
                            if(isset($_GET['emailUtente'])){
                                echo $emailUtente;
                            }
                            else{
                                echo $_SESSION['email'];
                            } 
                             ?>"
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
                        email: "<?php 
                            if(isset($_GET['emailUtente'])){
                                echo $emailUtente;
                            }
                            else{
                                echo $_SESSION['email'];
                            } 
                             ?>"
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
                        email: "<?php 
                            if(isset($_GET['emailUtente'])){
                                echo $emailUtente;
                            }
                            else{
                                echo $_SESSION['email'];
                            } 
                             ?>"
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