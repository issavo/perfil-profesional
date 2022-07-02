var tabla;

//funcion que se ejecuta desde el inicio
function init() {
  //mostrar todos los registros
  listar();

  //cuando se da click al boton submit entonces se ejecuta la funcion guardaryeditar(e);
  $("#noticias_form").on("submit", function (e) {
    guardaryeditar(e);
  });

  //cambia el titulo de la ventana modal cuando se da click al boton
  $("#add_button").click(function () {
    $(".modal-title").text("Agregar noticia");
  });
}

//funcion que limpia los campos del formulario
function limpiar() {
  $("#titulo").val("");
  $("#subtitulo").val("");
  $("#texto").val("");
  $("#tecnologias").val("");
  $("#usuario").val("");
  $("#estado").val("");
  $("#id_noticia").val("");
}

//function listar
function listar() {
  tabla = $("#noticias_data")
    .dataTable({
      aProcessing: true, //Activar el procesamiento de datatables
      aServerSide: true, //Paginación y filtrado realizados por el servidor
      dom: "Bfrtip", //Definimos los elementos del control de tabla
      buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
      ajax: {
        url: "../ajax/noticias_admin.php?op=listar",
        type: "GET",
        dataType: "json",
        error: function (e) {
          console.log(e.responseText);
        },
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
    })
    .DataTable();
}

//mostrar datos de una noticia en la ventana modal del formulario
function mostrar(id_noticia) {
  $.post(
    "../ajax/noticias_admin.php?op=mostrar",
    { id_noticia: id_noticia },
    function (data, status) {
      data = JSON.parse(data);
      $("#noticiasModal").modal("show");
      $("#titulo").val(data.titulo);
      $("#subtitulo").val(data.subtitulo);
      $("#texto").val(data.texto);
      $("#tecnologias").val(data.tecnologias);
      $("#usuario").val(data.usuario);
      $("#estado").val(data.estado);
      $(".modal-title").text("Editar noticia");
      $("#id_noticia").val(id_noticia);
      $("#action").val("Edit");
    }
  );
}
//funcion guardaryeditar(e); es llamada cunado se da click al boton submit
function guardaryeditar(e) {
  e.preventDefault(); //desactivar la accion predeterminada del evento
  var formData = new FormData($("#noticias_form")[0]); //envia la informacion del formulario por post
  $.ajax({
    url: "../ajax/noticias_admin.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      //console.log(datos);
      $("#noticias_form")[0].reset();
      $("#noticiasModal").modal("hide");
      $("#resultados_ajax").html(datos);
      $("#noticias_data").DataTable().ajax.reload();
      limpiar();
    },
  });
}

//EDITAR ESTADO DE LA NOTICIA
//funcion para cambiar el estado 
//importante:id_noticia, est se envia por post via ajax
function cambiarEstado(id_noticia, est) {
  bootbox.confirm("¿Está seguro de cambiar de estado?", function (result) {
    if (result) {
      $.ajax({
        url: "../ajax/noticias_admin.php?op=activarydesactivar",
        method: "POST",
        data: { id_noticia:id_noticia, est:est },
        success: function (data) {
          $("#noticias_data").DataTable().ajax.reload();
        },
      }); //ajax
    }
  }); //bootbox
}

function eliminar_noticia(id_noticia) {
  bootbox.confirm("¿Está seguro de eliminar el registro?", function (result) {
    if (result) {
      $.ajax({
        url: "../ajax/noticias_admin.php?op=eliminar",
        method: "POST",
        data: {id_noticia: id_noticia},
        success: function (data) {
          //alert(data);
          $("#noticias_data").DataTable().ajax.reload();
        },
      }); //ajax
    }
  }); //bootbox
}

init();
