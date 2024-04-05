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
        <link rel="stylesheet" href="../style/register.css">

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

    <body id="body">
    <?php
        require "../php/header.php";
        echo returnHeaders();
    ?>

        <div id="loginTela">
            <div class="containerCadastro">
                <h2>Cadastro</h2>
                <form id="registerForm" action="../php/cadastro.php">
                    <input type="text" name="username" placeholder="Nome de usuário" required>
                    <input type="password" name="password" placeholder="Senha" required>
                    <input id="email" type="email" name="email" placeholder="Email" required>
                    <button type="submit">Cadastrar</button>
                    <?php
                    if (isset($_GET['error']) && $_GET['error'] == 'user_exists') {
                        echo "<p>Usuário já cadastrado!.</p>";
                    }
                    ?>                    
                </form>
            </div>
        </div>
    </body>
    </html>

    