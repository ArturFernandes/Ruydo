<?php
require_once 'conection.php';

$username = isset($_REQUEST['username']) ? filter_var($_REQUEST['username'], FILTER_SANITIZE_STRING) : false;
$email = isset($_REQUEST['email']) ? filter_var($_REQUEST['email'], FILTER_SANITIZE_STRING) : false;
$password = isset($_REQUEST['password']) ? filter_var($_REQUEST['password'], FILTER_SANITIZE_STRING) : false;

if(!($username && $email && $password)) {
    echo '401';
    exit();
}

$sqlCheck = "SELECT * FROM users WHERE username='$username' OR email='$email'";
$resultCheck = mysqli_query($con, $sqlCheck);

if(mysqli_num_rows($resultCheck) > 0) {
    echo '401';
    exit;
} else {
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sqlInsert = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashedPassword', '$email')";
    mysqli_query($con, $sqlInsert);

    echo '200';
    exit;
}
?>
