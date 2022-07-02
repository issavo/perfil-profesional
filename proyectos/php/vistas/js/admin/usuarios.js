
var tabla;//almacena la tabla de usuarios

//funcion que se ejecuta desde el inicio
function init(){
  //mostrar todos los registros
  listar();

  //cuando se da click al boton submit entonces se ejecuta la funcion guardaryeditar(e);
  $("#usuario_form").on("submit", function (e) {
    guardaryeditar(e);
  });

  //cuando se da click al boton submit entonces se ejecuta la funcion editarpassword(e);
  $("#cliente_form").on("submit", function (e) {
    editarpassword(e);
  });

  //cambia el titulo de la ventana modal cuando se da click al boton
  $("#add_button").click(function () {
    $(".modal-title").text("Agregar Usuario");
  });
}

//funcion que limpia los campos del formulario
function limpiar(){
    $("#cargo").val("");
    $("#usuario").val("");
    $("#password1").val("");
    $("#password2").val("");
    $("#rol").val("");
    $("#estado").val("");
    $("#id_usuario").val("");
}


//function listar 
function listar(){
    tabla = $("#usuario_data")
      .dataTable({
        "aProcessing": true, //Activar el procesamiento de datatables
        "aServerSide": true, //Paginación y filtrado realizados por el servidor
        dom: "Bfrtip", //Definimos los elementos del control de tabla
        "buttons": ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
        "ajax": {
          url: "../ajax/usuarios_admin.php?op=listar",
          type: "GET",
          dataType: "json",
          error: function (e) {
            console.log(e.responseText);
          },
        },
        "bDestroy":true,
        "responsive":true,
        "bInfo":true,
        "¡DisplayLength!": 10, //por cada 10registros hace una paginacion
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

//mostrar datos de un usuario en la ventana modal del formulario
function mostrar(id_usuario){
    $.post(
      "../ajax/usuarios_admin.php?op=mostrar",
      { id_usuario: id_usuario },
      function (data, status) {
        data = JSON.parse(data);
        $("#usuarioModal").modal("show");
        $("#usuario").val(data.usuario);
        $("#password1").val(data.password1);
        $("#password2").val(data.password2);
        $("#rol").val(data.rol);
        $("#estado").val(data.estado);
        $(".modal-title").text("Editar Usuario");
        $("#id_usuario").val(id_usuario);
        $("#action").val("Edit");
      }
    );
}
 //la funcion guardaryeditar(e); se llama cuando se da click al boton submit  
      
      function guardaryeditar(e){

      	e.preventDefault(); //No se activará la acción predeterminada del evento
      	var formData = new FormData($("#usuario_form")[0]);
      	var password1= $("#password1").val();
	      var password2= $("#password2").val();
            
             //si el password conincide entonces se envia el formulario
	         if(password1 == password2){

               $.ajax({
                 url: "../ajax/usuarios_admin.php?op=guardaryeditar",
                 type: "POST",
                 data: formData,
                 contentType: false,
                 processData: false,
                 success: function (datos) {
                   //console.log(datos);
                   $("#usuarioModal").modal("hide");
                   $("#resultados_ajax").html(datos);
                   $("#usuario_data").DataTable().ajax.reload();
                 },
               });//ajax

	         } //cierre de la validacion


	         else {

                 bootbox.alert("No coincide el password");
	         }

      }  


//EDITAR ESTADO DEL USUARIO
//funcion para cambiar el estado del usuario
//los parametros id_usuario, est son enviados por POST via ajax
function cambiarEstado(id_usuario,est){
    bootbox.confirm("¿Está seguro de cambiar de estado?", function(result){
        if (result){
            $.ajax({
              url: "../ajax/usuarios_admin.php?op=activarydesactivar",
              method: "POST",
              data: { id_usuario: id_usuario, est: est },
              success: function (data) {
                $("#usuario_data").DataTable().ajax.reload();
              },
            });//ajax
        }
    });//bootbox
}

function eliminar_usuario(id_usuario) {
  bootbox.confirm("¿Está seguro de eliminar el registro?", function (result) {
    if (result) {
      $.ajax({
        url: "../ajax/usuarios_admin.php?op=eliminar",
        method: "POST",
        data: { id_usuario: id_usuario },
        success: function (data) {
          //alert(data);
          $("#usuario_data").DataTable().ajax.reload();
        },
      }); //ajax
    }
  }); //bootbox
}

// ADMINISTRADOR
//funcion para editar el password del administrador
function editarpassword(e) {
  e.preventDefault();
  var usuario = $("#usuario").val();
  var password1 = $("#password1").val();
  var password2 = $("#password2").val();
  var id_usuario = $("#id_usuario").val();

  if (usuario == "" && password1 == "" && password2 == ""){
    bootbox.alert("No se pueden dejar camòs vacíos.");
    return false;
  }
  if (password1 != password2){
    bootbox.alert("Las contraseñas deben ser iguales.");
    return false;
  }
  $.ajax({
    url: "../ajax/perfil_usuario.php?op=editarpassword",
    type: "POST",
    data: {
      usuario: usuario,
      password1: password1,
      password2: password2,
      id_usuario: id_usuario,
    },
    success: function (data) {
      //alert(data);
      //console.log(data);
      $("#resultados_ajax").html(data);
      setTimeout(location.reload(), 5000);
    },
  }); //ajax
  return false;
}


init();