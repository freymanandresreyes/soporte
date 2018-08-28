$("#requerimientos_tabla_asignar").on("click", ".ver_orden_asignar", function(event) {
    var id_orden = this.name;

    // $("#id").val(id_orden);

    var url = getAbsolutePath() + "asignar_item";

    $.ajax({
        url: url,
        type: "GET",
        data: {
            id_orden: id_orden
        },
        dataType: "json",
        success: function (respuesta) {
            console.log(respuesta);
            if (respuesta) {
                $("#tabla_items").html(respuesta);
            }
        } //fin del success
    }); //fin de ajax

    $("#orden_asignar").addClass("show");

    $("#orden_asignar").css({
      display: "block",
      "padding-right": "16px",
      background: "rgba(0, 0, 0, 0.5)"
    });

    $("#cerrar_modal_orden_asignar").click(function() {
        $("orden_asignar").removeClass("show");
        $("#orden_asignar").css({ display: "none" });
    });  
});