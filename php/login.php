<?php
require_once 'conexao.php';

if(isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
    $username = filter_var($_REQUEST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_REQUEST['password'], FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($con, $sql);

    if($stmt) {
        mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) == 1) {
            session_start();
            $row = mysqli_fetch_assoc($result);
            $user_id = $row['id'];
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            header('location: ../views/index.php');
            exit();
        } else {
            header('location: ../views/paginaLogin.php?msg=Login e/ou senha inválidos');
            exit();
        }
    }
}
?>