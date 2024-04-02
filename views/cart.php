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

    
</head>

<body>
    <?php
    require "../php/header.php";
    require "../php/addCart.php";
    echo returnHeaders();
    ?>

    <div id="cartContainer">
        <div id="compras">
            <div id="products">
                <?php
                    if(count($_SESSION['cart'])==0){
                        header("Location: cartVazio.php");
                        exit();
                    } else {
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $id => $qtd) {
                                $sql = "SELECT * FROM products WHERE id = '$id'";
                                $qr = mysqli_query($con, $sql) or die(mysqli_error($con));
                                while ($ln = mysqli_fetch_assoc($qr)) {
                                    echo '
                                        <div class="produto">
                                            <img src="' . $ln['image'] . '" alt="">
                                            <div class="nomeItem">' . $ln['name'] . '</div>
                                            <div class="preco">' . $ln['price'] . '</div>
                                            <div>Subtotal: ' . $ln['price'] * $qtd . '</div>
                                            <a href="?acao=remove&id='.$id.'">Remover</a>
                                        </div>';
                                }
                            }
                        }
                    }
                ?>

            </div>
                <div id="linha"></div>
                <div id="total">
                    <?php
                        $total = 0;
                        foreach ($_SESSION['cart'] as $id => $qtd) {
                            $sql = "SELECT * FROM products WHERE id = '$id'";
                            $qr = mysqli_query($con, $sql) or die(mysqli_error($con));
                            while ($ln = mysqli_fetch_assoc($qr)) {
                                $total += $ln['price'] * $qtd;
                            }
                        }

                        echo "Total: R$".$total.",00";
                    ?>
                </div>
                <div id="linha"></div>
        </div>

        <div id="containerCompras">
            <div id="confirmarCompra"><a href="../php/confirmBuy.php">Confirmar Compra</a></div>
            <div id="continuarComprando"><a href="index.php"> ⬅Continuar Comprando</a></div>
        </div>
    </div>
</body>
</html>