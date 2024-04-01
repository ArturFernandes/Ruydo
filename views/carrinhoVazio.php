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
    <link rel="stylesheet" href="../style/carrinhoVazio.css">
</head>

<body>
    <?php
    require "../php/header.php";
    echo returnHeaders();
    ?>

    <main>
        <div id="mensagemContainer">
            <div id="imgCd"><img src="https://static.thenounproject.com/png/23523-200.png" alt=""></div>
            <div id="mensagemCarrinho">Carrinho Vazio!</div>
            <a href="index.php">Voltar às compras</a>
        </div>
    </main>
</body>