$("#aceptar_orden").click(function() {
    var id = $("#estado").val();
    var id_orden = $("#id").val();

    if(id=='REMISION'){
    
    }


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
});