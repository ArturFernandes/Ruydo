import * as main from "./main.js";

$.post("../php/isLoggedIn.php", function (data) {
  if (!data) {
    window.location.href = "../views/loginPage.html";
  }
});

$("#registerProductForm").on("submit", function (event) {
  var formData = new FormData(this);
  console.log(formData);
  $.ajax({
    url: "../php/registerProduct.php",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      console.log(response);
      if (response == "200") {
        window.location.href = "../views/index.html";
      } else {
        main.showNotification("Erro no processamento!", false);
      }
    },
  });
  event.preventDefault();
});

$("#image").change(function () {
  var file = this.files[0];
  var preview = $("#previewImage");

  if (file) {
    var reader = new FileReader();

    reader.onload = function (e) {
      preview.attr("src", e.target.result).show();
    };

    preview.css({
      display: "none",
      "max-width": "100px",
      "max-height": "100px",
      border: "1px solid #ccc",
      "border-radius": "5px",
      margin: "10px",
    });

    reader.readAsDataURL(file);
  } else {
    preview.hide();
  }
});
