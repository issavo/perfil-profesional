
var tabla;//almacena la tabla de clientes
var tabla_en_citas;//almacena la tabla de clientes que se muestra en citas con el modal clientes

//funcion que se ejecuta desde el inicio y es invocada al final del archivo
function init(){
  //mostrar todos los registros
  listar();

  //llama a la lista de clientes en ventana modal en citas.php
  listar_en_citas();

  //cuando se da click al boton submit entonces se ejecuta la funcion guardaryeditar(e);
  $("#cliente_form").on("submit", function (e) {
    guardaryeditar(e);
  });

  //cambia el titulo de la ventana modal cuando se da click al boton
  $("#add_button").click(function () {
    $(".modal-title").text("Agregar Cliente");
  });
}

//funcion que limpia los campos del formulario, no limpiar campos ocultos
function limpiar(){

    $("#nombre").val("");
    $("#apellido").val("");
    $("#direccion").val("");
    $("#telefono").val("");
    $("#correo").val("");
    $("#rol").val();
    $("#estado").val("");
}


//function listar 
function listar(){
    tabla = $("#cliente_data")
      .dataTable({
        "aProcessing": true, //Activar el procesamiento de datatables
        "aServerSide": true, //Paginación y filtrado realizados por el servidor
        dom: "Bfrtip", //Definimos los elementos del control de tabla
        "buttons": ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
        "ajax": {
          url: "../ajax/clientes_admin.php?op=listar",
          type: "GET",
          dataType: "json",
          error: function (e) {
            console.log(e.responseText);
          },
        },
        "bDestroy":true,
        "responsive":true,
        "bInfo":true,
        "¡DisplayLength!": 10, //por cada 10 registros hace una paginacion
        "order": [[0, "desc"]], //ordenar(columna,orden)
        "language": {
          "sProcessing": "Procesando...",

          "sLengthMenu": "Mostrar _MENU_ registros",

          "sZeroRecords": "No se encontraron resultados",

          "sEmptyTable": "Ningún dato disponible en esta tabla",

          "sInfo": "Mostrando un total de _TOTAL_ registros",

          "sInfoEmpty": "Mostrando un total de 0 registros",

          "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",

          "sInfoPostFix": "",

          "sSearch": "Buscar:",

          "sUrl": "",

          "sInfoThousands": ",",

          "sLoadingRecords": "Cargando...",

          "oPaginate": {
            "sFirst": "Primero",

            "sLast": "Último",

            "sNext": "Siguiente",

            "sPrevious": "Anterior",
          },

          "oAria": {
            "sSortAscending":
              ": Activar para ordenar la columna de manera ascendente",

            "sSortDescending":
              ": Activar para ordenar la columna de manera descendente",
          },
        }, //cerrando language
      }).DataTable();
}

//mostrar datos de un cliente en la ventana modal del formulario
function mostrar(id_cliente){
    $.post("../ajax/clientes_admin.php?op=mostrar",{id_cliente:id_cliente}, function(data, status){
      //console.log(data);
        data = JSON.parse(data);
            $('#clienteModal').modal('show');
            $("#nombre").val(data.nombre);
            $("#apellidos").val(data.apellidos);
            $("#direccion").val(data.direccion);
            $("#telefono").val(data.telefono);
            $("#usuario").val(data.usuario);
            $("#correo").val(data.correo);
            $("#rol").val(data.rol);
            $("#estado").val(data.estado);
            $(".modal-title").text("Editar cliente");
            $("#id_cliente").val(id_cliente);
            // $("#action").val("Edit");
    });
}
//funcion guardaryeditar(e); llamada cunado se da click al boton submit del formulario en el modal
function guardaryeditar(e){
    e.preventDefault();//desactivar la accion predeterminada del evento
    var nombre = $("#nombre").val();
    var apellidos = $("#apellidos").val();
    var direccion = $("#direccion").val().trim();
    var telefono =  $("#telefono").val();
    var usuario = $("#usuario").val();
    var correo = $("#correo").val();
    var rol = $("#rol").val();
    var estado = $("#estado").val();
    var id_cliente = $("#id_cliente").val();

    if (nombre == "" || apellidos == "" || direccion == "" || usuario == "" || correo == "" || rol == "" || estado == ""){
      $('#clienteModal').modal('hide');
        setTimeout($("#resultados_ajax").html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><p>No se pueden dejar campos vacíos.</p></div>'), 3000);
        return false;
    }
        $.ajax({
            url: "../ajax/clientes_admin.php?op=guardaryeditar",
            type: "POST",
            dataType: "json",
            data:{nombre:nombre, apellidos:apellidos, direccion:direccion, telefono:telefono, usuario:usuario, correo:correo, rol:rol, estado:estado, id_cliente:id_cliente},
            success: function(datos){
              //console.log(datos);
                $("#clienteModal").modal("hide");
              if (datos.error){
                 $("#resultados_ajax").html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>'+ datos.error +'</div>'); 
              }
              if (datos.exito) {
                 $("#resultados_ajax").html('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>'+ datos.exito +'</div>');   
              }  
            }
        });//ajax
        return false;

}

//EDITAR ESTADO DEL CLIENTE
//funcion para cambiar el estado del cliente
//importante:id_cliente, est se envia por post via ajax
function cambiarEstado(id_cliente,est){
    bootbox.confirm("¿Está seguro de cambiar de estado?", function(result){
        if (result){
            $.ajax({
                url: "../ajax/clientes_admin.php?op=activarydesactivar",
                method: "POST",
                data:{id_cliente:id_cliente, est:est},
                success: function(data){
                    $('#cliente_data').DataTable().ajax.reload();
                }
            });//ajax
        }
    });//bootbox
}

function eliminar_cliente(id_cliente) {
  bootbox.confirm("¿Está seguro de eliminar el registro?", function (result) {
    if (result) {
      $.ajax({
        url: "../ajax/clientes_admin.php?op=eliminar",
        method: "POST",
        data: {id_cliente:id_cliente},
        success: function (data) {
          //alert(data);
          $("#cliente_data").DataTable().ajax.reload();
        },
      }); //ajax
    }
  }); //bootbox
}

// MODULO CITAS ADMINISTRADOR
//listar clientes en el modulo de citas
function listar_en_citas(){
  tabla_en_citas = $("#lista_clientes_data").dataTable({
    aProcessing: true, //Activar el procesamiento de datatables
    aServerSide: true, //Paginación y filtrado realizados por el servidor
    dom: "Bfrtip", //Definimos los elementos del control de tabla
    buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
    ajax: {
      url: "../ajax/clientes_admin.php?op=listar_en_citas",
      type: "GET",
      dataType: "json",
      error: function (e) {
        console.log(e.responseText);
      }
    },
    bDestroy: true,
    responsive: true,
    bInfo: true,
    iDisplayLength: 5, //Por cada 5 registros hace una paginación
    order: [[0, "desc"]], //Ordenar (columna,orden)
    language: {
      sProcessing: "Procesando...",

      sLengthMenu: "Mostrar _MENU_ registros",

      sZeroRecords: "No se encontraron resultados",

      sEmptyTable: "Ningún dato disponible en esta tabla",

      sInfo: "Mostrando un total de _TOTAL_ registros",

      sInfoEmpty: "Mostrando un total de 0 registros",

      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",

      sInfoPostFix: "",

      sSearch: "Buscar:",

      sUrl: "",

      sInfoThousands: ",",

      sLoadingRecords: "Cargando...",

      oPaginate: {
        sFirst: "Primero",

        sLast: "Último",

        sNext: "Siguiente",

        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",

        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    }, //cerrando language
  }).DataTable();//DataTable
}

//AUTOCOMPLETAR DATOS DEL CLIENTE EN CITAS
function agregar_registro(id_cliente,est){
  $.ajax({
    url: "../ajax/clientes_admin.php?op=buscar_cliente",
    type: "POST",
    data:{id_cliente:id_cliente,est:est},
    dataType: "json",
    success: function (data) {
      //console.log(data);
      /*si el cliente esta activo entonces se ejecuta, de lo contrario 
            el formulario no se envia y aparecerá un mensaje */
      if (data.estado) {
        $("#modalCliente").modal("hide");
        $("#nombre").val(data.nombre);
        $("#apellidos").val(data.apellidos);
        $("#direccion").val(data.direccion);
        $("#telefono").val(data.telefono);
        $("#usuario").val(data.usuario);
        $("#correo").val(data.correo);
        // $("#estado").val(data.estado);
        $("#id_cliente").val(id_cliente);
      } else {
        bootbox.alert(data.error);
      } //cierre condicional error
    },
  });//ajax
}//function
//invocamos la funcion init
init();