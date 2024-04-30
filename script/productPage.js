import * as main from "./main.js";
import { addToCart } from "./cart.js";

var product = localStorage.getItem("detailedProductId");

$(document).ready(async function () {
  await detailProduct(product);

  $("#buy").click(function (event) {
    event.preventDefault();
    addToCart(event.target.dataset.value);
    window.location.href = "../views/cart.html";
  });

  $("#addCart").click(function (event) {
    event.preventDefault();
    addToCart(event.target.dataset.value);
  });

  $("#eraseProduct").click(function () {
    console.log("oii");
  });
});

function eraseProduct(productId) {
  $.post("../php/eraseProduct.php", { id: productId }, function (data) {
    console.log(data);
  });
}

async function detailProduct(productId) {
  $.post("../php/productPage.php", { id: productId }, function (data) {
    var product = JSON.parse(data);
    console.log(data);
    console.log(product);
    $("#productName").text(product.name);
    $("#buy").attr("data-value", product.id);
    $("#productDescription").text(product.description);
    $("#productImage").attr("src", product.image);
    $("#productPrice").text(`R$ ${product.price}`);
    $("#addCart").attr("data-value", product.id);
    $.post("../php/isLoggedIn.php", function (response) {
      if (response == "admin") {
        adminConfig();
      }
    });
  });
}

function adminConfig() {
  let eraseProductDiv = $("<div id='eraseProduct'></div>");
  $("#content").append(eraseProductDiv);
  $("#eraseProduct").css({
    width: "80%",
    "text-align": "right",
    "margin-top": "40px",
  });

  let eraseButton = $("<button>")
      .text("Remover Produto")
      .css({
        "font-size": "25px",
      })
      .click(function () {
        if (confirm("Tem certeza que deseja remover este produto?")) {
          eraseProduct(product);
          window.location.href = "../views/index.html";
        }
      });

  eraseProductDiv.append(eraseButton);
}
