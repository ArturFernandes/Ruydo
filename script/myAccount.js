import * as main from "./main.js";

showPurchases();
$(document).ready(async function () {
  localStorage.getItem("passwordChanged")
    ? main.showNotification("Senha alterada com sucesso!", true)
    : false;
  localStorage.clear();

  $.post("../php/changePassword.php", function (data) {
    console.log(data);
  });

  displayProfileData();

  $("#changePasswordToggle").click(function () {
    $("#changeContainer").css("display") == "flex"
      ? $("#changeContainer").css("display", "none")
      : $("#changeContainer").css("display", "flex");
    $("#changePasswordToggle").css("display", "none");
  });

  $("#showPurchases").click(function () {
    $("#purchases").css("display") == "flex"
      ? $("#purchases").css("display", "none")
      : $("#purchases").css("display", "flex");
    $("#showPurchases").text() == "Exibir Compras"
      ? $("#showPurchases").text("Esconder Compras")
      : $("#showPurchases").text("Exibir Compras");
  });

  $("#passwordChange").on("submit", function (event) {
    let oldPassword = $("#oldPassword").val();
    let newPassword = $("#newPassword").val();
    let confirmNewPassword = $("#confirmNewPassword").val();
    let passwordConfirmed = newPassword === confirmNewPassword ? true : false;

    if (!passwordConfirmed) {
      event.preventDefault();
      main.showNotification("As senhas não condizem", false);
    } else {
      event.preventDefault();
      changePassword(oldPassword, newPassword);
    }
  });
});

function changePassword(oldPassword, newPassword) {
  $.post(
    "../php/changePassword.php",
    {
      action: "changePassword",
      password: oldPassword,
      newPassword: newPassword,
    },
    function (data) {
      if (data == "200") {
        localStorage.setItem("passwordChanged", true);
        window.location.href = "";
      } else {
        main.showNotification("Senha atual incorreta!", false);
      }
    }
  );
}

function displayProfileData() {
  $.post(
    "../php/changePassword.php",
    { action: "displayProfile" },
    function (data) {
      var profile = data ? JSON.parse(data) : false;
      $("#realPic").attr("src", "../imgs/vinyl_PNG5-removebg-preview.png");
      $("#username").text(profile.username);
      $("#email").text(profile.email);
    }
  );
}

export function testarEmail() {
  let valorEmail = $("#email").val();
  let validarEmail = valorEmail.match(/^[^@]*@[^@]*\.[^@]*$/);

  if (validarEmail == null) {
    return false;
  } else {
    return true;
  }
}

function showPurchases() {
  $.post("../php/cart.php", { action: "showPurchases" }, function (data) {
    $("#purchases").empty();
    if (data) {
      var purchases = JSON.parse(data);

      purchases.forEach(function (purchase) {
        var purchaseHTML = `
          <div class="purchase">
            <div class="purchaseInfo">
              <h2>Compra ID: ${purchase.purchaseId}</h2>
              <p>Total: R$ ${purchase.totalPrice}</p>
              <p>Data: ${purchase.timestamp}</p>
            </div>
            <div class="purchaseItems">
              <h3>Itens:</h3>
        `;

        purchase.items.forEach(function (item) {
          purchaseHTML += `
            <div class="purchaseItem">
              <p>Produto: <strong>${item.productName}</strong></p>
              <p>Quantidade: ${item.quantity}</p>
              <p>Preço por unidade: R$ ${item.pricePerUnit}</p>
              <p>Total do item: R$ ${item.totalItemPrice}</p>
            </div>
          `;
        });

        purchaseHTML += `</div></div>`;
        $("#purchases").append(purchaseHTML);
      });
    } else {
      $("#purchases").html("<p>Nenhuma compra encontrada.</p>");
    }
  });
}
