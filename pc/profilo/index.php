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
    <link rel="icon" href="../../img/g.png" type="image/icon type">

</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar  navbar-expand-lg" style="background-color: #B30000;">
        <div class="container p-2">
            <a class="navbar-brand" style="font-family: 'Amiri', serif; color: white; font-weight: bold;" href="../index.php">
                <h1>Genova Route</h1>
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
	    				<a class="nav-link" href="#" style="color: white">Account</a>
	    			</li>
	    		</ul>
	    	</div>
        </div>
    </nav>

    <!--- Corpo del sito -->
    
    <div class="container">
        <div class="row justify-content-center align-item-center" style="padding-top: 20px">
            <div class="col" id="immagineProfilo">
                <img src="../../img/FotoProfilo.png">
            </div>
            <div class="col -" id="nomeUtente" style="padding-top: 10px;">
                <?php echo  ' <h1 style="font-weight: bold; font-size: 30px; color: black; text-align: center;">' . $nome . ' ' . $cognome . '</h1> ';  ?>
            </div>
        </div>
    </div>     
    

    <div class="footer-clean" style="border-top-color:#F0F0F0;  border-top-style: solid; border-top-width: 3px; margin-top: 40px;">
		<footer>
            <hr size="5" width="100%" color="black">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-4 ">
					</div>
					<div class="col-4" ></div>
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