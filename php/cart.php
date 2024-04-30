<?php
@session_start();
require_once '../php/conection.php';

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

function addPurchase($con, $userId, $totalPrice) {
    $sql = "INSERT INTO user_purchases (userId, totalPrice) VALUES ('$userId', '$totalPrice')";

    if (mysqli_query($con, $sql)) {
        $purchaseId = mysqli_insert_id($con);
        
        foreach ($_SESSION['cart'] as $productId => $quantity) {
            $pricePerItem = getPricePerItem($con, $productId);
            $subtotal = $pricePerItem * $quantity;
            $sql = "INSERT INTO purchase_items (purchaseId, productId, quantity, pricePerUnit, totalPrice) VALUES ('$purchaseId', '$productId', '$quantity', '$pricePerItem', '$subtotal')";
            mysqli_query($con, $sql);
        }
        return true;
    } else {
        return false;
    }
}

function getPricePerItem($con, $productId) {
    $sql = "SELECT price FROM products WHERE id = '$productId'";
    $result = mysqli_query($con, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['price'];
    }
}

function calculateTotalPrice($con) {
    $totalPrice = 0;
    foreach ($_SESSION['cart'] as $productId => $quantity) {
        $pricePerItem = getPricePerItem($con, $productId);
        $totalPrice += $pricePerItem * $quantity;
    }
    return $totalPrice;
}

if(isset($_POST['action'])) {
    switch($_POST['action']) {
        case 'add':
            $id = intval($_POST['id']);
            if(!isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id] = 1;
            } else {
                $_SESSION['cart'][$id]++;
                if(isset($_POST['cartUpdate'])) {
                }
            }
            break;

        case 'remove':
            $id = intval($_POST['id']);
            if(isset($_SESSION['cart'][$id])) {
                if($_SESSION['cart'][$id] > 1) {
                    $_SESSION['cart'][$id]--;
                } else {
                    unset($_SESSION['cart'][$id]);
                }
            }
            break;

        case 'delete':
            $id = intval($_POST['id']);
            unset($_SESSION['cart'][$id]);
            break;

        case 'returnProducts':
            returnProductsList($con);
            break;

        case 'emptyCart':
            unset($_SESSION['cart']);
            break;

        case 'checkout':
            $userId = $_SESSION['user_id'];
            $totalPrice = calculateTotalPrice($con);

            if(addPurchase($con, $userId, $totalPrice)) {
                unset($_SESSION['cart']);
                echo "200";
            } else {
                echo "500";
            }
            break;

        case 'showPurchases':
            if(isset($_SESSION['user_id'])) {
                showPurchases($con, $_SESSION['user_id']);
            } else {
                echo "Usuário não autenticado.";
            }
            break;

        default:
            echo "403";
            exit();
    }
}

function showPurchases($con, $userId) {
    $sql = "SELECT * FROM user_purchases WHERE userId = '$userId'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $purchases = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $purchaseId = $row['purchaseId'];
            $totalPrice = $row['totalPrice'];
            $timestamp = $row['purchaseDate']; 


            $sqlItems = "SELECT * FROM purchase_items WHERE purchaseId = '$purchaseId'";
            $resultItems = mysqli_query($con, $sqlItems);

            if ($resultItems && mysqli_num_rows($resultItems) > 0) {
                $items = [];

                while ($item = mysqli_fetch_assoc($resultItems)) {
                    $productId = $item['productId'];
                    $quantity = $item['quantity'];
                    $pricePerUnit = $item['pricePerUnit'];
                    $totalItemPrice = $item['totalPrice'];

                    $productInfo = getProductInfo($con, $productId);

                    $items[] = [
                        'productName' => $productInfo['name'],
                        'quantity' => $quantity,
                        'pricePerUnit' => $pricePerUnit,
                        'totalItemPrice' => $totalItemPrice
                    ];
                }

                $purchases[] = [
                    'purchaseId' => $purchaseId,
                    'totalPrice' => $totalPrice,
                    'timestamp' => $timestamp,
                    'items' => $items
                ];
            }
        }

        echo json_encode($purchases);
    } else {
        return false;
    }
}

function getProductInfo($con, $productId) {
    $sql = "SELECT * FROM products WHERE id = '$productId'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}

?>