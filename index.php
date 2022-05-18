<?php session_start();
function isMobile()
{
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
if (isMobile()) {
    $_SESSION['dispositivo'] = 'mobile';
} else {
    $_SESSION['dispositivo'] = 'pc';
}
$_SERVER['SERVER_ADDR'];
?>
<!doctype html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Personale-->
    <link rel="stylesheet" href="./style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,400;1,700&display=swap" rel="stylesheet">

    <title>Genova Route</title>
    <link rel="icon" href="img/g.png" type="image/icon type">

    <style type="text/css" media="screen">

.login-page {
  width: 90%;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
button {
  text-transform: uppercase;
  outline: 0;
  background: white;
  width: 100%;
  border: 1px solid #B30000;
  padding: 15px;
  color: #B30000;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
button:hover,button:active,button:focus {
  background: #B30000;
  color: white;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #B30000;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: white;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}

    </style>
</head>

<body class="">
    <!--style="background-image: url('img/foto_epoca_genova.png'); background-repeat: no-repeat; background-size: cover;"-->

    <nav class="navbar  navbar-expand-lg " style="background-color: #B30000;">
        <div class="container p-2">
            <a class="navbar-brand" style="font-family: 'Amiri', serif; color: white; font-weight: bold;" href="./">
                <h1>Genova Route</h1>
            </a>
        </div>
    </nav>
    <br><br>
    <center><h1>Benvenuto</h1></center>
    
    <div class="login-page">
        <div class="form" action="registra.php" method="post">
          <form class="register-form" action="loginUtente.php" method="post">
            <input name="nome" type="text" placeholder="nome" required/>
            <input name="cognome" type="text" placeholder="cognome" required/>
            <input name="mail" type="email" placeholder="email" required/>
            <input name="password" type="password" placeholder="password" required/>
            <button>Registrati</button>
            <p class="message">Già registrato? <a href="#">Accedi</a></p>
          </form>
          <form class="login-form" action="loginUtente.php" method="post">
            <input name="mail" type="email" placeholder="email" required/>
            <input name="password" type="password" placeholder="password" required/>
            <?php

            if (isset($_SESSION['errore'])) { 
                unset($_SESSION['errore']);  
            ?>                
                <p style="color: red;">Dati inseriti errati</p>
            <?php
            }
            ?>
            <button>Accedi</button>
            <p class="message">Non sei registrato? <a href="#">Registrati</a></p>
          </form>
        </div>
    </div>

    <script>
        $('.message a').click(function(){
           $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
    </script>
</body>

</html>
