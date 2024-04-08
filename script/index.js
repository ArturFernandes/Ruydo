import { addToCart } from "./cart.js";

$(document).ready(async function () {
  await displayProducts();

  $(".addCart").click(function (event) {
    event.preventDefault();
    addToCart(event.target.dataset.value);
  });

  $(".product").click(function () {
    let productId = $(this).attr('id');
    localStorage.setItem('detailedProductId', productId);
    window.location.href = '../views/product.html'
  });

  async function displayProducts() {
      var data = await $.post('../php/indexMenu.php')
      returnProducts(data);
  }  

  $("#offers").click(function (event) {
    event.preventDefault();
    saleProducts();
  });

  $("#searchBar form").submit(function (event) {
    event.preventDefault();
    searchProducts($("#searchBar input").val());
  });

  
  $(".catBtn").click(function () {
    setCategory($(this).val());
  });
});

function saleProducts() {
  $.post("../php/indexMenu.php",{ highlight : 1}, function (data) {
    returnProducts(data);
  });
}

function searchProducts(search) {
  $.post("../php/indexMenu.php",{ search : search}, function (data) {
    returnProducts(data);
  });
}

function setCategory(category) {
  $.post("../php/indexMenu.php", {category : category}, function (data) {
    returnProducts(data);
  });
}

export function returnProducts(data) {
  var products = data ? JSON.parse(data) : [];
  $(".products").empty();

  products.forEach(function (product) {
    $(".products").append(
      '<div class="product" id="' +
        product.id +
        '"><a ' +
        product.id +
        '"><img src="' +
        product.image +
        '" alt=""></a><div class="nomeItem">' +
        product.name +
        '<div class="preco"> R$ ' +
        product.price +
        '</div><a href="cart.html?acao=add&id=' +
        product.id +
        '" class="comprar">Comprar</a><a class="addCart" data-value="' +
        product.id +
        '">Adicionar ao carrinho</a></div></div>'
    );
  });
}


