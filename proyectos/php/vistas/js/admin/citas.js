var tabla;//almacena la tabla citas
var tabla_detalle_cita;//almacena los detalles de una cita en el detalle_cita_modal.php 
var tabla_modal;//almacena la tabla de citas en el modal_lista_fechas_clientes.php 

//funcion que se ejecuta desde el inicio
function init(){
  //mostrar todos los registros en consultar_citas.php
  listar();
  //llama a la lista de citas en ventana modal de modal_lista_fechas_clientes.php
  listar_citas_modal();
}

//cuando se da click al boton submit entonces se ejecuta la funcion guardaryeditar(e);
  $("#form_actualizar_citas").on("submit", function (e) {
    editar(e);
  });

//function listar 
function listar(){
    tabla = $("#citas_data").dataTable({
        "aProcessing": true, //Activar el procesamiento de datatables
        "aServerSide": true, //Paginación y filtrado realizados por el servidor
        dom: "Bfrtip", //Definimos los elementos del control de tabla
        "buttons": ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
        "ajax": {
          url: "../ajax/citas_admin.php?op=listar",
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
//mostrar datos de una cita en modal editar_cita.php

function mostrar(id_cita){
     $.post("../ajax/citas_admin.php?op=mostrar",{id_cita:id_cita}, function(data, status){
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

//funcion guardaryeditar(e); es llamada cunado se da click al boton submit
function editar(e){
    e.preventDefault();//desactivar la accion predeterminada del evento
  
    var id_cita = $("#id_cita").val();
    var nombre = $("#nombre").val();
    var apellidos = $("#apellidos").val();
    var telefono = $("#telefono").val();
    var usuario = $("#usuario").val();
    var dia = $("#dia_modificar").val();
    var hora = $("#hora_modificar").val();
    var fecha_alta = $("#fecha_alta").val();
    var usuario_alta = $("#usuario_alta").html();
    var estado = $("#estado").val();

    if (nombre == "" && apellidos == "" && telefono == ""){
      bootbox.alert("Debe introducir los datos del usuario.");
      return false;
    }
    if(dia == "" && hora == "" && estado == ""){
      bootbox.alert("Debe introducir un día, una hora y el estado de la cita ha modificar.");
      return false;
    }
      $.ajax({
          url: "../ajax/citas_admin.php?op=editar",
          type: "POST",
          data: {id_cita:id_cita, nombre:nombre, apellidos:apellidos, telefono:telefono,usuario:usuario, dia:dia, hora:hora, fecha_alta:fecha_alta,usuario_alta:usuario_alta, fecha_alta:fecha_alta, estado:estado},
          dataType:"json",
          success: function(datos){
            //console.log(datos);
            if(datos.error){
              $("#citaModal").modal("hide");
               $("#resultados_ajax").html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>'+ datos.error +'</div>'); 

            } else {
              $("#citaModal").modal("hide");
              $('#citas_data').DataTable().ajax.reload();
              setTimeout(location.reload(), 500);
               $("#resultados_ajax").html('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>'+ datos.exito +'</div>'); 
            } 
          }
      });//ajax

}//editar

//EDITAR ESTADO DE LA CITA
//importante:id_cita, est se envia por post via ajax
function cambiarEstado(id_cita,est){
    bootbox.confirm("¿Está seguro de cambiar de estado?", function(result){
        if (result){
            $.ajax({
                url: "../ajax/citas_admin.php?op=cambiar_estado_cita",
                method: "POST",
                data:{id_cita:id_cita, est:est},
                success: function(data){
                  //actualizar tabla
                  $("#citas_data").DataTable().ajax.reload();
                  //actualizar tabla citas-fecha
                  $("#citas_fecha_data").DataTable().ajax.reload();
                  //actualizar tabla citas-mes
                  $("#citas_mes_data").DataTable().ajax.reload();
                }
            });//ajax
        }
    });//bootbox
}
//funcion para eliminar una cita
function eliminar_cita(id_cita) {
  bootbox.confirm("¿Está seguro de eliminar el registro?", function (result) {
    if (result) {
      $.ajax({
        url: "../ajax/citas_admin.php?op=eliminar",
        method: "POST",
        data: { id_cita: id_cita },
        success: function (data) {
          //alert(data);
          $("#resultados_ajax").html(data);
          $("#citas_data").DataTable().ajax.reload();
         
        },
      }); //ajax
    }
  }); //bootbox
}

// mostrar tabla citas en ventana modal de formulario alta citas
function listar_citas_modal()
{
  tabla_modal = $("#lista_citas_data").dataTable({
        aProcessing: true, //Activar el procesamiento de datatables
        aServerSide: true, //Paginación y filtrado realizados por el servidor
        dom: "Bfrtip", //Definimos los elementos del control de tabla
        buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
        ajax: {
          url: "../ajax/citas_admin.php?op=listar_en_modal",
          type: "GET",
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
      })
      .DataTable();
}

/*IMPORTANTE function agregarDetalle y function listarDetalles:
	detalles pertenece al arreglo detalles[]
	Para agregar elementos a un arreglo en javascript, se utiliza el metodo push()
	Se puede agregar variables u objetos, he agregado un objeto que contiene mucha informacion, lo que sería como una fila con muchas columnas.
	Para crear un objeto de ese tipo (con columnas), se utliliza :
	var obj = { }
	Dentro de las llaves defines columna y valor (Todo esto para una fila) asi:
	nombre_columna : valor
	El lenght 
	sirve para calcular la longitud del arreglo o el numero de objetos que tiene el arreglo, que es lo mismo Y lo necesito en el for. Se puede agregar un id y name al td*/
    
  //declaramos un arreglo vacio
	var detalles = [];
	 function agregarRegistro(id_cita, estado){

	 	// alert(estado);

		      $.ajax({
					url:"../ajax/citas_admin.php?op=buscar_cita",
					method:"POST",
					data:{id_cita:id_cita, estado:estado},
					cache: false,
					dataType:"json",
					success:function(data){
            if(data.id_cita){
                if (typeof data == "string"){
                  data = JSON.parse(data);  
                 }
                console.log(data);
		                
/*var obj: es un objeto que contiene la informacion de una fila con muchas columnas.
	Para crear un objeto de ese tipo (con columnas):
	var obj = { }, Dentro de las llaves definas columna y valor (Todo esto para una fila), se define:
  nombre_columna : valor 
	Este var obj es un objeto que trae la informacion de la data (../ajax/citas_admin.php?op=buscar_cita)*/

                var obj = {
                  cantidad: 1,
                  id_cita: data.id_cita,
                  nombre: data.nombre,
                  apellidos: data.apellidos,
                  telefono : data.telefono,
                  usuario: data.usuario,
                  dia: data.dia,
                  hora: data.hora,
                  fecha_alta: data.fecha_alta,
                  usuario_alta: data.usuario_alta,
                  estado: data.estado
                };
		                
/* detalles.push(obj);:  se utiliza el metodo push() para agregar elementos a un arreglo.
	El detalles de detalles.push(obj); viene de detalles = [], una vez se agrega el objeto al arreglo llamamos a la function listarDetalles(); 
			*/
                detalles.push(obj);
                listarDetalles();
					      $("#fechaModal").modal("hide");
//if validacion id_cita
            } else {
                //si la cita está ACTIVA entonces se muestra una ventana modal
                  bootbox.alert(data.error);
            }
						
					}//fin success		

				});//fin de ajax
	  
		  }// fin de funcion

/*IMPORTANTE: El lenght 
	sirve para calcular la longitud del arreglo o el numero de objetos que tiene el arreglo, Y es necesario en el for*/
 function listarDetalles() {
   $("#listClienCitas").html("");

   var filas = "";

    for (var i = 0; i < detalles.length; i++) {
      if (detalles[i].estado == 1) {
        var filas =
         filas +
         "<tr><td>" +
         (i + 1) +
         "</td> <td name='id_cita[]'>" +
         detalles[i].id_cita +
         "</td> <td name='nombre[]' id='nombre[]'>" +
         detalles[i].nombre +
         "</td> <td name='apellidos[]' id='apellidos[]'>" +
         detalles[i].apellidos +
         "</td> <td name='telefono[]' id='telefono[]'>" +
         detalles[i].telefono +
         "</td> <td name='usuario[]' id='usuario'>" +
         detalles[i].usuario +
         "</td> <td name='dia[]' id='dia'>" +
         detalles[i].dia +
         "</td> <td name='hora[]' id='hora'>" +
         detalles[i].hora +
         "</td> <td name='fecha_alta[]' id='fecha_alta'>" +
         detalles[i].fecha_alta +
         "</td> <td name='usuario_alta[]' id='usuario_alta'>" +
         detalles[i].usuario_alta +
         "</td> <td name='estado[]' id='estado'>" +
         detalles[i].estado +
         "</span> </td> <td>  <button href='#' class='btn btn-danger btn-lg' role='button' onClick='eliminarCita(event, " + i + ");' aria-pressed='true'><span class='glyphicon glyphicon-trash'></span> </button></td> </tr>";
      }//if
    }//for

   $("#listClienCitas").html(filas);
 }

/*Event es el objeto del evento que los manejadores de eventos utilizan*/
  	function  eliminarCita(event, idx){
  		event.preventDefault();
  		detalles[idx].estado = 0;
  		listarRegistros();
  	}

function registrarCitaCliente() {
  /*Se declaran las variables que se usan en el data de agregarRegistro, sino da error*/
  var id_cita = $("#id_cita").val();
  var nombre = $("#nombre").val();
  var apellidos = $("#apellidos").val();
  var telefono = $("#telefono").val();
  var usuario = $("#usuario").val();
  var dia = $("#dia").val();
  var hora = $("#hora").val();
  var usuario_alta = $("#usuario_alta").html();
  var estado = $("#estado").val();

  //validacion campos vacíos, datos cita
  if (nombre == "" && apellidos == "" && telefono == "") {
    bootbox.alert("Dbe seleccionar un cliente.");
  }
  if (dia != "" && hora != "" && estado != "") {
    $.ajax({
      url: "../ajax/citas_admin.php?op=insertar",
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
      dataType: "json",
      success: function (data) {
        //console.log(data);
        if (data.error) {
          $("#resultados_citas_ajax").html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>'+ data.error +'</div>'); 
        } else {
          $("#resultados_citas_ajax").html('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>'+ data.exito +'</div>'); 
          setTimeout(explode(),3000);
        }
      }, //success
    }); //ajax
  } else {
    bootbox.alert("Debe agregar un día, una hora y un estado a la cita");
    return false;
  }
}

/*RESFRESCA LA PAGINA DESPUES DE REGISTRAR LA CITA*/
function explode(){
	location.reload();
}


//mostrar datos de una cita en ventana modol detalle_cita_modal.php
//asociar evento a la clase .detalle  del boton 
$(document).on("click", '.detalle', function(){
    //recoger el valor del id
    var id_cita = $(this).attr("id");
    $.ajax({
      url: "../ajax/citas_admin.php?op=ver_detalle_cita",
      method:"POST",
      data:{id_cita:id_cita},
      cache:false,
      dataType:"json",
      success: function (data) {
        //console.log(data);
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
//invocamos la funcion init
init();