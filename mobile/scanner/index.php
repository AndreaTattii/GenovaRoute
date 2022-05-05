<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://raw.githubusercontent.com/mebjas/html5-qrcode/master/minified/html5-qrcode.min.js"></script>
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

<body class="d-flex flex-column min-vh-100" onload="html5QrCode.start()">


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
    
    <script>
    // Create instance of the object.
    // The only argument is the “id” of HTML element created above.const html5QrCode = new Html5Qrcode(“reader”);
    html5QrCode.start(
        cameraId, // retreived in the previous step.
        {
           fps: 10,    // sets the framerate to 10 frame per second 
           qrbox: 250  // sets only 250 X 250 region of viewfinder to
                       // scannable, rest shaded.
      },
      qrCodeMessage => {     // do something when code is read. For example:
          console.log('QR Code detected: ${qrCodeMessage}');
      },
      errorMessage => {     // parse error, ideally ignore it. For example:
          console.log('QR Code no longer in front of camera.');
      })
      .catch(err => {     // Start failed, handle it. For example, 
          console.log('Unable to start scanning, error: ${err}');
      });

      html5QrCode.stop().then(ignore => {
        // QR Code scanning is stopped. 
        console.log('QR Code scanning stopped.');
      }).catch(err => { 
        // Stop failed, handle it. 
        console.log('Unable to stop scanning.');
       });
    </script>



</body>

</html>