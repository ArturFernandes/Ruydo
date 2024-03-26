<?php
require_once 'conexao.php';
$sql = "INSERT INTO users (login, senha, email) VALUES ('$_REQUEST[login]','$_REQUEST[senha]','$_REQUEST[email]')";
mysqli_query($con, $sql);
?>