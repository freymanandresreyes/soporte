$("#guardar_editar_estados").click(function() {

    var id_estado=$('#estado_seleccionado').val();
    var editar_estado=$('#estado_editado').val();
    var url = URLdominio+'guardar_editar_estado';
    editar_estado=editar_estado.toUpperCase();

    if(id_estado==0 || editar_estado=="")
    {
        alertify.error("TODOS LOS CAMPOS SON OBLIGATORIOS.");  
    }
    else
    {
    $.ajax({
    
        url: url,
        type: 'GET',
        data: {

            id_estado : id_estado,
            editar_estado : editar_estado
            
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
    }
  });