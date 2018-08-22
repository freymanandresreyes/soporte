$("#guardar_colaborador").click(function(){
    var id = $("#id").val();
    var url = getAbsolutePath() + "agregar_area_colaborador";

    $.ajax({
        url: url,
        type: "GET",
        data: {
            id: id
        },
        dataType: "json",
        success: function (respuesta) {
            if(respuesta){
                alertify.success("USUARIO AGREGADO CORRECTAMENTE");
                $("#id").val("");
                $("#documento").val("");
                $("#nombres").val("");
                $("#apellidos").val("");
                $("#telefono").val("");
                $("#correo").val("");
                $("#contraseña").val("");
                $("#area").val("");
                $("colaborador").removeClass("show");
                $("#colaborador").css({ display: "none" });
                $("#mensaje").html("");
                setTimeout(function () {
                    location.reload();
                }, 100);
                return false;
            }
        } //fin del success
    });//fin de ajax
});