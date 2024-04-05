import 'https://code.jquery.com/jquery-3.7.1.min.js';

loadHeader()
export function loadHeader () {
    $.post('../php/isLoggedIn.php', function (data) {
        if(data) {
            $('#container').append('<div id="sessionView"><a href="myAccount.php">Minha Conta</a></div>' + 
                '<div id="perfil"><a href="myAccount.php"><img src="../imgs/vinyl_PNG5-removebg-preview.png" alt=""></a></div>')
        } else {
            $('#container').append('<div id="sessionView"><a href="paginaLogin.php">Login</a></div>' +
                '<div id="sessionView"><a href="registerPage.php">Cadastro</a></div>')
        }
    })
};