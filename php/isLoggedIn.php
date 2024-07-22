<?php
require_once 'conection.php';

@session_start();

if (isset($_SESSION['username'])) {

    $username = $_SESSION['username'];

    $sql = "SELECT isAdmin FROM users WHERE username = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            if ($row['isAdmin'] == 1) {
                echo 'admin';
            } else {
                echo 'client';
            }
        }
    }

} else {
    echo false; 
}

?>