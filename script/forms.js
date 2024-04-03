(document).ready(function () {
    const changePasswordButton = document.getElementById('changePasswordButton');
    const changeContainer = document.getElementById('changeContainer');

    changePasswordButton.addEventListener('click', function() {
        changeContainer.style.display == 'flex'?  changeContainer.style.display == 'none' :  changeContainer.style.display = 'flex';
        changePasswordButton.style.display = 'none';
    });
});

export function testarEmail() {
    let inputEmail = document.getElementById('email')
    let valorEmail = inputEmail.value
    let validarEmail = valorEmail.match(/^[^@]*@[^@]*\.[^@]*$/)

    if (validarEmail == null) {
        return false
    } else {
        return true
    }
}


