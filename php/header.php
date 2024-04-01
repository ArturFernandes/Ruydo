<?php
@session_start();

function returnHeaders() {
    $sessionView = isLogedIn();
    $header = '
        <header>
            <h1 id="titulo"><a href="index.php">Ruydo🎼</a></h1>
            <div id="menuContainer">
                <div id="menu">
                    <label>|||</label>
                    <div id="container">
                        <div id="inicio"><a href="index.php">Início</a></div>
                        <div><a href="?highlight=1">Promoções</a></div>
                        '. $sessionView .'
                    </div>
                </div>
            </div>
        </header>
    ';
    return $header;
}

function isLogedIn() {
    if (isset($_SESSION['username'])) {
        return '<div id="sessionView"><a href="myAccount.php">Minha Conta</a></div>
                <div id="perfil"><a href="myAccount.php"><img src="../imgs/vinyl_PNG5-removebg-preview.png" alt=""></a></div>';
    } else {
        return '<div id="sessionView"><a href="paginaLogin.php">Login</a></div><div id="sessionView"><a href="registerPage.php">Cadastro</a></div>';
    }
}
?>