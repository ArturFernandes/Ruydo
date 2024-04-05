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
    <link rel="stylesheet" href="../style/myAccount.css">
    <script type="module" src="../script/myAccount.js"></script>
</head>

<body id="body">
    <?php
    require "../php/conexao.php";
    @session_start();

    $username = $_SESSION['username'];
    $sql = "SELECT email FROM users WHERE username = '". $username. "'";
    $res = mysqli_query( $con, $sql );
    $row = mysqli_fetch_assoc($res);
    $email = $row['email'];
    $profilePic = '../imgs/vinyl_PNG5-removebg-preview.png';
    
    ?>
    <header>
        <h1 id="titulo"><a href="index.html">Ruydo🎼</a></h1>
        <div id="menuContainer">
            <div id="menu">
                <label>|||</label>
                <div id="container">
                    <div id="inicio"><a href="index.html">Início</a></div>
                    <div><a id="offers">Promoções</a></div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div id="profileContainer">
        
        <div id="profileData">
                <div id="profilePic"><img id="realPic" src=""></div>
                <div id="username"></div>
                <div id="email"></div>
                <button id="changePasswordButton">Mudar Senha</button>
                <div id="changeContainer" style="display: none;">
                    <div id="passwordChange">
                        <input id="oldPassword" name="oldPassword" type="password" placeholder="Senha Antiga"></input>
                        <input id="newPassword" name="newPassword" type="password" placeholder="Nova Senha"></input>
                        <input id="confirmNewPassword" name="newPassword" type="password" placeholder="Confirmar Nova Senha"></input>
                        <button id="submitPasswordChange" type="submit">Confirmar</button>
                    </div>            
                </div>

                <a id="exitAccount" href="../php/logout.php">Sair</a>
            </div>
        </div>    
    </main>
</body>