<?php
    require_once '../php/conection.php';

    if (isset($_POST['category'])) {
        $sql = "SELECT * FROM products WHERE category = '" . $_POST['category'] . "'";
    } else if(isset($_REQUEST['search'])) {
        $sql = "SELECT * FROM products WHERE name LIKE '%$_REQUEST[search]%'";
    } else if (isset($_POST['highlight'])) {
        $sql = "SELECT * FROM products WHERE highlight = '" .$_POST['highlight']. "'";
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