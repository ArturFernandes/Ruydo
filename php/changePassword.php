<?php
require_once 'conexao.php';

session_start();

if (isset($_SESSION['username'])) {

    $username = filter_var($_REQUEST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_REQUEST['password'], FILTER_SANITIZE_STRING);

    $sqlCheck = "SELECT * FROM users WHERE username='$username' AND password='$oldPassword'";
    $resultCheck = mysqli_query($con, $sqlCheck);
    if(mysqli_num_rows($resultCheck)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sqlUpdate = "UPDATE users SET password='$newPassword' WHERE username='$username'";
        $resultUpdate = mysqli_query($con, $sqlUpdate);

        if ($resultUpdate) {
            echo "200";
        }
    }
} else {
    echo "401";
}
?>
