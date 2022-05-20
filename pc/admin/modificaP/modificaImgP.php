<?php
session_start();


$idPercorso = $_POST['idPercorso'];

if (isset($_FILES['img'])) {
    $errors = array();
    $file_name = $_FILES['img']['name'];
    $file_size = $_FILES['img']['size'];
    $file_tmp = $_FILES['img']['tmp_name'];
    $file_type = $_FILES['img']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['img']['name'])));
    $expensions = array("jpeg", "jpg", "png");
    if (in_array($file_ext, $expensions) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }
    if ($file_size > 10000000) {
        $errors[] = 'File size must be excately 10 MB';
    }
    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "../../../img/percorsi/$idPercorso.png");
        echo "Success";
    } else {
        print_r($errors);
    }
}
else{
    echo "No file selected";
}
header("location: ../index.php");

    
?>