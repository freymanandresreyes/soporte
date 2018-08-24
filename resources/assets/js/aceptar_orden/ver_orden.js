$("#requerimientos_tabla").on("click", ".ver_orden", function(event) {
  var id_orden = this.name;

  var url = getAbsolutePath() + "ver_orden";

  $.ajax({
    url: url,
    type: "GET",
    data: {
      id_orden: id_orden
    },
    dataType: "json",
    success: function(respuesta) {
        console.log(respuesta);
      // if (respuesta == 1) {
      //     alertify.error("HUBIERON PROBLEMAS, HABLA CON EL ADMINISTRADOR!!");
      //     return false;
      // } else {
      //     alertify.success("DATOS ALMACENADOS CORRECTAMENTE");
      //     setTimeout(function () {
      //         location.reload();
      //     }, 100);
      // }
    } //fin del success
  }); //fin de ajax
});