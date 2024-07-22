<?php
require_once 'conection.php';

print_r($_FILES);

$name = isset($_REQUEST['name']) ? filter_var($_REQUEST['name'], FILTER_SANITIZE_STRING) : false;
$image = isset($_FILES['image']) ? $_FILES['image'] : false;
$price = isset($_REQUEST['price']) ? filter_var($_REQUEST['price'], FILTER_SANITIZE_STRING) : false;
$category = isset($_REQUEST['category']) ? filter_var($_REQUEST['category'], FILTER_SANITIZE_STRING) : false;
$offer = isset($_REQUEST['offer']) ? filter_var($_REQUEST['offer'], FILTER_SANITIZE_STRING) : '';
$description = isset($_REQUEST['description']) ? filter_var($_REQUEST['description'], FILTER_SANITIZE_STRING) : false;

if(!$image || $image['error'] !== UPLOAD_ERR_OK) {
    echo '403';
    exit();
}

$uploadDir = '../imgs/uploads/';
$uploadFile = $uploadDir . basename($image['name']);

if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
    $sqlInsert = "INSERT INTO products (name, image, price, category, highlight, description) VALUES ('$name', '$uploadFile', '$price', '$category', '$offer', '$description')";
    mysqli_query($con, $sqlInsert);

    echo '200';
} else {
    echo '401';
}
?>