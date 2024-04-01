document.addEventListener('DOMContentLoaded', function() {
    const changePasswordButton = document.getElementById('changePasswordButton');
    const changeContainer = document.getElementById('changeContainer');

    changePasswordButton.addEventListener('click', function() {
        changeContainer.style.display == 'flex'?  changeContainer.style.display == 'none' :  changeContainer.style.display = 'flex';
        changePasswordButton.style.display = 'none';
    });
});


function addToCart(productId) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/addCarrinho.php?acao=add&id=" + productId, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            showNotification("Produto adicionado ao carrinho!");
        }
    };
    xhr.send();
}

function showNotification(message) {
    var notification = document.getElementById("notification");
    notification.innerText = message;
    notification.style.display = "block";
    setTimeout(function() {
        notification.style.display = "none";
    }, 2000);
}