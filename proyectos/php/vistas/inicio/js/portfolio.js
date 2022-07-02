$(document).ready(function () {
  var imagenes = document.querySelectorAll("#contenedor_portfolio img"); // imagenes
  //textos = new Array();
  textos = document.querySelectorAll("#contenedor_portfolio p"); //textos

  $("#contenedor_portfolio p").hide(); //ocultar textos
  for (var i = 0; i < imagenes.length; i++) {
    $(imagenes[i])
      .width(300)
      .height(350)
      .click(function () {
        $(this).animate({
              marginTop: "10px",
              width: "340px",
              height: "380px",
            },
            500,function () {
              for (var i = 0; i < textos.length; i++) {
                $(textos[i]).show(500);
              } //termina for

              //delay realiza una pausa en el efecto
            }).delay(500); //termina animate

        $(this).animate({
            marginTop: "0px",
            width: "300px",
            height: "350px",
          },
          3000,
          function () {
            $("#contenedor_portfolio p").fadeOut(3000);
          }
        );
      }); //termina click
  } //termina for
}); //termina ready
