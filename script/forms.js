import { addToCart } from "./cart.js";
import * as main from "./main.js";

$(document).ready(function () {
  $("#loginForm").on("submit", function (event) {
    event.preventDefault();

    var formData = $(this).serialize();
    $.post("../php/login.php", formData).done(function (response) {
      if (response == "200") {
        window.location.href = "../views/index.html";
      } else {
        main.showNotification("Dados Incorretos!", false);
      }
    });
  });

  $("#registerForm").on("submit", function (event) {
    event.preventDefault();
    var passwordConfirmed =
      $("input[name='password']").val() ==
      $("input[name='confirmPassword']").val()
        ? true
        : false;

    if (!passwordConfirmed) {
      main.showNotification("As senhas não condizem!", false);
    } else {
      var formData = $(this).serialize();
      console.log(formData);
      $.post("../php/register.php", formData).done(function (response) {
        console.log(response);
        if (response == "200") {
          window.location.href = "../views/index.html";
        } else {
          main.showNotification("Dados Incorretos!", false);
        }
      });
    }
  });
});
