import { addToCart } from "./cart.js";

$(document).ready(async function () {
  await displayProducts();

  $(".addCart").click(function (event) {
    event.preventDefault();
    addToCart(event.target.dataset.value);
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

  products.forEach(function (produto) {
    $(".products").append(
      '<div class="produto" id="' +
        produto.id +
        '"><a href="produto.php?id=' +
        produto.id +
        '"><img src="' +
        produto.image +
        '" alt=""></a><div class="nomeItem">' +
        produto.name +
        '<div class="preco"> R$ ' +
        produto.price +
        '</div><a href="cart.html?acao=add&id=' +
        produto.id +
        '" class="comprar">Comprar</a><a class="addCart" data-value="' +
        produto.id +
        '">Adicionar ao carrinho</a></div></div>'
    );
  });
}
