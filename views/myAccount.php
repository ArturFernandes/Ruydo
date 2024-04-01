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
    <script src="../script/views.js"></script>
</head>

<body>
    <?php
    require "../php/header.php";
    require "../php/conexao.php";
    require "../php/trocaSenha.php";
    echo returnHeaders();

    $username = $_SESSION['username'];
    $sql = "SELECT email FROM users WHERE username = '". $username. "'";
    $res = mysqli_query( $con, $sql );
    $row = mysqli_fetch_assoc($res);
    $email = $row['email'];
    $profilePic = '../imgs/vinyl_PNG5-removebg-preview.png';
    
    ?>
    <main>
        <div id="profileContainer">
        <?php
        echo '<div id="profileData">
                <div id="profilePic"><img src="' . $profilePic .'"></div>
                <div id="username">'. $username .'</div>
                <div id="email">'. $email .'</div>';
        ?>
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