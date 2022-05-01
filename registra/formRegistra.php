<?php session_start(); 
function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
if(isMobile()){
    $_SESSION['dispositivo']='mobile';
    echo '<h1>Mobile</h1>';
}
else {
    $_SESSION['dispositivo']='pc';

    echo '<h1>PC</h1>'; 
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
  <link rel="stylesheet" href="../bootstrap/cssPersonal/style.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

  <!-- font -->
  <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,400;1,700&display=swap" rel="stylesheet">

  <title>Genova Route</title>
  <link rel="icon" href="../img/G.png" type="image/icon type">
</head>

<body class="d-flex flex-column min-vh-100">
  
  <nav class="navbar  navbar-expand-lg " style="background-color: #B30000;">
    <div class="container p-2">
        <a class="navbar-brand" style="font-family: 'Amiri', serif; color: white; font-weight: bold;" href="../../index.php">
            <h1>Genova Route</h1>
        </a>
    </div>
  </nav>

  <div class="container pt-5">
    <div class="row justify-content-md-center " style="font-family: 'Helvetica', 'Arial', sans-serif; padding: 20px;">
      <div class="col-sm-12" style=" background-color: white; border-style:solid; border-color:black; border-width:2px; border-radius: 60px;">
        <br>
        
        <div class="row center-text">
          <h1 style="font-weight: bold; font-size: 27px; color: black; text-align: center;">Benvenuto su Genova Route</h1>
        </div>

        <!-- form -->
        <div id="registrazione" style="margin:5px; padding:20px;">

          <form class="row g-3" action="registra.php" method="post">
            <div class="col-md-6">

              <label for="inputEmail4" class="form-label">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" required>

            </div>
            <div class="col-md-6">

              <label for="inputPassword4" class="form-label">Cognome</label>
              <input type="text" class="form-control" id="cognome" name="cognome" required>

            </div>
            <div class="col-12">

              <label for="inputAddress" class="form-label">Mail</label>
              <input type="mail" class="form-control" id="mail" name="mail" required>

            </div>
            <div class="col-12">

              <label for="inputAddress2" class="form-label">Password </label>
              <input type="password" class="form-control" id="password" name="password" required>

            </div>

            <div class="col-12">
              <div class="form-check">

                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                  Ricordami
                </label>

              </div>
            </div>
            <br>
            <div class="col-12">
              <br>
              <button type="submit" class="btn btn-primary" style="background-color: #B30000; border-color: black;">
                Registrati
              </button>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>