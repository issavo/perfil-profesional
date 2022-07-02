var tabla_citas_cliente;//mustra las citas correspondientes a un cliente

//mostrar aviso de 72 horas modificar fecha
$(document).on("click", '.update', function(){
    bootbox.alert("Una vez transcurridas 72 horas, a partir de la fecha de alta, no se podrá modificar la cita.");
});

//asociar evento al boton de editar que ejecuta la funcion editar(e);
  $("#form_actualizar_citas").on("submit", function (e) {
    editar(e);
  });

//metodo para registrar una cita CITAS-CLIENTE
function registrarCitaCliente(){
  /*Se declaran las variables que se usan en el data de agregarRegistro, sino da error*/
  var id_cita = $("#id_cita").val();
  var nombre = $("#nombre_perfil").val();
  var apellidos = $("#apellidos_perfil").val();
  var telefono = $("#telefono_perfil").val();
  var usuario = $("#usuario_perfil").val();
  var dia = $("#dia").val();
  var hora = $("#hora").val();
  var usuario_alta = $("#usuario_alta").html();
  var estado = $("#estado").val();
  //validacion fecha
  //alert(dia);
  //crear un objeto fecha 
  var fecha = new Date();
//alert(fecha)
  // valores del dia, mes y año
  var day = fecha.getDate().toString(); //dia correspondiente al mes
  if (day.length <= 1) {
    day = "0" + day;
  }
  //alert(day);
  var mes = (fecha.getMonth() + 1).toString(); //añadimos +1 por que los meses empiezan por 0
  //como el formato del mes es 00
  if (mes.length <= 1) {
    mes = "0" + mes;
  }
  //alert(mes);
  var anyo = fecha.getFullYear().toString();
  //alert(anyo);
  var fecha = anyo + "-" + mes + "-" + day;
  //alert(fecha);
if (dia < fecha){
  bootbox.alert("No puede seleccionar una fecha inferior al día de hoy.");
  return false;
}

  //validacion campos
  if (dia != "" && hora != "" && estado != "") {
    $.ajax({
      url: "../../ajax/citas_admin.php?op=insertar",
      method: "POST",
      data: {
        id_cita: id_cita,
        nombre: nombre,
        apellidos: apellidos,
        telefono: telefono,
        usuario: usuario,
        dia: dia,
        hora: hora,
        usuario_alta: usuario_alta,
        estado: estado,
      },
      cache: false,
      // dataType: "html",
      success: function (data) {
        //console.log(data);
        data = JSON.parse(data);
        if (data.error) {
          $("#resultados_citas_ajax").html(
            '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>' + data.error + '</div>'
          );
        } else {
          $("#resultados_citas_ajax").html(
            '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>' + data.exito + '</div>'
          );
          //refresca la pagina, se llama a la funtion explode
          setTimeout(explode(), 5000);
        }
       
      }, //success
    }); //ajax
  } else {
    bootbox.alert("Debe agregar un día, una hora y un estado a la cita");
    return false;
  }
} 
//funcion para listar las citas segun el cliente
   function listar_en_cliente(){
       var usuario = $("#cliente").val();
        tabla_citas_cliente = $("#citas_cliente_data").dataTable({
        aProcessing: true, //Activar el procesamiento de datatables
        aServerSide: true, //Paginación y filtrado realizados por el servidor
        dom: "Bfrtip", //Definimos los elementos del control de tabla
        buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
        ajax: {
          url: "../../ajax/citas_cliente.php?op=listar_en_cliente",
          type: "POST",
          data:{usuario:usuario},
          dataType: "json",
          error: function (e) {
            console.log(e.responseText);
          },
        },
        bDestroy: true,
        responsive: true,
        bInfo: true,
        DisplayLength: 10, //por cada 10 registros hace una paginacion
        order: [[0, "desc"]], //ordenar(columna,orden)
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
            sFirst: " Primero ",

            sLast: " Último ",

            sNext: " Siguiente ",

            sPrevious: " Anterior ",
          },

          oAria: {
            sSortAscending:
              ": Activar para ordenar la columna de manera ascendente",

            sSortDescending:
              ": Activar para ordenar la columna de manera descendente",
          },
        }, //cerrando language
      })
      .DataTable();
}

//mostrar datos de una cita en ventana modol detalle_cita_modal.php
//asociar evento a la clase .detalle  del boton 
$(document).on("click", '.detalle', function(){
    //recoger el valor del id
    var id_cita = $(this).attr("id");
    $.ajax({
      url: "../../ajax/citas_admin.php?op=ver_detalle_cita",
      method:"POST",
      data:{id_cita:id_cita},
      cache:false,
      dataType:"json",
      success: function (data) {
        //alert(data);
        console.log(data);
        $("#nombreModal").html(data.nombre);
        $("#apellidosModal").html(data.apellidos);
        $("#telefonoModal").html(data.telefono);
        $("#usuarioModal").html(data.usuario);
        $("#id_citaModal").html(data.id_cita);
        $("#clienteModal").html(data.usuario);
        $("#diaModal").html(data.dia);
        $("#horaModal").html(data.hora);
        $("#fecha_altaModal").html(data.fecha_alta);
        $("#usuario_altaModal").html(data.usuario_alta);
        $("#estadoModal").html(data.estado);
      }
    });
});

//mostrar datos de una cita en modal editar_fecha.php

function mostrar(id_cita){
     $.post("../../ajax/citas_cliente.php?op=mostrar",{id_cita:id_cita}, function(data, status){
            //console.log(data);
        data = JSON.parse(data);
            $("#nombre").val(data.nombre);
            $("#apellidos").val(data.apellidos);
            $("#telefono").val(data.telefono);
            $("#usuario").val(data.usuario);
            $("#dia").val(data.dia);
            $('#hora').val(data.hora);
            $('#fecha_alta').val(data.fecha_alta);
            $('#usuario_alta').val(data.usuario_alta);
            $("#estado").val(data.estado);
            $("#id_cita").val(id_cita); 
        
    });//ajax
}//click

//funcion que controla la modificacion de la cita
function editar(e){
  e.preventDefault();
  var id_cita = $("#id_cita").val();
  var nombre = $("#nombre").val();
  var apellidos = $("#apellidos").val();
  var telefono = $("#telefono").val();
  var usuario = $("#usuario").val();
  var dia = $("#dia_modificar").val();
  var hora = $("#hora_modificar").val();
  var fecha_alta = $("#fecha_alta").val();
  var usuario_alta = $("#usuario_alta").html();
  var estado = $("#estado").val(); //obtener los datos de la fecha seleccionada

  if (dia == "" && hora == "" && estado == ""){
    bootbox.alert("Debe seleccionar un día, una hora y el estado de la cita.");
  }
   
  //crear un objeto fecha para obtener la fecha en el formato input
  var fecha = new Date();
  //alert(fecha);
  //obtenemos los valores del dia, mes y año
  var day = fecha.getDate().toString(); //dia correspondiente al mes
  if (day.length <= 1) {
    day = "0" + day;
  }
  //alert(day);
  var mes = (fecha.getMonth() + 1).toString(); //añadimos +1 por que los meses empiezan por 0
  //como el formato del mes es 00
  if (mes.length <= 1) {
    mes = "0" + mes;
  }
  //alert(mes);
  var anyo = fecha.getFullYear().toString();
  //alert(anyo);
  var fecha = anyo + "-" + mes + "-" + day;
  //alert(fecha);

  if (dia < fecha ){
    bootbox.alert("No puede seleccionar una fecha inferior al día de hoy.");
    return false;
  }
  $.ajax({
    url: "../../ajax/citas_cliente.php?op=editar",
    type: "POST",
    data: {
      id_cita: id_cita,
      nombre: nombre,
      apellidos: apellidos,
      telefono: telefono,
      usuario: usuario,
      dia: dia,
      hora: hora,
      fecha_alta: fecha_alta,
      usuario_alta: usuario_alta,
      fecha_alta: fecha_alta,
      estado: estado,
      fecha:fecha
    },
    success: function (data){
        //console.log(data);  
     var data = JSON.parse(data);
      if (data.error){
        $("#citaModal").modal('hide');
        bootbox.alert(data.error); 
      }
      if (data.error2){
        $("#citaModal").modal('hide');
        bootbox.alert(data.error2);  
      }
      if (data.exito){
          $("#citaModal").modal("hide");
          bootbox.alert(data.exito);
          setTimeout(location.reload(), 4000);
      }
    }
  });

}






      

