$("#guardar_estados").click(function() 
{

    var nuevo_estado=$('#nombre_estado').val();
    nuevo_estado=nuevo_estado.toUpperCase();
    var url = URLdominio+'nuevo_estado';

    $.ajax({
    
        url: url,
        type: 'GET',
        data: {
            nuevo_estado : nuevo_estado
        },
        dataType: 'json',
        success: function(respuesta){
        if(respuesta==1)
        {
            alertify.success("ESTADO GUARDADO CON EXITO.");
            setTimeout("location.href='areas'");
        }
        if(respuesta==0)
        {
            alertify.error("YA EXISTE UN ESTADO CON ESTE NOMBRE.");
        }
        }
      });//FIN AJAX
});