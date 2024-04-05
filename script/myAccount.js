import './main.js';

$(document).ready(function () {
    const changePasswordButton = document.getElementById('changePasswordButton');
    const changeContainer = document.getElementById('changeContainer');
    $.post('../php/changePassword.php', function(data) {
        console.log(data)
    })

    displayProfileData()

    changePasswordButton.addEventListener('click', function() {
        changeContainer.style.display == 'flex'?  changeContainer.style.display == 'none' :  changeContainer.style.display = 'flex';
        changePasswordButton.style.display = 'none';
    });
});

function displayProfileData() {
    $.post('../php/changePassword.php', { action : 'displayProfile' } , function(data) {
        var profile = data? JSON.parse(data): false;
        $('#realPic').attr("src","../imgs/vinyl_PNG5-removebg-preview.png");
        $('#username').attr("src", profile.username);
        $('#email').attr("src",profile.email);
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


