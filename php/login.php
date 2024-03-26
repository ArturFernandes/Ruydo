<?php
require_once 'conexao.php';
$sql = "SELECT * FROM users WHERE login = '$_REQUEST[login]' AND senha = '$_REQUEST[senha]'";
$res = mysqli_query( $con, $sql );
if (mysqli_num_rows($res) == 1) {
    session_start();
    $_SESSION['login'] = $_REQUEST['login'];
    header('location: ../views/index.php');
    exit();
}
else {
    header('location: ../views/paginaLogin.php?msg= Login e/ou senha inválidos');
}
?>