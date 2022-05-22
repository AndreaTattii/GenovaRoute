<?php session_start(); 

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
?>
<!doctype html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Personale-->
    <link rel="stylesheet" href="../css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,400;1,700&display=swap" rel="stylesheet">

    <title>GrovaGO</title>
    <link rel="icon" href="../img/g.png" type="image/icon type">

</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar  navbar-expand-lg" style="background-color: #B30000;">
        <div class="container p-2">
            <a class="navbar-brand" style="font-family: 'Amiri', serif; color: white; font-weight: bold;" href="./">
                <h1>GrovaGO</h1>
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
	    		<ul class="navbar-nav">
	    			<li class="nav-item">
	    				<a class="nav-link" href="percorsi/index.php" style="color: white">Percorsi</a>
	    			</li>
	    			<li class="nav-item">
	    				<a class="nav-link" href="#" style="color: white">Preferiti</a>
	    			</li>
	    			<li class="nav-item">
	    				<a class="nav-link" href="profilo/index.php" style="color: white">Account</a>
	    			</li>
	    		</ul>
	    	</div>
        </div>
    </nav>

    <div style="background-image: url('../img/foto_epoca_genova.png'); height: 600px; background-repeat: no-repeat; width:100%; background-position: center; background-size: cover;">

        <center>
            <br>
            <br>
            <p style="color: white; font-size:20px;">Benvenuto</p>
            <h2 style="color: white; font-size:80px;">Scopri le bellezze che ti circondano</h2>
            <br>

        </center>
    </div>

    <!--- Corpo del sito -->
    

    <div class="container">
        <div class="row align-items-center" style="margin: 20px; padding-top: 20px;">
            <div class="col">
                <h1 style="color:#B30000;">Esperienze uniche</h1>
            </div>
            <div class="col">
                <p>La nostra applicazione, in regalo agli amanti della cultura, fornisce esperienze uniche e indimenticabili.</p>
            </div>
            <div class="col">
                <img src="../img/PorcoAntico.png" > 
            </div>
        </div>

        <br>
        <br>
        <br>
        
        <div class="row align-items-center">
            <div class="col">
                <img src="../img/mappa.png" >    
            </div>
            <div class="col">
                <h1 style="color:#B30000; text-align:center;">Percorsi a tema</h1>
            </div>
            <div class="col">
                <p>Scopri aspetti nascosti, attraverso i nostri percorsi guidati, all’interno delle città.</p>
            </div>
        </div>
    </div>
            
    

    <div class="footer-clean" style="border-top-color:#F0F0F0;  border-top-style: solid; border-top-width: 3px; margin-top: 40px;">
		<footer>
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
