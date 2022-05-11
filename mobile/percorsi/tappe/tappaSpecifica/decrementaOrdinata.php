<?php 
    session_start();
    if($_SESSION['ordineTappa'] > 0){
        $_SESSION['ordineTappa'] = $_SESSION['ordineTappa'] - 1;
    }
    
    header("Location: index.php");
?>