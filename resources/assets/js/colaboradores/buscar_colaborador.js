$("#documento").keypress(function (e) {
    if (e.which == 13) {
        var documento = $("#documento").val();
        var url = getAbsolutePath() + 'buscar_colaborador';

        $.ajax({
          url: url,
          type: "GET",
          data: {
              documento: documento
          },
          dataType: "json",
          success: function(respuesta) {
            //   alert(respuesta[1]);
              if(respuesta=='null'){
                alertify.error("ESTE USUARIO NO EXISTE");
                  $("#nombres").val('');
                  $("#apellidos").val('');
                  $("#telefono").val('');
                  $("#correo").val('');
                  $("#contraseña").val("");
                  $("#area").val('');
                $('#nombres').prop('disabled',false);
                $('#apellidos').prop('disabled', false);
                $('#telefono').prop('disabled', false);
                $('#correo').prop('disabled', false);
                $("#contraseña").prop("disabled", false);
                $("#crear_colaborador").prop("disabled", false);
                  $("#contraseña").css({ display: "block" });; 
                  $("#area").css({ display: "none" });;
                  $("#label_area").css({ display: "none" });;
                $("#label_contraseña").css({ display: "block" });;
                $("#crear_colaborador").css({ display: "block" });;
                $("#guardar_colaborador").css({ display: "none" });;
                return false;
              }if(respuesta[1]!='null'){
                  console.log(respuesta);
                alertify.log("ESTE USUSARIO YA TIENE UN AREA ASIGNADA");
                  $('#nombres').prop('disabled', true);
                  $('#apellidos').prop('disabled', true);
                  $('#telefono').prop('disabled', true);
                  $('#correo').prop('disabled', true);
                  $('#contraseña').prop('disabled', true);
                  $('#area').prop('disabled', true);
                  $("#area").css({ display: "block" });;
                  $("#label_area").css({ display: "block" });;
                  $("#guardar_colaborador").css({ display: "none" });;
                  $("#nombres").val(respuesta[0]['nombres']);
                  $("#apellidos").val(respuesta[0]['apellidos']);
                  $("#telefono").val(respuesta[0]['telefono']);
                  $("#correo").val(respuesta[0]['email']);
                  $("#area").val(respuesta[1][0]['area_nombre']);
                  $("#crear_colaborador").css({ display: "none" });;
                  $("#contraseña").css({ display: "none" });;
                  $("#label_contraseña").css({ display: "none" });;
                  $('#guardar_colaborador').prop('disabled', true);
                return false;
              }if(respuesta[1]==['null']){
                alertify.success("ESTE USUSARIO ESTA LIBRE PARA AGREGAR A TU AREA");
                $("#guardar_colaborador").css({ display: "block" });; 
                $('#nombres').prop('disabled', true);
                $('#nombres').prop('disabled', true);
                $('#apellidos').prop('disabled', true);
                $('#telefono').prop('disabled', true);
                $('#correo').prop('disabled', true);
                $('#contraseña').prop('disabled', true)
                $("#nombres").val(respuesta[0]['nombres']);
                $("#apellidos").val(respuesta[0]['apellidos']);
                $("#telefono").val(respuesta[0]['telefono']);
                $("#correo").val(respuesta[0]['email']);
                  $("#area").val("");
                  $("#crear_colaborador").css({ display: "none" });; 
                  $("#area").css({ display: "none" });;
                  $("#label_area").css({ display: "none" });;
                  $("#contraseña").css({ display: "none" });;
                  $("#label_contraseña").css({ display: "none" });;
                $("#guardar_colaborador").prop("disabled", false);
                return false;
              }
          } //fin del success
        });//fin de ajax
        e.preventDefault();
        return (e.which != 13);
    }
});