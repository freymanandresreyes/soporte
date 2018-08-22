//captura la direccion del servidor
function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
  }
  var URLdominio = getAbsolutePath();
$("#nuevo_colaborador").click(function() {
  
    $("#editar_colaborador").css({ display: "none" });;

    $("#colaborador").addClass("show");

    $("#colaborador").css({
      display: "block",
      "padding-right": "16px",
      background: "rgba(0, 0, 0, 0.5)"
    });

    $("#cerrar_modal_colaborador").click(function() {
      $("#documento").val("");
      $("#nombres").val('');
      $("#apellidos").val('');
      $("#telefono").val('');
      $("#correo").val('');
      $("#contraseña").val("");
      $("#area").val('');
      $("colaborador").removeClass("show");
      $("#colaborador").css({ display: "none" });
      $('#mensaje').html(respuesta);
    });

});
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
                  $("#id").val('');
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
                  $("#id").val(respuesta[0]['id']);
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
                $("#id").val(respuesta[0]["id"]);
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