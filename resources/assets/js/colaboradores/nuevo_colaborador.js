$("#nuevo_colaborador").click(function() {
  
    $("#editar_colaborador").css({ display: "none" });;

    $("#colaborador").addClass("show");

    $("#colaborador").css({
      display: "block",
      "padding-right": "16px",
      background: "rgba(0, 0, 0, 0.5)"
    });

    $("#cerrar_modal_colaborador").click(function() {
      $("#documento").val("");
      $("#nombres").val('');
      $("#apellidos").val('');
      $("#telefono").val('');
      $("#correo").val('');
      $("#contraseña").val("");
      $("#area").val('');
      $("colaborador").removeClass("show");
      $("#colaborador").css({ display: "none" });
    });

});