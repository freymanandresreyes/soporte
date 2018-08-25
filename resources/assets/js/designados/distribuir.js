$("#requerimientos_tabla_asignar").on("click", ".ver_orden_asignar", function(event) {
    var id_orden = this.name;


    
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