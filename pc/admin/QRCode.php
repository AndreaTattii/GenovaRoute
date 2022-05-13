<?php    
    session_start();
    
    echo "<h1>QR Code generato</h1><hr/>";
    
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';

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
    
        //default data  
        QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    }    
        
    //display generated file
    echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" />';  
    
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
    