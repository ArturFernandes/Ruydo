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
    <link rel="stylesheet" href="../style/sucesso.css">
</head>

<body>
    <?php
    require "../php/header.php";
    @session_start();
    echo returnHeaders();
    ?>

    <main>
        <div id="sucessoContainer">
            <div id="imgSucesso"><img src="../imgs/Eo_circle_green_checkmark.svg.png" alt=""></div>
            <div id="mensagemSucesso">
                Compra Confirmada! Um email foi enviado a sua conta com a confirmação do pedido.
            </div>
        </div>
    </main>
</body>