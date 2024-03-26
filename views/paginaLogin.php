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
            body {
                margin: 0;
                padding: 0;
                font-family: 'Montserrat', sans-serif;
                font-weight: 400;
                background: linear-gradient(90deg, rgba(58, 165, 180, 0.12) 0%, rgba(29, 253, 213, 0.16) 50%, rgba(174, 252, 69, 0.11) 100%);
            }

            header {
                color: rgb(17, 24, 77);
                display: flex;
                align-items: center;
                background-color: rgb(150, 219, 197);
                font-size: 1.5rem;
            }

            a {
                text-decoration: none;
                color: black;
            }

            @media (orientation: portrait) {
                #menu {
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
                    background-color: rgba(109, 228, 228, 0.9);
                    z-index: 999;
                    padding: 10px;
                    border-radius: 10px;
                    top: 20px;
                }

                #menu:hover #conteiner {
                    display: block;
                }

                #perfil {
                    display: none;
                }
            }

            #searchBar {
                display: none;
                align-items: center;
            }

            #searchBar input {
                width: 20vw;
                height: 2.1rem;
                font-style: italic;
                color: gray;
                font-size: 1.3rem;
            }

            #searchBar button {
                height: 2.5rem;
                font-size: 1.5rem;
            }

            #titulo {
                font-size: 3rem;
                min-width: 300px;
                text-align: right;
            }

            #carrinho img {
                position: fixed;
                z-index: 1;
                bottom: 5%;
                right: 5%;
                width: 3rem;
                background-color: rgb(150, 219, 197);
                border: 2px solid rgb(93, 158, 137);
                border-radius: 3px;
            }

            #sidebar {
                font-weight: bold;
                background-color: rgba(199, 255, 191, 0.61);
                display: flex;
                flex-direction: row;
                justify-content: space-around;
                font-size: 2rem;
            }

            #sidebar div {
                margin: 10px;
                box-shadow: .5px .5px 2px rgb(78, 78, 47);
                padding: 0px 10px;
                height: 70px;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 5px;
            }

            #radio {
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

            audio {
                height: 50px;
                margin-left: 10px;
            }

            audio::-webkit-media-controls-panel {
                background-color: rgb(150, 219, 197);
                color: rgb(17, 24, 77);
            }

            img {
                width: 300px;
            }

            #loginTela {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .containerLogin,
            .containerCadastro {
                background-color: #ffffff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .containerLogin {
                margin-right: 20px;
            }

            .containerCadastro {
                margin-left: 20px;
            }

            h2 {
                text-align: center;
                margin-bottom: 20px;
                background: #85e6ba8a;
                border-radius: 5px;
                padding: 10px;
            }

            form {
                display: flex;
                flex-direction: column;
            }

            #loginTela input {
                background: #bababa65;
                width: 300px;
                height: 40px;
                margin-bottom: 10px;
                padding: 5px;
                font-size: 1rem;
                border-radius: 5px;
                border: none;
            }

            #loginTela button {
                width: 150px;
                height: 40px;
                font-size: 1rem;
                background-color: #42b883;
                color: #ffffff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }


            @media (orientation: landscape) {
                header {
                    gap: 5%;
                }

                #searchBar {
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

                #perfil img {
                    display: flex;
                    width: 70px;
                }

                #sidebar {
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
            }
        </style>
        <script>

            function testarEmail() {
                let inputEmail = document.getElementById('email')
                let valorEmail = inputEmail.value
                let validarEmail = valorEmail.match(/^[^@]*@[^@]*\.[^@]*$/)

                if (validarEmail == null) {
                    return false
                } else {
                    return true
                }
            }

    </script>
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
                        <div id="minhaConta"><a href="login.html">Minha Conta</a></div>
                        <!-- gastei no paint nesse logo do perfil aqui, vai dizer -->
                        <div id="perfil"><img src="/Ruydo/imgs/vinyl_PNG5-removebg-preview.png" alt=""></div>
                    </div>
                </div>
            </div>
        </header>

        <div id="loginTela">
            <div class="containerLogin">
                <h2>Login</h2>
                <form action="../php/login.php">
                    <input type="text" name="login" placeholder="Nome de usuário" required>
                    <input type="password" name="senha" placeholder="Senha" required>
                    <button type="submit">Entrar</button>
                    <?php
                        if (isset($_REQUEST['msg'])) {
                            echo $_REQUEST['msg'];
                        }
                        ?>
                </form>
            </div>
            <div class="containerCadastro">
                <h2>Cadastro</h2>
                <form action="../php/cadastro.php">
                    <input type="text" name="login" placeholder="Nome de usuário" required>
                    <input type="password" name="senha" placeholder="Senha" required>
                    <input id="email" type="email" name="email" placeholder="Email" required>
                    <button type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </body>
    </html>

    