import { addToCart } from "./cart.js";

$(document).ready(async function () {
  await displayProducts();
  await $.post("../php/isLoggedIn.php", function (data) {
    if (data == "admin") {
      adminConfig();
    }
  });
  localStorage.clear();

  $(".addCart").click(function (event) {
    event.preventDefault();
    addToCart(event.target.dataset.value);
  });

  $(".catBtn").click(function () {
    localStorage.setItem("category", $(this).val());
    window.location.href = "";
  });

  $(".productImage").click(async function () {
    console.log("oii");
    let productId = $(this).attr("id");
    localStorage.setItem("detailedProductId", productId);
    window.location.href = "../views/product.html";
  });

  $("#searchBar form").submit(function (event) {
    localStorage.setItem("search", $("#searchBar input").val());
    window.location.href = "";
  });

  $(".buyProduct").click(function (event) {
    event.preventDefault();
    addToCart(event.target.dataset.value);
    window.location.href = "../views/cart.html";
  });
});

async function adminConfig() {
  let registerProductDiv = $("<div id='registerProduct'></div>");

  let registerButton = $("<button>")
    .text("+")
    .click(function () {
      window.location.href = "registerProductPage.html";
    });

  registerProductDiv.append(registerButton);
  $("body").append(registerProductDiv);
}

async function displayProducts() {
  let category = localStorage.getItem("category") || 0;
  let highlight = localStorage.getItem("offers") ? 1 : 0;
  let search = localStorage.getItem("search") || "";

  let data;
  if (category !== 0) {
    let categoryId = parseInt(category);
    let catName = "";
    switch (categoryId) {
      case 1:
        catName = "Cd's";
        break;

      case 2:
        catName = "LP's";
        break;

      case 3:
        catName = "Audio";
        break;

      case 4:
        catName = "Merch";
        break;
    }
    console.log(category);
    console.log(catName);
    $("#productsContainer").prepend(
      $(`<div id="section">${catName}</div>`)
    );
    data = await $.post("../php/indexMenu.php", { category: category });
  } else if (highlight === 1) {
    $("#productsContainer").prepend($('<div id="section">Promoções</div>'));
    data = await $.post("../php/indexMenu.php", { highlight: 1 });
  } else if (search !== "") {
    $("#productsContainer").prepend(
      $(`<div id="section">Buscar: ${search}</div>`)
    );
    data = await $.post("../php/indexMenu.php", { search: search });
  } else {
    data = await $.post("../php/indexMenu.php");
  }

  returnProducts(data);
}

export function returnProducts(data) {
  var products = data ? JSON.parse(data) : [];
  $(".products").empty();

  products.forEach(function (product) {
    var productHTML = `
        <div class="product" id="${product.id}">
            <a id="${product.id}">
                <img class="productImage" id="${product.id}" src="${product.image}" alt="">
            </a>
            <div class="nomeItem">
                ${product.name}
                <div class="preco"> R$ ${product.price}</div>
                <a class="buyProduct" data-value="${product.id}">Comprar</a>
                <a class="addCart" data-value="${product.id}">Adicionar ao carrinho</a>
            </div>
        </div>`;

    $(".products").append(productHTML);
  });
}
