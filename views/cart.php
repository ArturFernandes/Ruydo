<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🎼Ruydo - A sua loja de discos!</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/cart.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="module" src="../script/cart.js"></script>    
</head>

<body>
    <?php
    require "../php/header.php";
    require "../php/cart.php";
    echo returnHeaders();
    ?>
    <div id="cartContainer">
        <div id="compras">
            <div id="products">
            </div>
        </div>

        <div id="containerCompras">
            <div id="confirmarCompra"><a href="../php/confirmBuy.php">Confirmar Compra</a></div>
            <div id="continuarComprando"><a href="index.php"> ⬅Continuar Comprando</a></div>
        </div>
    </div>
</body>
</html>