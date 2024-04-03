$(document).ready(async function () {
    await importProducts();

    $('#products').on('click', ".addProduct",function () {
        var id = $(this).val();
        $.post("../php/cart.php", { acao: 'add', id: id, cartUpdate: true }, async function () {
            console.log("Product added")
            importProducts();
        });
    });

    $('#products').on('click', ".removeProduct",function () {
        var id = $(this).val();
        $.post("../php/cart.php", { acao: 'remove', id: id, cartUpdate: true }, function () {
            importProducts();
        })
    });

    $('#products').on('click', ".deleteProduct",function () {
        var id = $(this).val();
        $.post("../php/cart.php", { acao: 'delete', id: id, cartUpdate: true }, function () {
            importProducts();
        });
    });

    async function importProducts() { 
        var products = await $.post('../php/cart.php', { acao: 'returnProducts'})
            showCartProducts(products);
    }
});


function showCartProducts(data) {
    var products = data? JSON.parse(data): false;
    if (!products) return
    $("#products").empty();
    var total = 0

    products.forEach(function (product) {
        total += product.price * product.qty;
        $("#products").append(
         '<div class="productContainer" id="prod'+ product.id +'Cont">' +   
            '<div class="produto">' +
                '<img src="' + product.image + '" alt="">' +
                '<div class="nomeItem">' + product.name + '</div>' +
                '<div class="preco">R$' +  product.price +  '</div>' +
                '<button class="addProduct" value="'+ product.id +'"> + </button>' +    
                '<div class="qty">' +  product.qty +  '</div>' +
                '<button class="removeProduct" value="' + product.id + '"> - </button>' +
                '<div>Subtotal: R$' +  product.price * product.qty +  '</div>' +
                '<button class="deleteProduct" value="' + product.id + '">🗑</button>' +
            '</div>' +
        '</div>'
        )
    })
        $("#products").append(
            '<div id="total">'+ total +'</div>'
        )

}

export function addToCart(productId) {
    $.post('../php/cart.php', { acao: 'add', id: productId }, function(response) {
        if (response == "401") {
            console.log(response)
            window.location.href = '../views/paginaLogin.php';  
        } else {
            console.log(response)
            showNotification("Produto adicionado ao carrinho!");
        }
    })
}

export function showNotification(message) {
    var notification = $("#notification");
    notification.text(message);
    notification.css("display", "block");
    setTimeout(function() {
        notification.css("display", "none");
    }, 2000);
}
