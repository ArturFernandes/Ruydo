function addToCart(productId) {
    $.get('../php/addCart.php', { acao: 'add', id: productId }, function(response) {
        if (response == "401") {
            console.log(response)
            window.location.href = '../views/paginaLogin.php';
        } else {
            showNotification("Produto adicionado ao carrinho!");
        }
    })
}

function showNotification(message) {
    var notification = $("#notification");
    notification.text(message);
    notification.css("display", "block");
    setTimeout(function() {
        notification.css("display", "none");
    }, 2000);
}
