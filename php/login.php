<?php
require_once 'conexao.php';

if(isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
    $username = filter_var($_REQUEST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_REQUEST['password'], FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($con, $sql);

    if($stmt) {
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) == 1) {
            $ln = mysqli_fetch_array($result);
            if(password_verify($password, $ln['password'])){
                session_start();
                $row = mysqli_fetch_assoc($result);
                $user_email= $row['email'];
                $user_id = $row['id'];
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                header('location: ../views/index.html');
                exit();   
            }            
        } else {
            header('location: ../views/paginaLogin.php?msg=Login e/ou senha inválidos');
            exit();
        }
    }
}
?>