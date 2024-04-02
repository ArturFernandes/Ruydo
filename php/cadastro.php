<?php
require_once 'conexao.php';

$username = isset($_REQUEST['username']) ? trim($_REQUEST['username']) : '';
$email = isset($_REQUEST['email']) ? trim($_REQUEST['email']) : '';
$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';

$sql_check = "SELECT * FROM users WHERE username='$username' OR email='$email'";
$result_check = mysqli_query($con, $sql_check);


if(mysqli_num_rows($result_check) > 0) {
    header("Location: ../views/registerPage.php?error=user_exists");
    exit;
} else {
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql_insert = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashed_password', '$email')";
    mysqli_query($con, $sql_insert);

    header('Location: ../views/index.php');
    exit;
}
?>
