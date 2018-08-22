$('#crear_colaborador').click(function(){
    var documento = $("#documento").val();
    var nombres = $("#nombres").val();
    var apellidos = $("#apellidos").val();
    var telefono = $("#telefono").val();
    var email = $("#correo").val();
    var password = $("#contraseña").val();
    var url = getAbsolutePath() + 'crear_colaborador';

if(documento=="" || nombres=="" || apellidos=="" || telefono=="" || email=="" || password==""){
    alertify.error("TODOS LOS CAMPOS SON REQUERIDOS");
    return false;
}

    $.ajax({
        url: url,
        type: "GET",
        data: {
            documento: documento,
            nombres: nombres,
            apellidos: apellidos,
            telefono: telefono,
            email: email,
            password: password
        },
        dataType: "json",
        success: function (respuesta) {
            if(respuesta==1){
                alertify.success("USUARIO AGREGADO CORRECTAMENTE");
                $("#id").val("");
                $("#documento").val("");
                $("#nombres").val('');
                $("#apellidos").val('');
                $("#telefono").val('');
                $("#correo").val('');
                $("#contraseña").val("");
                $("#area").val('');
                $("colaborador").removeClass("show");
                $("#colaborador").css({ display: "none" });
                $('#mensaje').html("");
                setTimeout(function () {
                    location.reload();
                }, 100);
                return false;
            }else{
            $('#mensaje').html(respuesta);
            return false;
            }     
        } //fin del success
    });//fin de ajax
});