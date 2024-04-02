$(document).ready(function () {
  mostrarProducts();
  function mostrarProducts() {
    $.get("../php/indexMenu.php", function (data) {
      mostraProdutos(data);
    });
  }

  $("#searchBar form").submit(function (event) {
    event.preventDefault();
    buscarProducts($("#searchBar input").val());
  });

  $("#sideBar button").submit(function (event) {
    event.preventDefault();
    buscarProducts($("#sideBar button").val());
  });
});

function buscarProducts(busca) {
  $.get("../php/indexMenu.php?busca=" + busca, function (data) {
    mostraProdutos(data);
  });
}

function setCategory(busca) {
  $.get("../php/indexMenu.php?busca=" + busca, function (data) {
    mostraProdutos(data);
  });
}

function mostraProdutos(data) {
  var products = data ? JSON.parse(data) : [];
  $(".products").empty();

  products?.forEach(function (produto) {
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
        '</div><a href="cart.php?acao=add&id=' +
        produto.id +
        '" class="comprar">Comprar</a><a id="addCart" class="comprar" onclick="addToCart(' +
        produto.id +
        ')">Adicionar ao cart</a></div></div>'
    );
  });
}
