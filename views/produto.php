<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🎼Ruydo - A sua loja de discos!</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/product.css">
    <script src="../script/views.js"></script>

</head>

<body>
<div id="notification"></div>
<?php
    require "../php/header.php";
    echo returnHeaders();
    ?>
    <div id="cart"><a href="cart.php"><img src="https://cdn-icons-png.flaticon.com/512/57/57451.png?w=360" alt=""></a></div>
    <main>        
        <div id="content">
                <?php
                    require_once '../php/conexao.php';

                    if(isset($_GET["id"])) {
                        $idProduto = $_GET["id"];
                        $sql = "SELECT * FROM products WHERE id = $idProduto";
                        
                        $qr = mysqli_query($con, $sql) or die(mysqli_error($con));
                        while ($ln = mysqli_fetch_assoc($qr)) {
                            echo '<div class="produto" id="prod1"><img src="'. $ln['image'].'" alt=""></div>';
                            echo '<div id="descricao"><div id="nomeProduto"> '. $ln['name'].'</div></div>';
                        }
                    }
                ?>
            <?php
                if(isset($_GET["id"])) {
                    $idProduto = $_GET["id"];
                    $sql = "SELECT * FROM products WHERE id = $idProduto";
                    
                    $qr = mysqli_query($con, $sql) or die(mysqli_error($con));
                    while ($ln = mysqli_fetch_assoc($qr)) {
                        echo '<div class="nomeItem">
                                <div class="preco">
                                    '. $ln['price'].'
                                </div>
                                <div class="buyingButtons">
                                    <a href="cart.php?acao=add&id=' . $ln['id'] . '" class="comprar">
                                        Comprar</a>
                                    <a id="addCart" class="comprar" onclick="addToCart('.$ln['id'].')">Adicionar ao cart</a>
                                    </a>
                                </div>
                            </div>';
                    }
                }
            ?>
            
    </main>
    

</body></html>