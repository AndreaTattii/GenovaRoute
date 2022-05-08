<?php session_start(); 

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
?>
<!doctype html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../../bootstrap/js/bootstrap.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Personale-->
    <link rel="stylesheet" href="../../../css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">

    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,400;1,700&display=swap" rel="stylesheet">

    <title>Genova Route</title>
    <link rel="icon" href="../../../img/G.png" type="image/icon type">

</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar  navbar-expand-lg" style="background-color: #B30000;">
        <div class="container p-2">
            <a class="navbar-brand" style="font-family: 'Amiri', serif; color: white; font-weight: bold;" href="../../index.php">
                <h1>Genova Route</h1>
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
	    		<ul class="navbar-nav">
	    			<li class="nav-item">
	    				<a class="nav-link" href="../../percorsi/index.php" style="color: white">Percorsi</a>
	    			</li>
	    			<li class="nav-item">
	    				<a class="nav-link" href="#" style="color: white">Preferiti</a>
	    			</li>
	    			<li class="nav-item">
	    				<a class="nav-link" href="../index.php" style="color: white">Account</a>
	    			</li>
	    		</ul>
	    	</div>
        </div>
    </nav>

    <!--- Corpo del sito -->
    <div class="container" style="padding-top:30px">
    <div class="row" style="">
            <h2 style="color:#B30000">Cambia password</h2>
    </div>
        <form action="cambiaPsw.php" method="POST">

            <div class="row  align-items-center" style="padding: 5px;">
                <div class="col -6">
                    <label for="inputAddress" class="form-label">Vecchia Password</label>
                </div>
                <div class="col -6">
                    <input type="password" class="form-control" id="vecchiaPsw" name="vecchiaPsw" required>
                </div>
            </div>

            <div class="row align-items-center" style="padding: 5px;">
                <div class="col -6">
                    <label for="inputAddress" class="form-label">Nuova Password</label>
                </div>
                <div class="col -6">
                    <input type="password" class="form-control" id="nuovaPsw" name="nuovaPsw" required>
                </div>
            </div>

            <div class="row align-items-center" style="padding: 5px;">
                <button type="submit" class="btn btn-primary" style="background-color: white; border-color:#B30000; font-size: 15px; color:#B30000 ; text-align: center; ">Cambia password</button>
            </div>
        </form>
        

        <?php 
            
            if(isset($_SESSION['successo'])){
                echo '
                    <p style="color:green;">Password cambiata con successo</p>
                ';

                unset($_SESSION['successo']);
            }
            
            if(isset($_SESSION['errore'])){
                echo '
                    <p style="color:red;">Vecchia password errata </p>
                ';

                unset($_SESSION['errore']);
            }
        ?>


    </div>

</body>

</html>