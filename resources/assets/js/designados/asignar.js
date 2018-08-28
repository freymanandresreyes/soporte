$("#tabla_items").on("click", ".asignar_item_colaborador_guardar", function(event){
  var valores = [];
  $(this)
    .parents("tr")
    .find("td")
    .each(function() {
      var celda = $(this).html() + "\n";
      console.log(celda);
      valores.push(celda);
    });
//   alert(valores);

  console.log(valores[2]);
//   for (var i = 0; i < valores.length; i++) 
//   {
    // if(valores[2]=="" || valores[3]=="")
    // {
    //     alertify.error("LOS CAMPOS SON OBLIGATORIOS");
    //     event.preventDefault();
    //     return false;
    // }
    // console.log('cambpos llenos');
//   }
  event.preventDefault();
});