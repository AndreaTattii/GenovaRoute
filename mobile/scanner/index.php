<?php session_start(); ?>
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


    <!-- NAVBAR -->
    <div class="container fixed-bottom" style="background-color: white; border-top-color:black;  border-top-style: solid; border-top-width: 4px; height: 70px;">
        <div class="row  justify-content-center" style="padding-top: 15px;">
            <div class="col s-4" style="padding-top: 15px;  ">
                <center>
                    <a class="navbar-brand" href="../percorsi/index.php">
                        <img src="../../img/icons/percorso.png">
                    </a>
                </center>

            </div>
            <div class="col s-4" >
                <center>
                    <a class="navbar-brand" href="./">
                        <img src="../../img/icons/scannerizzaSfondo.png">
                    </a>
                </center>

            </div>
            <div class="col s-4" style="padding-top: 15px; ">
                <center>
                    <a class="navbar-brand" href="../profilo/index.php">
                        <img src="../../img/icons/account.png">
                    </a>
                </center>

            </div>
        </div>


    </div>

    
    <!-- LOGO -->
    


    <!-- TITOLO PAGINA -->
    <br>
    <div style="border-top-color:#B30000;  border-top-style: solid; border-top-width: 2px; border-bottom-color:#B30000;  border-bottom-style: solid; border-bottom-width: 2px;">
        <center>
            <h1 style="color: #B30000;">Scanner<h1>
        </center>
    </div>
    
    <script src="html5-qrcode.min.js"></script>
        <style>

        </style>
        <div class="row">
          <div class="col">
            <div style="width:500px;" id="reader"></div>
          </div>
          <div class="col" style="padding:30px;">
            <h4>SCAN RESULT</h4>
            <div id="result">Result Here</div>
          </div>
        </div>
        <script type="text/javascript">
        function onScanSuccess(qrCodeMessage) {
            document.getElementById('result').innerHTML = '<a href="'+qrCodeMessage+'" class="result">link</a>';
        }
        function onScanError(errorMessage) {
          //handle scan error
        }
        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess, onScanError);
    </script>



</body>

</html>