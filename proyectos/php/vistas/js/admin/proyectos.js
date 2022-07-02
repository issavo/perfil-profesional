var tabla;//almacena la tabla de proyectos

//funcion que se ejecuta desde el inicio
function init() {
  //mostrar todos los registros
  listar();

  //cuando se da click al boton submit entonces se ejecuta la funcion guardaryeditar(e);
  $("#proyectos_form").on("submit", function (e) {
    guardaryeditar(e);
  });

  //cambia el titulo de la ventana modal cuando se da click al boton
  $("#add_button").click(function () {
    $(".modal-title").text("Agregar proyecto");
  });
}

//funcion que limpia los campos del formulario
function limpiar() {
  $("#titulo").val("");
  $("#subtitulo").val("");
  $("#descripcion").val("");
  $("#tecnologias").val("");
  $("#duracion").val("");
  $("#estado").val("");
  $("#id_proyecto").val("");
}

//function listar
function listar() {
  tabla = $("#proyectos_data")
    .dataTable({
      aProcessing: true, //Activar el procesamiento de datatables
      aServerSide: true, //Paginación y filtrado realizados por el servidor
      dom: "Bfrtip", //Definimos los elementos del control de tabla
      buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
      ajax: {
        url: "../ajax/proyectos_admin.php?op=listar",
        type: "GET",
        dataType: "json",
        error: function (e) {
          console.log(e.responseText);
        },
      },
      bDestroy: true,
      responsive: true,
      bInfo: true,
      "¡DisplayLength!":10, //por cada 10registros hace una paginacion
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

//mostrar datos de un proyecto en la ventana modal del formulario
function mostrar(id_proyecto) {
  $.post(
    "../ajax/proyectos_admin.php?op=mostrar",
    { id_proyecto: id_proyecto },
    function (data, status) {
      data = JSON.parse(data);
      $("#proyectosModal").modal("show");
      $("#titulo").val(data.titulo);
      $("#subtitulo").val(data.subtitulo);
      $("#descripcion").val(data.descripcion);
      $("#tecnologias").val(data.tecnologias);
      $("#duracion").val(data.duracion);
      $("#estado").val(data.estado);
      $(".modal-title").text("Editar proyecto");
      $("#id_proyecto").val(id_proyecto);
      $("#proyecto_uploaded_image").html(data.proyecto_imagen);
      $("#resultados_ajax").html(data);
      //  $("#action").val("Edit");
      $("#proyecto_data").DataTable().ajax.reload();

    });
}

//funcion guardaryeditar(e); es llamada cunado se da click al boton submit
function guardaryeditar(e) {
  e.preventDefault(); //desactivar la accion predeterminada del evento
  var formData = new FormData($("#proyectos_form")[0]); //envia la informacion del formulario por post
  $.ajax({
    url: "../ajax/proyectos_admin.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      //console.log(datos);
      //alert(datos);
      $("#proyectosModal").modal("hide");
      $("#resultados_ajax").html(datos);
      $("#proyectos_data").DataTable().ajax.reload();
      limpiar();
    },
  });
}

//EDITAR ESTADO DE LA NOTICIA
//funcion para cambiar el estado 
//importante:id_noticia, est se envia por post via ajax
function cambiarEstado(id_proyecto, est) {
  bootbox.confirm("¿Está seguro de cambiar de estado?", function (result) {
    if (result) {
      $.ajax({
        url: "../ajax/proyectos_admin.php?op=activarydesactivar",
        method: "POST",
        data: { id_proyecto:id_proyecto, est:est },
        success: function (data) {
          $("#proyectos_data").DataTable().ajax.reload();
        },
      }); //ajax
    }
  }); //bootbox
}

function eliminar_proyecto(id_proyecto) {
  bootbox.confirm("¿Está seguro de eliminar el registro?", function (result) {
    if (result) {
      $.ajax({
        url: "../ajax/proyectos_admin.php?op=eliminar",
        method: "POST",
        data: { id_proyecto: id_proyecto },
        success: function (data) {
          //alert(data);
          $("#proyectos_data").DataTable().ajax.reload();
        },
      }); //ajax
    }
  }); //bootbox
}

init();
