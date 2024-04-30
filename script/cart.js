import * as main from "./main.js";

$(document).ready(async function () {
  await importProducts();

  $("#products").on("click", ".addProduct", function () {
    var id = $(this).val();
    $.post(
      "../php/cart.php",
      { action: "add", id: id, cartUpdate: true },
      function () {
        importProducts();
      }
    );
  });

  $("#products").on("click", ".removeProduct", function () {
    var id = $(this).val();
    $.post(
      "../php/cart.php",
      { action: "remove", id: id, cartUpdate: true },
      function () {
        importProducts();
      }
    );
  });

  $("#products").on("click", ".deleteProduct", function () {
    var id = $(this).val();
    $.post(
      "../php/cart.php",
      { action: "delete", id: id, cartUpdate: true },
      function () {
        importProducts();
      }
    );
  });

  $("#buyConfirmation").on("click", function () {
    $.post("../php/cart.php", { action: "checkout" }, function (response) {
      response == "200"
        ? (window.location.href = "../views/confirmBuy.html")
        : main.showNotification("Error no proceessamento da compra", false);
    });
  });

  $("#emptyCart").on("click", function () {
    $.post("../php/cart.php", { action: "emptyCart" }, function () {
      importProducts();
    });
  });

  async function importProducts() {
    if (window.location.pathname.endsWith("cart.html")) {
      var products = await $.post("../php/cart.php", {
        action: "returnProducts",
      });
      showCartProducts(products);
    }
  }
});

function showCartProducts(data) {
  var products = data ? JSON.parse(data) : false;
  $("#products").empty();
  if (!products) {
    $("#products").append(
      `<div id="messageContainer">
        <div id="imgCd"><img src="https://static.thenounproject.com/png/23523-200.png" alt=""></div>
        <div id="messageCart">Carrinho Vazio!</div>
        <a href="index.html">Voltar às compras</a>
        </div>`
    );

    $("#emptyCart").remove();
    $("#buyingOptions").remove();
    return;
  } else if (products == "401") {
    window.location.href = "../views/loginPage.html";
  }

  var total = 0;

  products.forEach(function (product) {
    total += product.price * product.qty;
    $("#products").append(`
            <div class="productContainer" id="prod${product.id}Cont">
                <div class="product">
                    <img src="${product.image}" alt="">
                    <div class="nomeItem">${product.name}</div>
                    <div class="preco">R$${product.price}</div>
                    <button class="removeProduct" value="${
                      product.id
                    }">-</button>
                    <div class="qty">${product.qty}</div>
                    <button class="addProduct" value="${product.id}">+</button>
                    <div>Subtotal: R$${product.price * product.qty}</div>
                    <button class="deleteProduct" value="${
                      product.id
                    }">🗑</button>
                </div>
            </div>
        `);
  });
  $("#products").append(`<div id="total">Total: R$ ${total} ,00</div>`);
}

export function addToCart(productId) {
  $.post(
    "../php/cart.php",
    { action: "add", id: productId },
    function (response) {
      if (response == "401") {
        console.log(response);
        window.location.href = "../views/loginPage.html";
      } else {
        console.log(response);
        main.showNotification("product adicionado ao carrinho!", true);
      }
    }
  );
}
