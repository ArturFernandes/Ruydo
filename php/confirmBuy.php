<?php
@session_start();
require_once 'conection.php';

if(!isset($_SESSION['username'])) {
    echo "401";
    exit();

}

if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $totalPrice = 0;
    foreach ($_SESSION['cart'] as $productId => $quantity) {
        $userId = $_SESSION['user_id'];
        $productId = intval($productId);
        $quantity = intval($quantity);
        
        
        $sql = "INSERT INTO user_purchases (user_id, product_id, quantity, total_price) VALUES ('$userId', '$productId', '$quantity', '$totalPrice')";
        mysqli_query($con, $sql) or die(mysqli_error($con));
        print($sql);
    }

    unset($_SESSION['cart']);
    header("Location: ../views/confirmBuy.html");
    exit;

} else {
    header("Location: ../views/cartVazio.php");
    exit;

}
?>