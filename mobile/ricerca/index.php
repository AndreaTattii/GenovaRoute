<?php
session_start();
//error_reporting(0);
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
    <link rel="icon" href="img/g.png" type="image/icon type">
</head>

<body class="d-flex flex-column min-vh-100">


        <!-- NAVBAR BASSA -->
        <div class="container fixed-bottom" style="background-color: white; border-top-color:black;  border-top-style: solid; border-top-left-radius: 25px;border-top-right-radius: 25px; border-top-width: 1px; height: 50px;">
        <div class="row  justify-content-center" >
            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="../percorsi/index.php">
                        <img id="percorsoSfondo" src="../../img/icons/percorso.png">
                    </a>
                </center>

            </div>
            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="./">
                        <img id="ricercaNavImg" src="../../img/icons/searchRed.png">
                    </a>
                </center>

            </div>

            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="../scanner/index.php ">
                        <img style="width:25px" src="../../img/icons/scannerizza.png">
                    </a>
                </center>

            </div>
            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="../percorsiPersonali/index.php ">
                        <img style="width:25px" src="../../img/icons/aggiungiPercorso.png">
                    </a>
                </center>

            </div>
            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="../profilo/index.php">
                        <img id="account" src="../../img/icons/account.png">
                    </a>
                </center>
            </div>
        </div>
    </div>



    <!-- NAVBAR ALTA -->
    <div class="container fixed-top">
        <div   class="row justify-content-center align-items-center" style="background-color:#EFEFEF; height:40px; border-radius: 25px; margin-top:10px;">
            <div class="col-1" style="text-align: center;">
                <img id="account" src="../../img/icons/searchBlackBold.png" style="width:20px">    
            </div>
            <div class="col-11" >
                <input style="width: 100%; border:none; background-color:#EFEFEF;" type="text" placeholder="Cerca">
            </div>
        </div>

        <div   class="row justify-content-center align-items-center" style=" height:30px; border-radius: 25px; margin-top:10px;">
            <div id="col-tappe" class="col-2" style="text-align: center;">
                <h1 style="font-size:15px">Tappe</h1>
            </div>
            <div id="col-percrosi"  class="col-2" style="text-align: center;">
                <h1 style="font-size:15px">Percorsi</h1>
            </div>
            <div id="col-citta"  class="col-2" style="text-align: center;">
                <h1 style="font-size:15px">Città</h1>
            </div>
            <div id="col-categorie"  class="col-3" style="text-align: center;">
                <h1 style="font-size:15px">Categorie</h1>
            </div>
            <div id="col-account"  class="col-2" style="text-align: center;">
                <h1 style="font-size:15px">Account</h1>
            </div>
        </div>
    </div>

    

    
</body>

</html>