//CONSULTAS CITAS-FECHA

var tabla_citas_fecha;//almacena la tabla de citas-fecha
var tabla_citas_mes;//almacena la tabla de citas-mes

$(document).on("click", "#btn_cita_fecha", function(){
    var fecha_inicial = $('#datepicker').val();
    var fecha_final = $('#datepicker2').val();
    
    //validacion de si existen las fechas
    if(fecha_inicial != "" && fecha_final != ""){
        //buscar las compras por fecha
        tabla_citas_fecha = $("#citas_fecha_data").DataTable({
          aProcessing: true, //Activamos el procesamiento del datatables
          aServerSide: true, //Paginación y filtrado realizados por el servidor
          dom: "Bfrtip", //Definimos los elementos del control de tabla
          buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
          ajax: {
            url: "../ajax/consultas_citas_admin.php?op=buscar_citas_fecha",
            type: "post",
            data: { fecha_inicial: fecha_inicial, fecha_final: fecha_final },
            error: function (e) {
              console.log(e.responseText);
            },
          },

          bDestroy: true,
          responsive: true,
          bInfo: true,
          iDisplayLength: 10, //Por cada 10 registros hace una paginación
          order: [[0, "desc"]], //Ordenar (columna,orden)

          language: {
            sProcessing: "Procesando...",

            sLengthMenu: "Mostrar _MENU_ registros",

            sZeroRecords: "No se encontraron resultados",

            sEmptyTable: "Ningún dato disponible en esta tabla",

            sInfo:
              "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",

            sInfoEmpty:
              "Mostrando registros del 0 al 0 de un total de 0 registros",

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
        });//DataTable
    } else {
        bootbox.alert("Debe seleccionar un rango de fechas.");
    }//if-fechas
});//click



$(document).on("click", "#btn_cita_mes", function(){

    var mes = $('#mes').val();
    var anyo = $('#ano').val();

    if (mes != "" && anyo != ""){
             //buscar las compras por fecha
        tabla_citas_mes = $("#citas_mes_data").DataTable({
          aProcessing: true, //Activamos el procesamiento del datatables
          aServerSide: true, //Paginación y filtrado realizados por el servidor
          dom: "Bfrtip", //Definimos los elementos del control de tabla
          buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
          ajax: {
            url: "../ajax/consultas_citas_admin.php?op=buscar_citas_mes",
            type: "post",
            data: { mes: mes, anyo: anyo },
            error: function (e) {
              console.log(e.responseText);
            },
          },

          bDestroy: true,
          responsive: true,
          bInfo: true,
          iDisplayLength: 10, //Por cada 10 registros hace una paginación
          order: [[0, "desc"]], //Ordenar (columna,orden)

          language: {
            sProcessing: "Procesando...",

            sLengthMenu: "Mostrar _MENU_ registros",

            sZeroRecords: "No se encontraron resultados",

            sEmptyTable: "Ningún dato disponible en esta tabla",

            sInfo:
              "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",

            sInfoEmpty:
              "Mostrando registros del 0 al 0 de un total de 0 registros",

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
        });//DataTable
    } else {
        bootbox.alert("Debe seleccionar un mes y un año.");
    } 
});//click