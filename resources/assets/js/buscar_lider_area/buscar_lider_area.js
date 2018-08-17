$('#lider_area').click(function()
{
    var lider_area=$('#lider_area').val();
    var url = URLdominio+'buscar_area_lider';

    console.log(lider_area);

    $.ajax({
        url: url,
        type: 'GET',
        data: {
          lider_area : lider_area
        },
        dataType: 'json',
        success: function(respuesta){
          if(respuesta=="")
        {
            $('#area_lider').val(respuesta);
        }
        else
        {
            $('#quitar').html(respuesta);
        }
        }
      });//FIN AJAX
});