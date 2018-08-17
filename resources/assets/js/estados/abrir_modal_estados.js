$("#abrir_estados").click(function(e) {

  $("#estados").addClass("show");

  $("#estados").css({
    display: "block",
    "padding-right": "16px",
    background: "rgba(0, 0, 0, 0.5)"
  });

  $("#cerrar_estados").click(function() {
    $("#cerrar_estados").removeClass("show");
    $("#estados").css({
      display: "none"
    });
  });
  e.preventDefault();
});
