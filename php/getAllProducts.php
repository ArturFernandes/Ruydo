<?php
@session_start();
require_once '../php/conection.php';

function getAllProducts($con){
    $products = [];

    if(empty($_SESSION['cart'])) {
        echo false;
        exit();
    }

    foreach ($_SESSION['cart'] as $id => $qty) {
        $sql = "SELECT * FROM products WHERE id = '$id'";
        $qr = mysqli_query($con, $sql) or die(mysqli_error($con));
        while ($ln = mysqli_fetch_assoc($qr)) {
            $ln['qty'] = $qty;
            $products[] = $ln;
        }
    }

    echo json_encode($products);
}

?>