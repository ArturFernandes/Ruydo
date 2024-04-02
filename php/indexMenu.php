<?php
    require_once '../php/conexao.php';

    if (isset($_GET['category'])) {
        $sql = "SELECT * FROM products WHERE category = '" . $_GET['category'] . "'";
    } else if(isset($_REQUEST['busca'])) {
        $sql = "SELECT * FROM products WHERE name LIKE '%$_REQUEST[busca]%'";
    } else if (isset($_GET['highlight'])) {
        $sql = "SELECT * FROM products WHERE highlight = '" .$_GET['highlight']. "'";
    } else {
        $sql = "SELECT * FROM products";
    }

    $qr = mysqli_query($con, $sql) or die(mysqli_error($con));

    $results = array();

    while ($ln = mysqli_fetch_assoc($qr)) {
        $results[] = $ln;
    }
    $numResults = count($results);

    if ($numResults > 0) {
        echo json_encode($results);
    }
?>