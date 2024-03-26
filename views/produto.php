<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🎼Ruydo - A sua loja de discos!</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&amp;display=swap" rel="stylesheet">
    

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
            justify-content: space-between;

            font-size: 1.5rem;

            box-sizing: border-box;
        }

        a {
            text-decoration: none;
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

            #descricao{
                display: flex;
                flex-direction: column;
                width: 100%;
                max-width:600px;
                font-size: 20px;
                border-radius: 20px;
                background-color: rgb(211, 211, 211);
            }

            #nomeProduto {
                font-size: 40px;
                width: 100%;
            }

            .produtos{
                width: 100%;
            }

            table{
                display: none;
            }

            #nomeProduto {
                max-width: 500px;
                margin: 0 auto;
                display: flex;
            }

            #descricaoLorem {
                max-width: 400px;
                margin: 0 auto;
                display: flex;
            }

            #fotoArtista{
                margin-top: 20px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            #fotoArtista img{
                width: 100%;
                max-width: 400px;
                box-shadow: 0 0 10px black;

            }

            #nomeItem{
                margin-bottom: 30px;
            }
        }        

        #searchBar{
            display: none;
            align-items: center;           
        }

        #searchBar input{
            width: 25rem;
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

        input {
            width: 80%;
        }

        .produtos{
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        

        .produto{
            position: relative;
            top: 45px;
            display: flex;
            flex-direction: column;
            align-items: center;

            justify-content: space-evenly;

            height: 500px;

            padding: 10px;
        }
        .produto img{
            width: 400px;
            border-radius: 10px;
            box-shadow: 0 0 10px black;
        }

        #avaliacoes {
            width: 100%;
            height: 500px;
        }

        .comprar {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgb(243, 193, 101);
            border-radius: 5px;
            
            max-width: 408px;
            max-height: 366px;
        }

        .nomeItem {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            text-align: center;
            font-size: 30px;
            width: 100%;
        }

        .preco del{
            color: red;
            font-size: 25px;
        }

        #avaliacoes{
            font-size: 30px;
            background-color: rgb(174, 174, 174);
            height: 200px;
        }
        
        @media (max-width: 684px){
            #sidebar div p {
                display: none;
            }
        }

        @media (orientation: landscape){
            #carrinho img {
                width: 4rem;
                bottom: 10%;
            }

            header {
                gap: 5%;
            }

            #perfil img{
                display: flex;
                width: 70px;
            }

            #searchBar{
                position: relative;
                display: flex;
                left: -270px;
            }

            .produtos{
                position: relative;
                display: flex;
                flex-direction: row;
                top: 105px;
                width: 60%;
                justify-content: space-around;
                align-items: flex-start;
                gap: 5px;
                background-color: rgb(228, 234, 232);
                margin: 20px;
                padding: 10px;
                border-radius: 20px
            }

            #descricao {
                width: 500px;      
            }            

            #descricao table {
                width: 100%;     
                max-width: 500px; 
            }

            .produto img{
                position: relative;
                top: -50px;
                width: 500px;
            }
            
            .nomeItem{
                max-width: 500px;
                position: relative;
                left: 40px;
                top: -200px;
            }

            #menu label {
                display: none
            }

            #menuConteiner{
                position: relative;
                left: -400px;
            }

            #conteiner {
                display: flex;
                flex-flow: row;
                justify-content: space-evenly;
                align-items:stretch;
                width: 360px;
                gap: 40px;
            }
            
            #perfil{
                display: flex;
            }

            #sidebar{
                flex-direction: column;
                height: 600px;
                position: relative;
                border-radius: 0px 0px 15px 0px;
            }

            #descricao{
                display: flex;
                flex-wrap: wrap;
                height: 800px;
                flex-direction: column;
                gap: 100px;
            }

            #descricaoLorem{
                font-size: 30px;
            }

            #nomeProduto{
                font-size: 40px;
            }

            #fotoArtista{
                position: relative;
                top: -59px;
                font-size: 30px;
                height: 300px
            }

            #fotoArtista p {
                width: 0;
            }

            #fotoArtista img{
                width: 400px;
                box-shadow: 0 0 10px black;
            }


            #radio {
                height: 50px;
                width: 500px;
                left: 40%;
            }

            #descricao table{
            display: grid;
            justify-content: center;
            font-size: 20px;
            background-color: rgb(255, 249, 244);
            padding: 30px;
            border-radius: 15px;
            border: 5px rgb(98, 98, 245) solid;
            width: 100%;
            max-width: 450px;
        }

        table td{
            font-size: 20px;
            border-bottom: 1px solid black;
            margin: 0;
            box-sizing: border-box;
        }
        }

        @media (min-width: 1228px) and (max-width: 1740px){
            #descricao table {
                display: none;
            }

            #descricaoLorem {
                font-size: 25px;
            }

            #searchBar {
                display: none;
            }

            .produtos{
                width: 1035px;
            }

            #nomeItem {
                position: absolute;
                right: 0;
            }

            #fotoArtista {
                display: none;
            }
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
    <div id="carrinho"><a href="carrinho.php"><img src="https://cdn-icons-png.flaticon.com/512/57/57451.png?w=360" alt=""></a></div>
    <main>        
        <div id="radio">Rádio Ruydo<audio src="/Ruydo/media/vagabundo nao e facil.mp3" controls="">Seu navegador não gosta de música</audio></div>
        <div id="conteinerPortrait">
            <div class="produtos">
                <?php
                    require_once '../php/conexao.php';

                    if(isset($_GET["produto"])) {
                        $idProduto = $_GET["produto"];
                        $sql = "SELECT * FROM produtos WHERE id = $idProduto";
                        
                        $qr = mysqli_query($con, $sql) or die(mysqli_error($con));
                        while ($ln = mysqli_fetch_assoc($qr)) {
                            echo '<div class="produto" id="prod1"><img src="'. $ln['imagem'].'" alt=""></div>';
                            echo '<div id="descricao"><div id="nomeProduto"> '. $ln['nome'].'</div>';
                        }
                    }
                ?>
                    <div id="descricaoLorem">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>
                    <table>
                        <tr>
                            <th>Músicas</th>
                            <th>Duração</th>
                        </tr>
                        <tr>
                            <td>"Helena"</td>
                            <td>5:00</td>
                        </tr>
                        <tr>
                            <td>"To the End</td>
                            <td>5:00</td>
                        </tr>
                        <tr>
                            <td>"You Know What They Do to Guys Like Us in Prison"</td>
                            <td>5:00</td>
                        </tr>
                        <tr>
                            <td>"I'm Not Okay (I Promise)"</td>
                            <td>5:00</td>
                        </tr>
                        <tr>
                            <td>"The Ghost of You"</td>
                            <td>5:00</td>
                        </tr>
                        <tr>
                            <td>"The Jetset Life Is Gonna Kill You"</td>
                            <td>5:00</td>
                        </tr>
                        <tr>
                            <td>"Interlude"</td>
                            <td>5:00</td>
                        </tr>                        
                    </table>
                </div>
            </div>
        </div>
            <?php
                if(isset($_GET["produto"])) {
                    $idProduto = $_GET["produto"];
                    $sql = "SELECT * FROM produtos WHERE id = $idProduto";
                    
                    $qr = mysqli_query($con, $sql) or die(mysqli_error($con));
                    while ($ln = mysqli_fetch_assoc($qr)) {
                        echo '<div class="nomeItem">'. $ln['nome'].' <div class="preco">'. $ln['preco'].'<a href="carrinho.php?acao=add&id=' . $ln['id'] . '" class="comprar">Adicionar ao carrinho</a></div>';
                    }
                }

            ?>
    </main>
    <div id="avaliacoes">
        <div>Comentários: <p>
            <div>Avaliacoes ⭐⭐⭐⭐⭐ todas</div>
        </div>
    </div>

</body></html>