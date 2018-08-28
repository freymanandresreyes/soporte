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
        // console.log(respuesta[1].length);
        // console.log(respuesta[0]['consecutivo']);        
        // console.log(respuesta[0]);
// return false;
        // console.log(respuesta[0][0]['id']);
        // return false;
        $("#id").val(respuesta[0][0]["id"]);
        $("#id_my_areauser").val(respuesta[0][0]["id_area_destino"]["id"]);
        $("#my_area").val(respuesta[0][0]["id_area_destino"]["area_areauser"]["nombre"]);
        $("#numero_orden").val(respuesta[0][0]["consecutivo"]);
        $("#fecha").val(respuesta[0][0]["created_at"]); area_solicita
        $("#area_solicita").val(respuesta[0][0]["id_area_solicita"]["area_areauser"]["nombre"]);
        $("#id_area_solicitante").val(respuesta[0][0]["id_area_solicita"]["id"]);

        // for (var i = 0; i < respuesta[1].length; i++) {
        //     console.log(i);
        //   "<li>" + respuesta[1][i]["orden_items"]["descripcion"] + "</li>";

        // }
        // console.log(datos);
        // $("#lista_items").html(datos);
    
        var url2 = getAbsolutePath() + "items_modal";

        $.ajax({
            url: url2,
            type: "GET",
            data: {
                id_orden: id_orden
            },
            dataType: "json",
            success: function (respuesta) {
                // console.log(respuesta);
                if(respuesta){
                $("#aca").html(respuesta);
                }
            } //fin del success
        }); //fin de ajax

        $("#orden").addClass("show");

        $("#orden").css({
            display: "block",
            "padding-right": "16px",
            background: "rgba(0, 0, 0, 0.5)"
        });

        $("#cerrar_modal_orden").click(function () {
            $("orden").removeClass("show");
            $("#orden").css({ display: "none" });
            $("#aca").html("");
            $("#numero_orden").val('');
            $("#fecha").val('');
            $("#id_my_areauser").val('');
            $("#area_de_remision").val("");
            $("#id_my_areauser").val("");
            $("#estado").val("");
            $("#id_area_solicitante").val("");
            $("#observaciones").val("");
            $("#area_de_remision").prop("disabled", true);
            $("#aceptar_orden").prop('disabled', false);

        });
    } //fin del success
  }); //fin de ajax
});