<?php
@session_start();
require_once 'conexao.php';


if(isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
    $totalPrice = 0;
    foreach ($_SESSION['carrinho'] as $productId => $quantity) {
        $userId = $_SESSION['user_id'];
        $productId = intval($productId);
        $quantity = intval($quantity);
        
        
        $sql = "INSERT INTO user_purchases (user_id, product_id, quantity, total_price) VALUES ('$userId', '$productId', '$quantity', '$totalPrice')";
        mysqli_query($con, $sql) or die(mysqli_error($con));
        print($sql);
    }

    unset($_SESSION['carrinho']);
    header("Location: ../views/sucessoCompra.php");
    exit;
} else {
    header("Location: ../views/carrinhoVazio.php");
    exit;
}
?>