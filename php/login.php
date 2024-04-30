<?php
require_once 'conection.php';

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
                $user_email= $ln['email'];
                $user_id = $ln['id'];
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $user_email;
                echo('200');
                exit();   
            }            
        } else {
            echo('401');
            exit();
        }
    }
}
?>