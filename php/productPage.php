<?php
    require_once '../php/conection.php';

    if(isset($_POST["id"])) {
        $idproduct = $_POST["id"];
        $sql = "SELECT * FROM products WHERE id = $idproduct";
        
        $qr = mysqli_query($con, $sql) or die(mysqli_error($con));
        $result = mysqli_fetch_assoc($qr);        

        echo json_encode($result);
    }
?>