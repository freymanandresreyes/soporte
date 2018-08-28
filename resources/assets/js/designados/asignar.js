$("#tabla_items").on("click", ".asignar_item_colaborador_guardar", function(event){
    //codigo para contar los productos que
    //se agregaran a la compra
    var header = Array();
    $("#x table tr th").each(function(i, v) {
      header[i] = $(this).text();
    });

    var data = Array();
    $("#x table tr").each(function(i, v) {
      data[i] = Array();
      $(this)
        .children("td")
        .each(function(ii, vv) {
          data[i][ii] = $(this).text();
        });
    });
    data.splice(0, 1);
    // console.log(data[1][2]);
    var obserevacion = $(this).parents("tr").find('#observacion_m').val();
    var select = $(this).parents("tr").find('#slect_m').val();

    if(obserevacion=="" || select==""){
        alertify.error("LOS CAMPOS SON OBLIGATORIOS");
        event.preventDefault();
        return false;
    }
  event.preventDefault();
});