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

if(isset($_GET['acao'])) {
    if($_GET['acao'] == 'add') {
        $id = intval($_GET['id']);
        if(!isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] = 1;
        } else {
            $_SESSION['cart'][$id] += 1;
        }
    }

    if ($_GET['acao'] == 'remove') {
        $id = intval($_GET['id']);
        $item_removed = false; 
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($key === $id && !$item_removed) {
                unset($_SESSION['cart'][$key]);
                $item_removed = true;
            }
        }
    }
}
?>