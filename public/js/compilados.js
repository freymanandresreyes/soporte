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
      $("colaborador").removeClass("show");
      $("#colaborador").css({ display: "none" });
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
              if(respuesta==1){
                  alertify.error("ESTE USUARIO YA EXISTE.");
                  $("#guardar_colaborador").prop("disabled", true);
                  $("#nombres").prop("disabled", true);
                  $('#apellidos').prop('disabled', true);
                  $('#telefono').prop('disabled', true);
                  $('#correo').prop('disabled', true);
                  $('#contraseña').prop('disabled', true);
                  return (false);
              }else if(respuesta==2){
                    $("#guardar_colaborador").prop("disabled", false);
                    $('#nombres').prop('disabled',false);
                    $('#apellidos').prop('disabled', false);
                    $('#telefono').prop('disabled', false);
                    $('#correo').prop('disabled', false);
                    $('#contraseña').prop('disabled', false);
              }
          } //fin del success
        });//fin de ajax
        e.preventDefault();
        return (e.which != 13);
    }
});