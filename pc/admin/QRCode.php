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
    <link rel="icon" href="../../img/Admin.png" type="image/icon type">

</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar  navbar-expand-lg" style="background-color: #B30000;">
        <div class="container">
            <div class="col">
                <a class="navbar-brand" style="font-family: 'Amiri', serif; color: white; font-weight: bold; text-align: center; " href="index.php">
                    <h1>Genova Route Administration</h1>
                </a>
            </div>

        </div>
    </nav>

    <!-- CORPO -->

<?php    
    session_start();
    
    echo '<b><h1 style="text-align:center;">QR Code generato</h1></b><br><br><br><br><br><br>';
    
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'qrCodes'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'qrCodes/';

    include "qrlib.php";    
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_TEMP_DIR.'.png';
    
    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'L';
    //if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
    //    $errorCorrectionLevel = $_REQUEST['level'];    

    $matrixPointSize = 5;
    //if (isset($_REQUEST['size']))
    //    $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);


    if (isset($_SESSION['idPercorso']) && isset($_SESSION['idTappa'])) { 
    
        //it's very important!
            
        // user data
        $filename = $PNG_TEMP_DIR.$_SESSION['idPercorso'].'.'.$_SESSION['idTappa'].'.png';
        QRcode::png($_SESSION['idPercorso'].'.'.$_SESSION['idTappa'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    } else {    
        echo 'errore';
        //default data  
        QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    }    
        
    //display generated file
    echo '<img style="  display: block;
    margin-left: auto;
    margin-right: auto;" src="'.$PNG_WEB_DIR.basename($filename).'" />';  
    
    //config form
    echo '<form action="QRCode.php" method="post" name="qr" id="qr">
        &nbsp;<input type="hidden" name="" value="'.$_SESSION['idPercorso'].'.'.$_SESSION['idTappa'].''.'" readonly=""/>&nbsp;
        </form>';
?>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<?php
    for ($i = 0; $i < 15; $i++) {
        echo "<br>";
    }
    ?>
    <div class="footer-clean" style="background-color:white; border-top-color:#F0F0F0;  border-top-style: solid; border-top-width: 3px; margin-top: 40px; position:fixed; bottom:0px; width:100%;">
        <footer>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-4 ">
                    </div>
                    <div class="col-4"></div>
                    <center>
                        <p style="text-decoration: none; color:black">Partita Iva: 02070920992</p>
                        <p>GenovaRoute ©</p>
                    </center>
                </div>
            </div>
    </div>
    </footer>
    </div>

</body>

</html>
    