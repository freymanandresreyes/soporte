$('#crear_orden').click(function()
{
   var lider_remitente = $('#lider').val();
   var area_remitente = $('#area_remitente').val();
   var area_receptora = $('#area_receptora').val();
   var item1 = $('#item1').val();
   var item2 = $('#item2').val();

   if(area_receptora==0)
   {
    alertify.error("TODOS LOS CAMPOS SON OBLIGATORIOS.");  
   }
   console.log(item1.toUpperCase());
});