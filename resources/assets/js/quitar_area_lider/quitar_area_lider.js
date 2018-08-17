$('#quitar_area').click(function()
{
    var lider_area=$('#lider_area').val();
    var area_lider=$('#area_lider').val();
    var id_area=$('#area_lider').attr('name');
    var url = URLdominio+'quitar_area';

    if(lider_area==0 || area_lider=="")
    {
        alertify.error("TODOS LOS CAMPOS SON OBLIGATORIOS.");  
    }
    else
    {
        $.ajax({
            url: url,
            type: 'GET',
            data: {
              lider_area : lider_area,
              id_area : id_area
            },
            dataType: 'json',
            success: function(respuesta){
              if(respuesta==1)
              {
                alertify.success("AREA QUITADA CON EXITO.");
                setTimeout("location.href='areas'");
              }
            }
          });//FIN AJAX
    }
});