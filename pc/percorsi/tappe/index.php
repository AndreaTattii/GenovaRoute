<?php
session_start();
if(isset($_POST['nomePercorso'])){
    $_SESSION['nomePercorso'] = $_POST['nomePercorso'];
}
if(isset($_POST['idPercorso'])){
    $_SESSION['idPercorso'] = $_POST['idPercorso'];
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

    <title>GrovaGO</title>
    <link rel="icon" href="../../../img/g.png" type="image/icon type">

</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar  navbar-expand-lg" style="background-color: #B30000;">
        <div class="container p-2">
            <a class="navbar-brand" style="font-family: 'Amiri', serif; color: white; font-weight: bold;" href="../../index.php">
                <h1>GrovaGO</h1>
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
	    		<ul class="navbar-nav">
	    			<li class="nav-item">
	    				<a class="nav-link" href="../index.php" style="color: white">Percorsi</a>
	    			</li>
	    			<li class="nav-item">
	    				<a class="nav-link" href="#" style="color: white">Preferiti</a>
	    			</li>
	    			<li class="nav-item">
	    				<a class="nav-link" href="../../profilo/index.php" style="color: white">Account</a>
	    			</li>
	    		</ul>
	    	</div>
        </div>
    </nav>

    <h2 style="color:#B30000; font-weight:bold; padding-top:15px; font-size:40px; padding-left:150px"><?php echo $_SESSION['nomePercorso']?></h2>
    <h1 style="font-weight:bold; padding-left:150px; font-size:30px;">Scegli una tappa</h1>

    
    
    <div class="container" style="padding-top:30px; margin-bottom: 100px;">
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
        $sql = "SELECT tappa.nome, ordine, tappa.id FROM tappa, tappa_appartiene_percorso, percorso WHERE percorso.id = '" . $_SESSION['idPercorso'] . "' AND tappa_appartiene_percorso.id_percorso=percorso.id AND tappa.id=tappa_appartiene_percorso.id_tappa ORDER BY ordine";
        if ($result = $connessione->query($sql)) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_array()) {
                    echo '
                        <div class="col-sm align-self-center" style="width:60%; padding-top:30px; ">       
                            <div class="card text-center align-self-center" style="width:100%;  background-color: #F0F0F0;">
                                <div class="card-body">
                                    <form action="tappaSpecifica/index.php" method="post">
                                        <p class="card-title">
                                            <input type="hidden" name="idTappa" value="' . $row['id'] . '">
                                            <input type="hidden" name="ordineTappa" value="' . $row['ordine'] . '">
                                            <input type="submit" value="'.$row['ordine'].'. ' . $row['nome'] . '" style="background-color: #F0F0F0; text-decoration: none; color: #B30000; font-size:20px; border: none; font-weight: bold; float: left;"> 
                                            <button type="submit" class="btn btn-primary" style="background-color: #B30000; font-weight:bold; border-color:#B30000; font-size: 15px; color:white ; text-align: center; float: right;">Visualizza</button>
                                        </p>
                                    </form>
                                </div>
                            </div>                                        
                        </div>
                        ';
                }
            } else {
                echo "<p style='text-align: center'>Non ci sono tappe salvate nel database</p>";
            }
        } else {
            echo "Impossibile eseguire la query";
        }
        ?>
        <div class="row">

        </div>
        <div class="row">

        </div>
    </div>
    

    <div class="footer-clean" style="border-top-color:#F0F0F0;  border-top-style: solid; border-top-width: 3px; margin-top: 40px; position:fixed; bottom:0px; width:100%; background-color:white;">
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