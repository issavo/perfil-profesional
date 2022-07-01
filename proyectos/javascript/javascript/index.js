



$(document).ready(function () {
  /********mostrar texto inicio******************/

  setTimeout(function () {
    // $("#contenedor_inicio2").hide();
    $("#contenedor_inicio2").fadeIn();
    $("#contenedor_inicio2").fadeOut(); //milisegundos
  }, 1500);



  /************** cargar secciones****************/
  //PORTFOLIO
      $.ajax({
        type: "POST",
        url: "./html/portfolio.html",
        success: function (data) {
          $("#portfolio").html(data);
        },
      });

  //SERVICIOS
      $.ajax({
        type: "POST",
        url: "./html/servicios.html",
        success: function (data) {
          $("#section_servicios").html(data);
        },
      });
  // PRESUPUESTO3
      $.ajax({
        type: "POST",
        url: "./html/presupuesto3.html",
        success: function (data) {
          $("#form_presupuesto").html(data);
        },
      });
  // CONTACTO
      $.ajax({
          type: "POST",
          url: "./html/contacto.html",
          success: function (data) {
            $("#content_contacto").html(data);
          },
        });
  // NOTICIAS
      $.ajax({
        type: "POST",
        url: "./html/noticias.html",
        success: function (data) {
          $("#noticia").html(data);
        },
      });
  // UBICACION
      $.ajax({
        type: "POST",
        url: "./html/ubicacion.html",
        success: function (data) {
          $("#ubicacion").html(data);
        },
      });

  // /******* Fijar el mapa ********/
  //obtener la distancia del menu a la seccion
  // var altura = $("footer").offset().top;
  // alert(altura);//son 1043.03125px
  // $(window).on("scroll", function () {
  //   if ($(window).scrollTop() > altura) {
  //     $("#ubicacion").addClass(".mapa_fijo");
  //   } else {
  //     $("#ubicacion").removeClass(".mapa_fijo");
  //   }
  // });
}); //termina ready
