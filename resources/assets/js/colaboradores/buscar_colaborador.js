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
              if(respuesta==null){
                console.log(respuesta);
              }if(count(respuesta)>0){
                
              }
          } //fin del success
        });//fin de ajax
        e.preventDefault();
        return (e.which != 13);
    }
});