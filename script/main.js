import 'https://code.jquery.com/jquery-3.7.1.min.js';

loadHeader()
export function loadHeader () {
    $.post('../php/isLoggedIn.php', function (data) {
        if(data) {
            $('#container').append('<div id="sessionView"><a href="myAccount.html">Minha Conta</a></div>' + 
                '<div id="perfil"><a href="myAccount.html"><img src="../imgs/vinyl_PNG5-removebg-preview.png" alt=""></a></div>')
        } else {
            $('#container').append('<div id="sessionView"><a href="paginaLogin.php">Login</a></div>' +
                '<div id="sessionView"><a href="registerPage.php">Cadastro</a></div>')
        }
    })
};

export function showNotification(message, color) {
    var notification = $("#notification");
    notification.text(message);
    notification.css("display", "block");

    if (color) {
        notification.css("background-color", "#9bf098ab");
        setTimeout(function() {
            notification.css("display", "none");
        }, 2000);
    } else {
        notification.css("background-color", "#ec876dab");
        setTimeout(function() {
            notification.css("display", "none");
        }, 2000);
    }
}
