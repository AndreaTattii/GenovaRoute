<?php
session_start();
/* ACCENTI */
header('Content-Type: text/html; charset=ISO-8859-1');
if (isset($_POST['tappa'])) {
    $_SESSION['nomeTappa'] = $_POST['tappa'];
}
?>
<!doctype html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../../../bootstrap/js/bootstrap.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Personale-->
    <link rel="stylesheet" href="../../../../css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../../bootstrap/css/bootstrap.min.css">

    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,400;1,700&display=swap" rel="stylesheet">

    <title>Genova Route</title>
    <link rel="icon" href="../../../../img/g.png" type="image/icon type">

</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar  navbar-expand-lg" style="background-color: #B30000;">
        <div class="container p-2">
            <a class="navbar-brand" style="font-family: 'Amiri', serif; color: white; font-weight: bold;" href="../../../index.php">
                <h1>Genova Route</h1>
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
	    		<ul class="navbar-nav">
	    			<li class="nav-item">
	    				<a class="nav-link" href="../../index.php" style="color: white">Percorsi</a>
	    			</li>
	    			<li class="nav-item">
	    				<a class="nav-link" href="#" style="color: white">Preferiti</a>
	    			</li>
	    			<li class="nav-item">
	    				<a class="nav-link" href="../../../profilo/index.php" style="color: white">Account</a>
	    			</li>
	    		</ul>
	    	</div>
        </div>
    </nav>

    <h2 style="color:#B30000; font-weight:bold; padding-top:15px; padding-left:150px"><?php echo $_SESSION['nomePercorso']?></h2>
    <h1 style="font-weight:bold; padding-left:150px"><?php echo $_SESSION['nomeTappa']?></h1>

<?php

    $host = "127.0.0.1";
    $user = "root";
    $pass = "";
    $database = "genovaroute";

    $connessione = new mysqli($host, $user, $pass, $database);

    //error_reporting(0);

    if ($connessione === false) {
        die("Errore: " . $connessione->connect_error);
    }
    $sql = "SELECT * FROM tappa WHERE nome = '" . $_SESSION['nomeTappa'] . "'";
    if ($result = $connessione->query($sql)) {
        $row = $result->fetch_assoc();
        $img1 = $row['img1'];
        $img2 = $row['img2'];
        $img3 = $row['img3'];
        $descrizione = $row['descrizione'];
        $dove = $row['via'];
        $_SESSION['ordine'] = $row['ordine'];
    } else {
        echo "Impossibile eseguire la query";
    }
    $sql = "SELECT COUNT(ordine) AS numeroTappe FROM tappa, percorso WHERE percorso.nome = '" . $_SESSION['nomePercorso'] . "'";

    if ($result = $connessione->query($sql)) {
        $row = $result->fetch_assoc();
        $_SESSION['quanteTappe'] = $row['numeroTappe'];
    } else {
        echo "Impossibile eseguire la query";
    }
    echo $_SESSION['quanteTappe'];
?>
<!-- CONTENUTO PAGINA -->
<div class="container" style="padding-top: 50px; padding-left: 50px; padding-right:50px;">
    <div class="row" style="padding-top: 20px; padding-top: 20px;">
        <div class="col-md-8">
            <div class="row">
                <h2 style="color: #B30000; font-weight: bold;">Descrizione</h2>
            </div>
            <div class="row">
                <p><?php echo $descrizione; ?></p>
            </div>
        </div>
        <div class="col-md-4">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?php echo $img1; ?>" class="d-block w-100" alt="..." style="max-height: 200px; margin-left: auto; margin-right: auto;">
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo $img2; ?>" class="d-block w-100" alt="..." style=" max-height: 200px; margin-left: auto; margin-right: auto;">
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo $img3; ?>" class="d-block w-100" alt="..." style=" max-height: 200px; margin-left: auto; margin-right: auto;">
                    </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <div class="row" style="padding-top: 20px; padding-top: 20px;">
        <div class="row">
            <h2 style="color: #B30000; font-weight: bold;">Dove</h2>
        </div>
        <div class="row">
            <p><?php echo $dove; ?></p>
        </div>
    </div>
    <div class="row" style="padding-top: 20px; padding-top: 20px;">
        <div class="col-md-6" style="float:left">
            <?php
                if($_SESSION['ordine']!=0){
                    echo'<form method="post" action="#">
                        <input type="button" name="tappa" value="Indietro" class="btn btn-primary" style="margin-left: 10px;background-color: #B30000; font-weight:bold; border-color:#B30000; font-size: 15px; color:white ; text-align: center;">
                    </form>';
                }
            ?>
        </div>
        <div class="col-md-6" style="float:right">
            <?php
                if($_SESSION['ordine']!=$_SESSION['quanteTappe']-1){
                    echo'<form method="post" action="#">
                        <input type="button" name="tappa" value="Avanti" class="btn btn-primary" style="margin-right: 10px;background-color: #B30000; font-weight:bold; border-color:#B30000; font-size: 15px; color:white ; text-align: center;">
                    </form>';
                }
            ?>
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


    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>

</body>

</html>