<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href='global.css'>
    <link rel='stylesheet' href='bundle.css'>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
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

<body style="background-color:black; overflow-y: hidden;" class="d-flex flex-column min-vh-100">


    <!-- NAVBAR -->
    <div class="container fixed-bottom" style="background-color: white; border-top-color:black;  border-top-style: solid; border-top-width: 1px; height: 70px;">
        <div class="row  justify-content-center" style="padding-top: 15px;">
            <div class="col s-4" style="padding-top: 15px;  ">
                <center>
                    <a class="navbar-brand" href="../percorsi/index.php">
                        <img  id="percorso" src="../../img/icons/percorso.png">
                    </a>
                </center>

            </div>
            <div class="col s-4" >
                <center>
                    <a class="navbar-brand" href="./">
                        <img id="scannerizzaSfondo" src="../../img/icons/scannerizzaSfondo.png">
                    </a>
                </center>

            </div>
            <div class="col s-4" style="padding-top: 15px; ">
                <center>
                    <a class="navbar-brand" href="../profilo/index.php">
                        <img id="account" src="../../img/icons/account.png">
                    </a>
                </center>

            </div>
        </div>


    </div>


    <div class="container fixed-top">
        <div class="row justify-content-center align-items-center" style="background-color: #B30000;  padding-top: 10px; height:60px;">

            <div class="col-2">

            </div>
            <div class="col-8">
                <h1 style=" color: white; font-weight: bold; text-align: center;  font-size: 17px;">Scanner</h1>
            </div>
            <div class="col-2">

            </div>
        </div>
    </div>

    <div>
        <video style="width:100%;height:100%;"id="preview" style="object-fit: cover;" autoplay="autoplay" class="inactive"></video>
        <!-- put the img of the square in the center of the video on the layer above -->
        <div>
        <img id="square" src="../../img/Qrc.png" style="width:100%;position: absolute; top: 50%; left: 50%; margin-top: -160px; margin-left: -180px;">
        </div>
    </div> 
    <!-- LOGO -->

    <!-- TITOLO PAGINA -->
    <!-- <br>
    <div style="border-top-color:#B30000;  border-top-style: solid; border-top-width: 2px; border-bottom-color:#B30000;  border-bottom-style: solid; border-bottom-width: 2px;">
        <center>
            <h1 style="color: #B30000;">Scanner<h1>
        </center>
    </div> -->
    <form method="POST" action="fakeForm.php" id="form">
        <input type="hidden" name="risultato" id="id" value="">
    </form>

    <!-- CONTENUTO PAGINA -->
    <script>
        let scanner = new Instascan.Scanner(
        {
            video:document.getElementById('preview'),
            mirror: false
            
        });
        Instascan.Camera.getCameras().then(function(cameras)
        {
            if(cameras.length > 0)
            {
                //seleziona la fotocamera posteriore del telefono
                scanner.start(cameras[1]);
            }
            else
            {
                alert("No cameras found");
            }
        }).catch(function(e)
        {
            console.error(e);
        });
        scanner.addListener('scan',function(c)
        {
            var a=c;
            //alert(a);
            document.getElementById("id").value=a;
            document.getElementById("form").submit();
            //pass with a get request tha value of the qr code
            //window.location.href = 'fakeForm.php?risultato='c';

        });


        
    </script>
    <script>
        //window.addEventListener("orientationchange", function() {
        //    if (window.orientation == 90 || window.orientation == -90) {
        //        alert("Gira lo schermo in verticale!!!")
        //        //window.orientation = 0;
        //        //document.getElementById("orientation").style.display = "none";
        //        //window.location.reload();
        //    }
        //});
        
        if ( window.history.replaceState ) 
        {
        window.history.replaceState( null, null, window.location.href );
        }    
    </script>
</body>

</html>