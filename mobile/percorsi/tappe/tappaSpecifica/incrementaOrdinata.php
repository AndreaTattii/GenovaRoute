<?php 
    session_start();

    
    
    if($_SESSION['ordineTappa'] < $_SESSION['quanteTappe']){
        $_SESSION['ordineTappa'] = $_SESSION['ordineTappa']+1;
    }

    header("Location: index.php");
?>