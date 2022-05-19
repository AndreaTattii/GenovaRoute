<?php
session_start();
//save the image uploaded on the folder propics
$mail = $_SESSION['email'];
if (isset($_FILES['propic'])) {
    $errors = array();
    $file_name = $_FILES['propic']['name'];
    $file_size = $_FILES['propic']['size'];
    $file_tmp = $_FILES['propic']['tmp_name'];
    $file_type = $_FILES['propic']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['propic']['name'])));
    $expensions = array("jpeg", "jpg", "png");
    if (in_array($file_ext, $expensions) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }
    if ($file_size > 10000000) {
        $errors[] = 'File size must be excately 10 MB';
    }
    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "../../img/propics/$mail.png");
        echo "Success";
    } else {
        print_r($errors);
    }
    header("Location:settings.php");
}
