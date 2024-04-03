<?php
    require_once '../php/conexao.php';

    if(isset($_GET["id"])) {
        $idProduto = $_GET["id"];
        $sql = "SELECT * FROM products WHERE id = $idProduto";
        
        $qr = mysqli_query($con, $sql) or die(mysqli_error($con));
        while ($ln = mysqli_fetch_assoc($qr)) {
            $result[] = $ln;
        }

        echo json_encode($result);
    }
?>