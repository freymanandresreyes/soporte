$("#estado_seleccionado").click(function() {

    var estado=$('#estado_seleccionado').val();
    var url = URLdominio+'llenar_input';
    console.log(estado);
    $.ajax({
    
        url: url,
        type: 'GET',
        data: {
            estado : estado
        },
        dataType: 'json',
        success: function(respuesta){
            $('#input').html(respuesta);
        }
      });//FIN AJAX
  });