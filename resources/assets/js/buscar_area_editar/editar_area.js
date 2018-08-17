// alert("ok");
$(function() {
    $(document).on('click', 'input[type="button"]', function(event) {
       let id = this.id;
       var url= URLdominio+'editar_area';
      
       $.ajax({
    
        url: url,
        type: 'GET',
        data: {
          id : id
        },
        dataType: 'json',
        success: function(respuesta){
          $('#form').html(respuesta);

            $( "#editar_area" ).addClass( "show" );

            $("#editar_area").css({
            "display": "block",
            "padding-right": "16px",
            "background": "rgba(0, 0, 0, 0.5)"
            });


            $( "#cerrar_editar" ).click(function() {
            $( "cerrar_editar" ).removeClass( "show" );
            $("#editar_area").css({
              "display": "none"
            });
            });
        }
      });//FIN AJAX
     });
   });