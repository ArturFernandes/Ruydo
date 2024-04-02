document.addEventListener('DOMContentLoaded', function() {
    const changePasswordButton = document.getElementById('changePasswordButton');
    const changeContainer = document.getElementById('changeContainer');

    changePasswordButton.addEventListener('click', function() {
        changeContainer.style.display == 'flex'?  changeContainer.style.display == 'none' :  changeContainer.style.display = 'flex';
        changePasswordButton.style.display = 'none';
    });
});


