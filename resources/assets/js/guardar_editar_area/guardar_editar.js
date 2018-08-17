$('#guardareditar').click(function()
{
    var nombre_area=$('#nombre_area').attr('name');
    var nuevo_nombre=$('#nombre_area').val();
    var encargado=$('#encargado').val();
    var url = URLdominio+'guardar_editar';
    
    nombre_area=nombre_area.toUpperCase();
    
    if(encargado==0 || nombre_area=="")
    {
        alertify.error("TODOS LOS CAMPOS SON OBLIGATORIOS.");  
    }
    else
    {
        $.ajax({
    
            url: url,
            type: 'GET',
            data: {
              nombre_area : nombre_area,
              nuevo_nombre : nuevo_nombre,
              encargado : encargado
            },
            dataType: 'json',
            success: function(respuesta){
              if(respuesta==0)
            {
                alertify.error("ESTE LIDER YA TIENE UN AREA ASIGNADA.");
            }
            else if(respuesta==1)
            {
                alertify.success("ACTUALIZACION REALIZADA CON EXITO.");
                setTimeout("location.href='areas'");
            }
            }
          });//FIN AJAX
    }
});