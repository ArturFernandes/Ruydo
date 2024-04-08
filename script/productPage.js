import * as main from './main.js';

$(document).ready( function () {
    var product = localStorage.getItem('detailedProductId');
    console.log(localStorage.getItem('detailedProductId'))
    detailProduct(product);
    localStorage.clear();
})

function detailProduct(productId) {
    $.post('../php/productPage.php', { id: productId }, function(data) {
        var product = JSON.parse(data);
        console.log(data);
        console.log(product);
      $('#content').append('<h2 id="productName">' + product.name + '</h2>' +
                            '<p id="productDescription">' + product.description + '</p>' +
                            '<img id="productImage" src="' + product.image + '" alt="Product Image">' +
                            '<div id="buyContainer">' +
                                '<p id="productPrice">R$ ' + product.price + '</p>' +
                                '<div id="buy"><a href="../php/confirmBuy.php">Confirmar Compra</a></div>' +
                                '<div id="keepBuying"><a href="index.html"> ⬅Continuar Comprando</a></div>' +
                            '</div>');
    });
  }