$("#aceptar_orden").click(function() {
    var id_estado = $("#estado").val();
    var id_orden = $("#id").val();
    var area_de_remision = $("#area_de_remision").val();
    var id_my_areauser = $("#id_my_areauser").val();
    var observaciones = $("#observaciones").val();
    var id_area_solicitante = $("#id_area_solicitante").val();
    
    $("#aceptar_orden").prop('disabled',true);

    if (id_estado == "REMISION") {
      $("#area_de_remision").prop("disabled", false);

      if (area_de_remision == "") {
        alertify.error("DEBES SELECCIONAR UNA AREA ALA CUAL VAS HACER LA REMISION");
        return false;
      } else {
        if (area_de_remision == id_my_areauser) {
          alertify.error("NO PUEDES REMITIR A TU PROPIA AREA");
          return false;
        }
          if (area_de_remision == id_area_solicitante) {
              alertify.error("NO PUEDES REMITIR A La MISMA AREA SOLICITANTE !!DEBES RECHAZAR LA ORDEN¡¡");
              return false;
        }
        if (observaciones == "") {
          alertify.error("DEBES COLOCAR UNA OBSERVACION DE ESTA REMISION");
          return false;
        }

        var url = getAbsolutePath() + "remitir_orden";

        $.ajax({
          url: url,
          type: "GET",
          data: {
            id_orden: id_orden,
            id_estado: id_estado,
            area_de_remision: area_de_remision,
            observaciones: observaciones,
            id_area_solicitante: id_area_solicitante,
            id_my_areauser: id_my_areauser
          },
          dataType: "json",
          success: function(respuesta) {
              if(respuesta){
              alertify.success("REMISION REALIZADA CON EXITO");
                  setTimeout(function () {
                      location.reload();
                  }, 100);
              return false;
              }
          } //fin del success
        }); //fin de ajax
      }
    }

    //
    //INICIA EL ELSE
    //
    else {
      $("#area_de_remision").val("");
      $("#area_de_remision").prop("disabled", true);

        if (observaciones == "") 
        {
        alertify.error("DEBES COLOCAR UNA OBSERVACION");
        return false;
        }


      // console.log(id_orden);
        if (id_estado == "") 
        {
        alertify.error("DEBES SELECCIONAR UN ESTADO");
        return false;
        }

      var url = getAbsolutePath() + "aceptar_orden";

      $.ajax({
        url: url,
        type: "GET",
        data: {
          id_orden: id_orden,
          id_estado: id_estado
        },
        dataType: "json",
        success: function(respuesta) {
            if (respuesta) {
                alertify.success("ORDEN ACEPTADA CON EXITO");
                setTimeout(function() {
                  location.reload();
                }, 100);
                return false;
            }
        } //fin del success
      }); //fin de ajax
    }
});