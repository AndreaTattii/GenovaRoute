<!doctype html>
<html lang="en">
   <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS Personale-->
	<link rel="stylesheet" href="cssPersonal/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>GetnBite</title>
  </head>
  <body>

	<?php
		session_start();
  		if(isset($_SESSION['email'])){
	?>
			<nav class="navbar  navbar-expand-lg navbar-light bg-light">
					<div class="container p-2">
						<a class="navbar-brand" href="./">
							<img src="img/Home/logoScritta.png" alt="" height="50" class="d-inline-block align-text-top">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" ">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
							<ul class="navbar-nav">
								<li class="nav-item">
									<a class="nav-link" href="pagine/user/contatti/contatti.php" style="color: black">Contatti</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="pagine/user/chiSiamo/chiSiamo.php" style="color: black">Chi siamo</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="pagine/user/eventi/eventi.php" style="color: black">Eventi</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="pagine/user/menu/menu.php" style="color: black">Menù</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="pagine/user/profilo/profilo.php" style="color: black">Profilo</a>
								</li>
								<li class="nav-item">
									<a href="pagine/user/carrello/carrello.php"><img src="img/Carrello/carrello2.jpg" style="width:42px;height:42px;"></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="pagine/user/logout/logout.php" style="color: black">Logout</a>
								</li>
								
							</ul>
						</div>
					</div>
				</nav>
			
			
	<?php
	  	
		}else{
			
	?>
			<!-- NAVABAR PER UTENTE NON LOGGATO -->
			<nav class="navbar  navbar-expand-lg navbar-light bg-light">
					<div class="container p-2">
						<a class="navbar-brand" href="./">
							<img src="./img/Home/logoScritta.png" alt="" height="50" class="d-inline-block align-text-top">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" >
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
							<ul class="navbar-nav">
								<li class="nav-item">
									<a class="nav-link" href="pagine/user/contatti/contatti.php" style="color: black">Contatti</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="pagine/user/chiSiamo/chiSiamo.php" style="color: black">Chi siamo</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="pagine/user/eventi/eventi.php" style="color: black">Eventi</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="pagine/user/menu/menu.php" style="color: black">Menù</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="pagine/user/login/formLogin.php" style="color: black">Login</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
	<?php
		}
	?>
  	
	<div  style="background-image: url('img/Home/img1.png'); height: 600px; background-repeat: no-repeat; width:100%; background-position: center;">
		
        <center>
            <br>
            <br>
			<p style="color: white; font-size:20px;">Il miglior sito di consegne.</p>
            <h2 style="color: white; font-size:80px;">Il cibo chiama: GetnBite!</h2>
            <p style="color: white; font-size:20px;">Facile da ordinare.</p>
            <p style="color: white; font-size:20px;">Buono da mangiare.</p> 
			<br>
			
        </center>
    </div>
	
	<div class="container pt-5">
		<div class="row">
			<div class="col-sm">
			<div style="border-top-color:#E4E4E4;  border-top-style: solid; border-top-width: 2px; border-bottom-color:#E4E4E4;  border-bottom-style: solid; border-bottom-width: 2px;">
                    <center>
                        <h2>Come funziona l'app<h2>
                    </center>
                </div>
			</div>
		</div>
	</div>
	<div class="container pt-5">
	   <div class="row">
		<div class="col-sm-6">
			<figure class="figure">
				<img src="./img/Home/img2.png" class="figure-img img-fluid rounded" alt="immagine di sfondo">
			</figure>
		</div>
		<div class="col-sm-6">
			<br>
			<br>
			<br>
			<h4 style="color: #00E1A5">Crea il tuo account</h4>
			<br>
			<h3>Mail.Password.Fatto!</h3>
			<br>
			<p class="lead">Registrati e accedi con semplicità</p>
		</div>
	  </div>
	</div>
	
	<div class="container pt-5">
	    <div class="row">
		<div class="col-sm-6">
			<br>
			<br>
			<br>
			<h4 style="color: #00E1A5">Diversi prodotti da ordinare</h4>
			<br>
			<h3>Mangi ciò che ami</h3>
			<br>
			<p class="lead">Ordina il tuo cibo e la tua bevanda preferita e goditeli anche in compagnia.</p>
		</div>
		<div class="col-sm-6">
			<figure class="figure">
				<img src="./img/Home/img3.png" class="figure-img img-fluid rounded" alt="sfondo">
			</figure>
		</div>
	     </div>
	</div>
	
	<div class="container pt-5">
	   <div class="row">
		<div class="col-sm-6">
			<figure class="figure">
				<img src="./img/Home/img4.png" class="figure-img img-fluid rounded" alt="immagine di sfondo">
			</figure>
		</div>
		<div class="col-sm-6">
			<br>
			<br>
			<br>
			<h4 style="color: #00E1A5">Checkout</h4>
			<br>
			<h3>Veloci da paura</h3>
			<br>
			<p class="lead">Quando hai finito procedi al pagamento e gusta comodomante il tuo ordine sul divano.</p>
		</div>
	  </div>
	</div>
	
	<div>
		<center>
			<p><a style="text-decoration: none; color: #00E1A5; font-size:20px;" href="pagine/user/recensioni/formRecensione.php">Scrivi una recensione!</a></p>
        </center>
	<br>
	<br>
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
		  <div class="carousel-item active">
			<img src="./img/Home/img5.png" class="d-block w-100" alt="...">
		  </div>
		</div>
	</div>
	
		<br>

	<div class="footer-clean">
		<footer>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-4 ">
						<a class="navbar-brand" href="./">
							<img src="img/home/logoScritta.png" alt=""  height="60" class="d-inline-block align-text-top">
						</a>
					</div>
					<div class="col-4" ></div>
						<center>
							<a href="pagine/admin/login/formAdmin.php" style="text-decoration: none; color:black">Login Admin</a>
							<br>
							<br>
							<p style="text-decoration: none; color:black">Partita Iva: 02070920992</p>
							<p>GetnBite ©</p> 
						</center>
					</div>
				</div>
			</div>
		</footer>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php
	//session_destroy();
?>