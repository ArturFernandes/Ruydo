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
        <link rel="stylesheet" href="../style/loginPage.css">

        <script>

            

    </script>
    </head>

    <body>
        <?php
        require "../php/header.php";
        echo returnHeaders();
        ?>

        <div id="loginTela">
            <div class="containerLogin">
                <h2>Login</h2>
                <form id="loginForm" method="post" action="../php/login.php">
                    <input type="text" name="username" placeholder="Nome de usuário" required>
                    <input type="password" name="password" placeholder="Senha" required>
                    <button type="submit">Entrar</button>
                    <?php
                        if (isset($_REQUEST['msg'])) {
                            echo $_REQUEST['msg'];
                        }
                        ?>
                </form>
            </div>
        </div>
    </body>
    </html>

    