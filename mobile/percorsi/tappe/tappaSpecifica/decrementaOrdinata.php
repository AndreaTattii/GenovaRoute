<?php 
    session_start();
    if($_SESSION['ordine'] > 0){
        $_SESSION['ordine'] = $_SESSION['ordine'] - 1;
    }
    
    header("Location: index.php");
?>