$("#colaboradores_tabla").on("click", ".estado_colaborador", function(event) {
  var id_colaborador = this.name;
  var url = getAbsolutePath() + "estado_colaborador";
    
  $.ajax({
    url: url,
    type: "GET",
    data: {
      id_colaborador: id_colaborador
    },
    dataType: "json",
    success: function(respuesta) {
        if(respuesta==1){
            alertify.error("HUBIERON PROBLEMAS, HABLA CON EL ADMINISTRADOR!!");
            return false;
        }else{
            alertify.success("DATOS ALMACENADOS CORRECTAMENTE");
            setTimeout(function() {
              location.reload();
            }, 100);
        }
    } //fin del success
  }); //fin de ajax
});