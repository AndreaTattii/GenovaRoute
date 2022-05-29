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
        
        <!-- CONTENUTO PAGINA -->
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col" id="immagineProfilo" style="margin:auto; text-align: center;">
                    <img style="width:200px;height:200px; border-radius: 50%" src="../../img/propics/<?php echo $_SESSION['email'];?>.png">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-4">
                </div>
                <div class="col-4" style="">
                    <form method="post" enctype="multipart/form-data" action="salvaImg.php">
                        <input type="file" name="propic">
                </div>
                <div class="col-4">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-4">
                </div>
                <div class="col-4">
                        <input style="margin:auto;width:100%;background-color: #B30000; color:white" type="submit" name="submit" value="Carica">
                    </form>
                </div>
                <div class="col-4">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3" style="padding-top: 5px;">
                    <b><p>Username</p></b>
                </div>
                <div class="col-7" style="text-align: center">
                    <!-- form per cambiare username -->
                    <form action="cambiaUsername.php" method="post">
                        <input type="text" class="form-control" name="username" value="<?php echo $username;?>" required>
                </div>
                <div class="col-2">
                        <button style="background-color: #B30000; border:1px solid black;" type="submit" class="btn btn-primary">✏</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-3" style="padding-top: 5px;">
                    <b><p>Nome</p></b>
                </div>
                <div class="col-7" style="text-align: center">
                    <!-- form per cambiare username -->
                    <form action="cambiaNome.php" method="post">
                        <input type="text" class="form-control" name="nome" value="<?php echo $nome;?>" maxlenght="8" required>
                </div>
                <div class="col-2">
                        <button style="background-color: #B30000; border:1px solid black;" type="submit" class="btn btn-primary">✏</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-3" style="padding-top: 5px;">
                    <b><p>Cognome</p></b>
                </div>
                <div class="col-7" style="text-align: center">
                    <!-- form per cambiare username -->
                    <form action="cambiaCognome.php" method="post">
                        <input type="text" class="form-control" name="cognome" value="<?php echo $cognome;?>" maxlenght="8" required>
                </div>
                <div class="col-2">
                        <button style="background-color: #B30000; border:1px solid black;" type="submit" class="btn btn-primary">✏</button>
                    </form>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-6" style="text-align:center;">
                    <form action="cambiaPsw/index.php" method="POST" >
                        <button type="submit" class="btn btn-primary" style="background-color: white; border-color:#B30000; font-size: 15px; color:#B30000 ;">Password</button>
                    </form>
                </div>
                <div class="col-6" style="text-align:center;">
                    <form action="logout/logout.php" method="POST">
                        <button type="submit" class="btn btn-primary" style="background-color: white; border-color:#B30000; font-size: 15px; color:#B30000 ; ">Log out</button>
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