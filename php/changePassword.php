<?php
require_once 'conexao.php';

session_start();



if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $sqlCheck = "SELECT * FROM users WHERE username=?";
    $stmtCheck = mysqli_prepare($con, $sqlCheck);
    mysqli_stmt_bind_param($stmtCheck, "s", $username);
    mysqli_stmt_execute($stmtCheck);
    $resultCheck = mysqli_stmt_get_result($stmtCheck);
    
    while ($ln = mysqli_fetch_assoc($resultCheck)) {
        $userData[] = $ln;
    };

    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'changePassword') {
            $password = filter_var($_REQUEST['password'], FILTER_SANITIZE_STRING);
            $newPassword = filter_var($_REQUEST['newPassword'], FILTER_SANITIZE_STRING);
    
            if($resultCheck) {
                if(password_verify($password, $userData['password'])) {
                    $hashed_newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                    $sqlUpdate = "UPDATE users SET password='$hashed_newPassword' WHERE username='$username'";
                    $stmtUpdate = mysqli_prepare($con, $sqlUpdate);
                    mysqli_stmt_bind_param($stmtUpdate, "ss", $hashed_newPassword, $username);
                    mysqli_stmt_execute($stmtUpdate);
                    echo '200';
                } else {
                    echo "403";
                }
            }
        } else if ($_POST['action'] == 'displayProfile') {
            while ($ln = mysqli_fetch_assoc($resultCheck)) {
                $userData[] = $ln;
            };
            echo json_encode($userData);
        }
    }    
}

?>
