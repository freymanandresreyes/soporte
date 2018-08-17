$("#editar_estado").click(function(e) {

    var url = URLdominio+'listar_estados';

    $.ajax({
    
        url: url,
        type: 'GET',
        data: {
            
        },
        dataType: 'json',
        success: function(respuesta){
            $('#estado_seleccionado').html(respuesta);
        }
      });//FIN AJAX


    $("#ver_estados").addClass("show");
  
    $("#ver_estados").css({
      display: "block",
      "padding-right": "16px",
      background: "rgba(0, 0, 0, 0.5)"
    });
  
    $("#cerrar_editar_estados").click(function() {
      $("#cerrar_editar_estados").removeClass("show");
      $("#ver_estados").css({
        display: "none"
      });
    });
    e.preventDefault();
  });
  