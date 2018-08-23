// alert('hola');
$('#guardar_orden').click(function () {
    // ****** VARIABLES ******
    var id_user = $("#id").val();
    var id_area_encargada = $("#id_area_encargada").val();
    var data = Array();
    $("#encabezado_items tr").each(function(i, v) {
      data[i] = Array();
      $(this)
        .children("td")
        .each(function(ii, vv) {
          data[i][ii] = $(this).text();
        });
    });
    data.splice(0, 1);

    console.log(data);

    // ********* INICIO AJAX ************
    var url = getAbsolutePath() + 'guardar_orden';
    $.ajax({
      url: url,
      type: "GET",
      data: {
        id_user: id_user,
        id_area_encargada: id_area_encargada,
        data: data
      },
      dataType: "json",
      success: function(respuesta) {
        // $('#contenido_factura').html(respuesta);
        // setTimeout("location.href='crear_devoluciones'");
      } //fin del success
    });//fin de ajax

    //  *********** FIN AJAX **************
    // location.reload();
});