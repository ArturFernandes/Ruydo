<?php
require_once 'conexao.php';

session_start();

if (isset($_SESSION['username'])) {

    $username = $_SESSION['username'];
    $oldPassword = $_REQUEST['oldPassword'];
    $newPassword = $_REQUEST['newPassword'];
    $confirmNewPassword = $_REQUEST['confirmNewPassword'];

    $sqlCheck = "SELECT * FROM users WHERE username='$username' AND password='$oldPassword'";
    $resultCheck = mysqli_query($con, $sqlCheck);

    if(mysqli_num_rows($resultCheck) > 0 && $newPassword === $confirmNewPassword) {
        $sqlUpdate = "UPDATE users SET password='$newPassword' WHERE username='$username'";
        $resultUpdate = mysqli_query($con, $sqlUpdate);

        if ($resultUpdate) {
            header("Location: sucesso.php");
            exit;
        }
    }
} else {
    header("Location: paginaLogin.php");
    exit;
}
?>
