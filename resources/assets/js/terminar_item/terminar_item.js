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
    // alert(valores[0]);

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

            if (respuesta) {
                alertify.success("ITEM ASIGNADO CORRECTAMENTE");
            }
        } //fin del success
    }); //fin de ajax
});