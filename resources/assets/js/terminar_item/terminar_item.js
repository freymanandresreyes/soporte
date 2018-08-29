$("#items_terminar_tabla").on("click", ".terminar_item", function(event) {
    var valores = [];
    $(this)
      .parents("tr")
      .find("td")
      .each(function() {
        var celda = $(this).html() + "\n";
        valores.push(celda);
      });
  var id_item = this.name;
  var id_orden = valores[0];
    // console.log(id_orden);

    var url = getAbsolutePath() + "cambiar_estado_item";

    $.ajax({
        url: url,
        type: "GET",
        data: {
            id_orden: id_orden,
            id_item: id_item
        },
        dataType: "json",
        success: function (respuesta) {

            if (respuesta==1) {
                alertify.success("DATOS ALMACENADOS CORRECTAMENTE");
                setTimeout(function () {
                    location.reload();
                }, 100);
                return false;
            }else if(respuesta){
                alertify.success("ESTA ORDEN HA SIDO TOTALMENTE ATENDIDA");
                setTimeout(function () {
                    location.reload();
                }, 100);
                return false;
            }
        } //fin del success
    }); //fin de ajax
});