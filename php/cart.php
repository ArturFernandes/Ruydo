<?php
@session_start();
require_once '../php/conexao.php';

if(!isset($_SESSION['username'])) {
    echo "401";
    exit();
}

if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

function returnProductsList($con){
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

if(isset($_POST['acao'])) {
    switch($_POST['acao']) {
        case 'add':
            $id = intval($_POST['id']);
            if(!isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id] = 1;
                returnProductsList($con);
            } else {
                $_SESSION['cart'][$id] += 1;
                if(isset($_POST['cartUpdate'])) {
                    returnProductsList($con);
                }
            }
            break;

        case 'remove':
            $id = intval($_POST['id']);
            if(isset($_SESSION['cart'][$id])) {
                if($_SESSION['cart'][$id] > 1) {
                    $_SESSION['cart'][$id] -= 1;
                    returnProductsList($con);
                } else {
                    unset($_SESSION['cart'][$id]);
                    returnProductsList($con);
                }
            }
            break;

        case 'delete':
            $id = intval($_POST['id']);
            unset($_SESSION['cart'][$id]);
            returnProductsList($con);
            break;

        case 'returnProducts':
            returnProductsList($con);
            break;

        default:
            echo "403";
            exit();
    }
}
?>