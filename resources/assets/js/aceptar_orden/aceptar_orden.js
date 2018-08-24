$("#aceptar_orden").click(function() {
    var id = $("#estado").val();
    var id_orden = $("#id").val();
    var area_de_remision = $("#area_de_remision").val();
    
    if (id == 'REMISION' ){
        $("#area_de_remision").prop('disabled', false);
        alertify.error("DEBES SELECCIONAR UNA AREA ALA CUAL VAS HACER LA REMISION");
        if(area_de_remision == ""){
            alertify.error("DEBES SELECCIONAR UNA AREA ALA CUAL VAS HACER LA REMISION");
            return false;
        }else{
            var url = getAbsolutePath() + "remitir_orden";

            $.ajax({
                url: url,
                type: "GET",
                data: {
                    id_orden: id_orden,
                    id: id
                },
                dataType: "json",
                success: function (respuesta) {


                } //fin del success
            }); //fin de ajax
        }
    }
    else{
    $("#area_de_remision").prop("disabled", true);
    return false;

    // console.log(id_orden);
    return false;
    if(id==""){
        alertify.error("DEBES SELECCIONAR UN ESTADO");
        return false;
    }
  var url = getAbsolutePath() + "aceptar_orden";

  $.ajax({
    url: url,
    type: "GET",
    data: {
      id_orden:id_orden,
      id: id
    },
    dataType: "json",
    success: function(respuesta) {
      
      
    } //fin del success
  }); //fin de ajax
    }
});