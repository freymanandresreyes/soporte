$("#tabla_items").on("click", ".asignar_item_colaborador_guardar", function(event){
    var valores = [];
    $(this).parents("tr").find("td").each(function () {
        var celda = $(this).html() + "\n";
        valores.push(celda);
    });
    
    var observacion = $(this).parents("tr").find('#observacion_m').val();
    var select = $(this).parents("tr").find('#slect_m').val();
    var id_orden = valores[0];
    var id_item = valores[1];

    observacion = observacion.toUpperCase();


    if (observacion == "" || select == "" || id_orden==""){
        alertify.error("LOS CAMPOS SON OBLIGATORIOS");
        event.preventDefault();
        return false;
    }
    $(this).parents("tr").find('#slect_m').prop('disabled', true);
    $(this).parents("tr").find('#observacion_m').val("");
    $(this).parents("tr").find('#observacion_m').prop('disabled', true);
    var url = getAbsolutePath() + "guardar_colaborador_asignado";

    $.ajax({
      url: url,
      type: "GET",
      data: {
        observacion: observacion,
        select: select,
        id_orden: id_orden,
        id_item: id_item
      },
      dataType: "json",
      success: function(respuesta) {
       
        if (respuesta) {
            alertify.success("ITEM ASIGNADO CORRECTAMENTE");
        }
      } //fin del success
    }); //fin de ajax
  event.preventDefault();
});