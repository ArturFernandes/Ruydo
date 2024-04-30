<?php
require_once 'conection.php';

$productId = isset($_POST['id']) ? $_REQUEST['id'] : false;

if (!$productId) {
   echo '401';
   exit();

} else {
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $productId);

        if (mysqli_stmt_execute($stmt)) {
            echo '200'; 
        } else {
            echo '403'; 
        }

        mysqli_stmt_close($stmt);
    }

}
?>