import * as main from './main.js';

$(document).ready(function () {
    $.post('../php/changePassword.php', function(data) {
        console.log(data)
    })

    displayProfileData()

    $('#changePasswordToggle').click(function() {
        $('#changeContainer').css('display') === 'flex'? $('#changeContainer').css('display', 'none') : $('#changeContainer').css('display', 'flex');
        $('#changePasswordToggle').css('display', 'none');
    });

    $('#passwordChange').on('submit', function(event) {
        let oldPassword = $('#oldPassword').val();
        let newPassword = $('#newPassword').val();
        changePassword(oldPassword, newPassword);
        event.preventDefault();
    })

});

function changePassword(oldPassword, newPassword) {
    $.post('../php/changePassword.php', { action : 'changePassword', password : oldPassword, newPassword : newPassword}, function(data) {
        data == '200'? main.showNotification('Senha alterada com sucesso!', true) : main.showNotification('Senha atual incorreta!', false);
    }) 
}

function displayProfileData() {
    $.post('../php/changePassword.php', { action : 'displayProfile' } , function(data) {
        var profile = data? JSON.parse(data): false;
        $('#realPic').attr("src","../imgs/vinyl_PNG5-removebg-preview.png");
        $('#username').text(profile.username);
        $('#email').text(profile.email);
    })
}

export function testarEmail() {
    let valorEmail = $('#email').val()
    let validarEmail = valorEmail.match(/^[^@]*@[^@]*\.[^@]*$/)

    if (validarEmail == null) {
        return false
    } else {
        return true
    }
}


