<?php
session_start();
require_once '../php/conexao.php';

if(!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}   

if(isset($_GET['acao'])) {

    if($_GET['acao'] == 'add') {
        $id = intval($_GET['id']);
        if(!isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id] = 1;
        } else {
            $_SESSION['carrinho'][$id] += 1;
        }
    }

    if($_GET['acao'] == 'remove') {
        $id = intval($_GET['id']);
        if(isset($_SESSION['carrinho'][$id])) {
            unset($_SESSION['carrinho'][$id]);
        }
    }

    if($_GET['acao'] == 'up') {
        if(is_array($_POST['prod'])) {
            foreach($_POST['prod'] as $id => $qtd) {
                $id = intval($id);
                $qtd = intval($qtd);
                if(!empty($qtd) || $qtd <> 0) {
                    $_SESSION['carrinho'][$id] = $qtd;
                } else {
                    unset($_SESSION['carrinho'][$id]);
                }
            }
        }
    }
}
?>

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
    

    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
            background: rgb(58,165,180);
            background: linear-gradient(90deg, rgba(58,165,180,0.11808473389355745) 0%, rgba(29,253,213,0.16290266106442575) 50%, rgba(174,252,69,0.10688025210084029) 100%);
            font-weight: 400;
        }
        
        header{
            color: rgb(17, 24, 77);
            display: flex;
            background-color: rgb(150, 219, 197);
            align-items: center;

            font-size: 1.5rem;

            box-sizing: border-box;
        }

        a {
            text-decoration: none;
            color: black;
        }

        

        @media (orientation: portrait) {
            #menu{
                position: absolute;
                right: 50px;
                top: 50px;
                text-align: right;            
             }

             #conteiner {
                display: none;
                position: relative;
                font-size: 25px;
                line-height: 100px;
                background-color: rgba(109, 228, 228, 0.897);
                z-index: 999;
                padding: 10px;
                border-radius: 10px;
                top: 20px;
            }

            #menu:hover #conteiner{
                display: block;    
            }

            #perfil {
                display: none;
            }
        }        

        #searchBar{
            display: none;
            align-items: center;           
        }

        #searchBar input{
            width: 20vw;
            height: 2.1rem;
            font-style: italic;
            color: gray;
            font-size: 1.3rem;

        }
    
        #searchBar button{
            height: 2.5rem;
            font-size: 1.5rem;
        }


        #titulo{
            font-size: 3rem;
            min-width: 300px;
            text-align: right;
        }

        
        #carrinho img{
            position: fixed;
            z-index: 1;
            bottom: 5%;
            right: 5%;
            width: 3rem;
            background-color: rgb(150, 219, 197);
            border: 2px solid rgb(93, 158, 137);
            border-radius: 3px 3px 3px 3px;
        }

        #sidebar{
            font-weight: bold;
            background-color: rgba(199, 255, 191, 0.61);

            display: flex;
            flex-direction: row;
            justify-content:space-around;
            font-size: 2rem;
        }   

        #sidebar div{
            margin: 10px;
            box-shadow: .5px .5px 2px rgb(78, 78, 47);
            padding: 0px 10px 0px;
            height: 70px;
            display: flex;
            justify-content: center;
            align-items: center;

            border-radius: 5px;
        }


        #radio{
            position: absolute;
            display: flex;
            flex-direction: column;
            height: 80px;
            width: 100%;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;

            font-size: 1.5rem;

            background-color: rgb(210, 250, 237);
            border-radius: 0px 0px 15px 15px;
            padding: 10px;
        }

        audio{
            height: 50px;
            margin-left: 10px;
        }

        audio::-webkit-media-controls-panel{
            background-color: rgb(150, 219, 197);
            color: rgb(17, 24, 77);

        }

        img{
            width: 300px;
        }

        .produto, #confirmarCompra, #continuarComprando{
            font-size: 35px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #produtos{
            gap: 20px;
        }

        #produtos > div{
            border: 1px solid rgb(105, 84, 84);
            padding: 15px
        }


        #compras {
            display: flex;
            width: 100%;
            align-items: center;
            padding: 20px;
            gap: 20px;
        }

        #nomeItem{
            width: 100%;
            font-size: 20px;
        }

        #conteinerCompras {
            display: flex;
            flex-direction: column-reverse;
        }

        #conteinerCompras div{
            background-color: rgb(241, 186, 98);
            margin: 15px;
        }

        #linha{
            border: 1px solid black;
            width: 100%
        }

        #total{
            font-size: 40px;
        }


        @media (orientation: landscape){
            #carrinho img {
                width: 4rem;
                bottom: 10%;
            }

            header {
                gap: 5%;
            }

            #searchBar{
                display: flex;
            }

            #menu label {
                display: none
            }

            #conteiner {
                display: flex;
                justify-content: space-between;
                align-items: center;
                right: 0;
                gap: 4vw;
            }
            
            #perfil img{
                display: flex;
                width: 70px;
            }

            #sidebar{
                flex-direction: column;
                height: 600px;
                position: relative;
                border-radius: 0px 0px 15px 0px;
            }

            main {
                display: flex;
            }

            #radio {
                height: 50px;
                width: 500px;
                left: 40%;
            }

            #compras img{
            width: 200px;
            }

            .produto, #confirmarCompra, #continuarComprando{
                width: 500px;
                height: 200px;
                font-size: 30px;
                display: grid;
                display: flex;
                align-items: center;
            }

            #produtos{
                display: flex;
                flex-direction: column;
                justify-content: space-around;
                width: 90%;
            }

            #preco{
                font-weight: bold;
                line-height: 50px;
            }

            #linha{
                border: 1px solid black;
                width: 100%
            }

            #conteinerCompras{
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                width: 100%;
            }

            #confirmarCompra, #continuarComprando{
                flex-direction: row;
                align-items: center;
                justify-content: center;
                background-color: orange;
                border-radius: 15px;
            }

            #produtos div{
                flex-direction: row;
                width: 100%;
            }
                        
        }

        #compras{
            position: relative;
            top: 90px;
            margin: 0 auto;
            display: flex;
            flex-direction:column;
            align-items: center;
            justify-content: space-between;
            background-color: rgb(198, 198, 198);
            width: 90%;
            height: 100%;
        }

        
        a{
            text-decoration: none;
            color: black;
        }

    </style>
</head>

<body>
    <header>
        <h1 id="titulo"><a href="index.php">Ruydo🎼</a></h1>
        <div id="searchBar"><input type="text" placeholder="O que você quer ouvir?"><button>🔎</button></div>        
        <div id="menuConteiner">
            <div id="menu"><label>|||</label>
                <div id="conteiner">
                    <div id="inicio"><a href="">Início</a></div>
                    <div><a href="">Promoções</a></div>
                    <div><a href=""> Fale Conosco</a></div>
                    <div id="minhaConta"><a href="">Minha Conta</a></div>
                    <!-- gastei no paint nesse logo do perfil aqui, vai dizer -->
                    <div id="perfil"><img src="/Ruydo/imgs/vinyl_PNG5-removebg-preview.png" alt=""></div>
                </div>
        </div>
        
             
        </div>
    </header>
    <div id="compras">
        <div id="produtos">
            <?php
                if(count($_SESSION['carrinho'])==0){
                    echo '<div class = "nomeItem">Não há produtos no carrinho</div>';
                } else {
                    if (isset($_SESSION['carrinho'])) {
                        foreach ($_SESSION['carrinho'] as $id => $qtd) {
                            $sql = "SELECT * FROM produtos WHERE id = '$id'";
                            $qr = mysqli_query($con, $sql) or die(mysqli_error($con));
                            while ($ln = mysqli_fetch_assoc($qr)) {
                                echo '<div class = "produto"><img src="' . $ln['imagem'] . ' alt=""><div class="nomeItem">'. $ln['nome'] .'</div><input type="text" size = "3" name = "prod['.$id.']" value="'.$qtd.'"><div class="preco">'. $ln['preco'] .'</div><div>Subtotal: '.$ln['preco'] * $qtd.'</div><a href="?acao=remove&id='.$id.'">Remover</a></div>';
                            }
                        }
                    }
                }
            ?>

            
        </div>
        <div id="linha"></div>
        <div id="total">Total a pagar: R$ 300,00</div>
        <div id="linha"></div>
        <div id="conteinerCompras">
            <div id="continuarComprando"><a href="index.php"> ⬅Continuar Comprando</a></div>
            <div id="confirmarCompra">Forma de Pagamento</div>
        </div>
    </div>
    
</body>
</html>