$('#crear_area').click(function()
{
    var lider=$('#lider').val();
    var area=$('#area').val();
    var url = URLdominio+'crear_area';
    
    area=area.toUpperCase();

    if(lider==0 || area=="")
    {
        alertify.error("TODOS LOS CAMPOS SON OBLIGATORIOS.");  
    }
    else
    {
        $.ajax({
            url: url,
            type: 'GET',
            data: {
              lider: lider,
              area: area
            },
            dataType: 'json',
            success: function(respuesta){
            if(respuesta==0)
            {
                alertify.error("ESTE LIDER YA TIENE UN AREA ASIGNADA.");
            }
            else if(respuesta==1)
            {
                alertify.success("AREA CREADA CON EXITO.");
                setTimeout("location.href='areas'");
            }
            }//fin del success
          });//fin de ajax 
    }
});