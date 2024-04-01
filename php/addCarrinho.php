<?php
@session_start();
require_once '../php/conexao.php';

if(!isset($_SESSION['username'])) {
    header("Location: ../views/paginaLogin.php");
    exit();
}   

if(!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}   

if(isset($_GET['acao'])) {

    if($_GET['acao'] == 'add') {
        $id = intval($_GET['id']);
        if(!isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id] = 1;
        } else {
            $_SESSION['carrinho'][$id] += 1;
        }
    }

    if ($_GET['acao'] == 'remove') {
        $id = intval($_GET['id']);
        $item_removed = false; 
        foreach ($_SESSION['carrinho'] as $key => $value) {
            if ($key === $id && !$item_removed) {
                unset($_SESSION['carrinho'][$key]);
                $item_removed = true;
            }
        }
    }
}
?>