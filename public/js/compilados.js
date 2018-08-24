//captura la direccion del servidor
function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
  }
  var URLdominio = getAbsolutePath();
$("#nuevo_colaborador").click(function() {
  
    $("#editar_colaborador").css({ display: "none" });;

    $("#colaborador").addClass("show");

    $("#colaborador").css({
      display: "block",
      "padding-right": "16px",
      background: "rgba(0, 0, 0, 0.5)"
    });

    $("#cerrar_modal_colaborador").click(function() {
      $("#documento").val("");
      $("#nombres").val('');
      $("#apellidos").val('');
      $("#telefono").val('');
      $("#correo").val('');
      $("#contraseña").val("");
      $("#area").val('');
      $("colaborador").removeClass("show");
      $("#colaborador").css({ display: "none" });
      $('#mensaje').html(respuesta);
    });

});
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
            //   alert(respuesta[1]);
              if(respuesta=='null'){
                alertify.error("ESTE USUARIO NO EXISTE");
                  $("#id").val('');
                  $("#nombres").val('');
                  $("#apellidos").val('');
                  $("#telefono").val('');
                  $("#correo").val('');
                  $("#contraseña").val("");
                  $("#area").val('');
                $('#nombres').prop('disabled',false);
                $('#apellidos').prop('disabled', false);
                $('#telefono').prop('disabled', false);
                $('#correo').prop('disabled', false);
                $("#contraseña").prop("disabled", false);
                $("#crear_colaborador").prop("disabled", false);
                  $("#contraseña").css({ display: "block" });; 
                  $("#area").css({ display: "none" });;
                  $("#label_area").css({ display: "none" });;
                $("#label_contraseña").css({ display: "block" });;
                $("#crear_colaborador").css({ display: "block" });;
                $("#guardar_colaborador").css({ display: "none" });;
                return false;
              }if(respuesta[1]!='null'){
                  console.log(respuesta);
                alertify.log("ESTE USUSARIO YA TIENE UN AREA ASIGNADA");
                  $('#nombres').prop('disabled', true);
                  $('#apellidos').prop('disabled', true);
                  $('#telefono').prop('disabled', true);
                  $('#correo').prop('disabled', true);
                  $('#contraseña').prop('disabled', true);
                  $('#area').prop('disabled', true);
                  $("#area").css({ display: "block" });;
                  $("#label_area").css({ display: "block" });;
                  $("#guardar_colaborador").css({ display: "none" });;
                  $("#id").val(respuesta[0]['id']);
                  $("#nombres").val(respuesta[0]['nombres']);
                  $("#apellidos").val(respuesta[0]['apellidos']);
                  $("#telefono").val(respuesta[0]['telefono']);
                  $("#correo").val(respuesta[0]['email']);
                  $("#area").val(respuesta[1][0]['area_nombre']);
                  $("#crear_colaborador").css({ display: "none" });;
                  $("#contraseña").css({ display: "none" });;
                  $("#label_contraseña").css({ display: "none" });;
                  $('#guardar_colaborador').prop('disabled', true);
                return false;
              }if(respuesta[1]==['null']){
                alertify.success("ESTE USUSARIO ESTA LIBRE PARA AGREGAR A TU AREA");
                $("#guardar_colaborador").css({ display: "block" });; 
                $('#nombres').prop('disabled', true);
                $('#nombres').prop('disabled', true);
                $('#apellidos').prop('disabled', true);
                $('#telefono').prop('disabled', true);
                $('#correo').prop('disabled', true);
                $('#contraseña').prop('disabled', true)
                $("#id").val(respuesta[0]["id"]);
                $("#nombres").val(respuesta[0]['nombres']);
                $("#apellidos").val(respuesta[0]['apellidos']);
                $("#telefono").val(respuesta[0]['telefono']);
                $("#correo").val(respuesta[0]['email']);
                  $("#area").val("");
                  $("#crear_colaborador").css({ display: "none" });; 
                  $("#area").css({ display: "none" });;
                  $("#label_area").css({ display: "none" });;
                  $("#contraseña").css({ display: "none" });;
                  $("#label_contraseña").css({ display: "none" });;
                $("#guardar_colaborador").prop("disabled", false);
                return false;
              }
          } //fin del success
        });//fin de ajax
        e.preventDefault();
        return (e.which != 13);
    }
});
$('#crear_colaborador').click(function(){
    var documento = $("#documento").val();
    var nombres = $("#nombres").val();
    var apellidos = $("#apellidos").val();
    var telefono = $("#telefono").val();
    var email = $("#correo").val();
    var password = $("#contraseña").val();
    var url = getAbsolutePath() + 'crear_colaborador';

if(documento=="" || nombres=="" || apellidos=="" || telefono=="" || email=="" || password==""){
    alertify.error("TODOS LOS CAMPOS SON REQUERIDOS");
    return false;
}

    $.ajax({
        url: url,
        type: "GET",
        data: {
            documento: documento,
            nombres: nombres,
            apellidos: apellidos,
            telefono: telefono,
            email: email,
            password: password
        },
        dataType: "json",
        success: function (respuesta) {
            if(respuesta==1){
                alertify.success("USUARIO AGREGADO CORRECTAMENTE");
                $("#id").val("");
                $("#documento").val("");
                $("#nombres").val('');
                $("#apellidos").val('');
                $("#telefono").val('');
                $("#correo").val('');
                $("#contraseña").val("");
                $("#area").val('');
                $("colaborador").removeClass("show");
                $("#colaborador").css({ display: "none" });
                $('#mensaje').html("");
                setTimeout(function () {
                    location.reload();
                }, 100);
                return false;
            }else{
            $('#mensaje').html(respuesta);
            return false;
            }     
        } //fin del success
    });//fin de ajax
});
$("#guardar_colaborador").click(function(){
    var id = $("#id").val();
    var url = getAbsolutePath() + "agregar_area_colaborador";

    $.ajax({
        url: url,
        type: "GET",
        data: {
            id: id
        },
        dataType: "json",
        success: function (respuesta) {
            if(respuesta){
                alertify.success("USUARIO AGREGADO CORRECTAMENTE");
                $("#id").val("");
                $("#documento").val("");
                $("#nombres").val("");
                $("#apellidos").val("");
                $("#telefono").val("");
                $("#correo").val("");
                $("#contraseña").val("");
                $("#area").val("");
                $("colaborador").removeClass("show");
                $("#colaborador").css({ display: "none" });
                $("#mensaje").html("");
                setTimeout(function () {
                    location.reload();
                }, 100);
                return false;
            }
        } //fin del success
    });//fin de ajax
});
$("#colaboradores_tabla").on("click", ".estado_colaborador", function(event) {
  var id_colaborador = this.name;
  var url = getAbsolutePath() + "estado_colaborador";
    
  $.ajax({
    url: url,
    type: "GET",
    data: {
      id_colaborador: id_colaborador
    },
    dataType: "json",
    success: function(respuesta) {
        if(respuesta==1){
            alertify.error("HUBIERON PROBLEMAS, HABLA CON EL ADMINISTRADOR!!");
            return false;
        }else{
            alertify.success("DATOS ALMACENADOS CORRECTAMENTE");
            setTimeout(function() {
              location.reload();
            }, 100);
        }
    } //fin del success
  }); //fin de ajax
});
$("#agregar_item").click(function(){
    $("#agregar_item").prop('disabled',true);
    var id_area_actual = $("#id_area_actual").val();
    var area = $("#area").val();
    var item = $("#item").val();
    if (area=="" || item==""){
    $("#agregar_item").prop("disabled", false);
        alertify.error("NO PUEDEN HABER CAMPOS VACIOS");
        return false;
    }
    if (id_area_actual == area){
    $("#agregar_item").prop("disabled", false);
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
    $("#agregar_item").prop('disabled', false);
});
// alert('hola');
$('#guardar_orden').click(function () {
    // ****** VARIABLES ******
    var id_area_enviada = $("#area").val();
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
        id_area_enviada: id_area_enviada,
        id_area_encargada: id_area_encargada,
        data: data
      },
      dataType: "json",
      success: function(respuesta) {
          if(respuesta){
              alertify.success("DATOS ALMACENADOS CORRECTAMENTE!!");
              setTimeout(function () {
                  location.reload();
              }, 100);
          }
          else{
              alertify.error("HA OCURRIDO UN PROBLEMA.");
              return false;
          }
        // $('#contenido_factura').html(respuesta);
        // setTimeout("location.href='crear_devoluciones'");
      } //fin del success
    });//fin de ajax

    //  *********** FIN AJAX **************
    // location.reload();
});
$("#requerimientos_tabla").on("click", ".ver_orden", function(event) {
  var id_orden = this.name;

  var url = getAbsolutePath() + "ver_orden";

  $.ajax({
    url: url,
    type: "GET",
    data: {
      id_orden: id_orden
    },
    dataType: "json",
    success: function(respuesta) {
        console.log(respuesta);
      // if (respuesta == 1) {
      //     alertify.error("HUBIERON PROBLEMAS, HABLA CON EL ADMINISTRADOR!!");
      //     return false;
      // } else {
      //     alertify.success("DATOS ALMACENADOS CORRECTAMENTE");
      //     setTimeout(function () {
      //         location.reload();
      //     }, 100);
      // }
    } //fin del success
  }); //fin de ajax
});