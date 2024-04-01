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
    <link rel="stylesheet" href="../style/index.css">
    <script src="../script/views.js"></script>

</head>


<body>
<div id="notification"></div>

    <?php
    require "../php/header.php";
    echo returnHeaders();

    ?>
    <div id="carrinho"><a href="carrinho.php"><img src="https://cdn-icons-png.flaticon.com/512/57/57451.png?w=360" alt=""></a></div>
    <main>        
        <nav id="sidebar">
            <div ><a href="?category=cd">💿<p>CDs</p></a></div>
            <div ><a href="?category=vinyl">💽<p>LPs</p></a></div>
            <div ><a href="?category=audio">🎧<p>Audio</p></a></div>
            <div ><a href="?category=merch">🧥<p>Merch</p></a></div>
        </nav>

        <div id="produtosContainer">
            <div id="searchBar">
                <form action=""><input type="text" name="busca" placeholder="O que você quer ouvir?"><button>🔎</button></form>
            </div>
            <div class="produtos">
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
                while ($ln = mysqli_fetch_assoc($qr)) {
                    echo '<div class="produto" id="' . $ln['id'] . '"><a href="produto.php?id='. $ln['id'] .'"><img src="' . $ln['image'] . '" alt=""></a><div class="nomeItem">' . $ln['name'] . '<div class="preco">' . $ln['price'] . '</div><a href="carrinho.php?acao=add&id=' . $ln['id'] . '" class="comprar">Comprar</a><a id="addCarrinho" class="comprar" onclick="addToCart('.$ln['id'].')">Adicionar ao carrinho</a></div></div>';
                }
            ?>
            </div>
        </div>
    </main>
</body>
</html>