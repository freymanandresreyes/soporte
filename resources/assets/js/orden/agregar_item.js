$("#agregar_compra").click(function(){
    // var id_user = $("#id").val();
    var id_area_actual = $("#id_area_actual").val();
    var area = $("#area").val();
    var item = $("#item").val();
    if (area=="" || item==""){
        alertify.error("NO PUEDEN HABER CAMPOS VACIOS");
        return false;
    }
    if (id_area_actual == area){
        alertify.error("NO PUEDES HACER UNA ORDEN A TU PROPIA AREA");
        return false;
    }
    // console.log(id_user);
    // console.log(id_area_encargada);
    // console.log(area);
    // console.log(item);
    var conteo = $("#encabezado_items tr:last");
    // alert(conteo[0][0]);
    //  e.preventDefault();
    var fila = '<tr class="dato"><td> ' +
        item +
        '</td>'+'<td><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button></td></tr>';
    //alert(fila);
    conteo.after(fila);
    $("#area").prop('disabled',true);
    // $("#area").val("");
    $("#item").val("");
});