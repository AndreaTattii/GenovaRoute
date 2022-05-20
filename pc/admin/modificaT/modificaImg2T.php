<?php
session_start();
$idTappa=$_SESSION['idTappa'];

if (isset($_FILES['img2'])) {
    $errors = array();
    $file_name = $_FILES['img2']['name'];
    $file_size = $_FILES['img2']['size'];
    $file_tmp = $_FILES['img2']['tmp_name'];
    $file_type = $_FILES['img2']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['img2']['name'])));
    $expensions = array("jpeg", "jpg", "png");
    if (in_array($file_ext, $expensions) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }
    if ($file_size > 10000000) {
        $errors[] = 'File size must be excately 10 MB'; 
    }
    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "../../../img/tappe/$idTappa.2.png");
        echo "Success";
    } else {
        print_r($errors);
    }
}
header("location: ../formModificaT.php");

    
?>