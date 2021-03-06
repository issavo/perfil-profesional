
 
$(document).ready(function(){

  $("#formContacto").submit(function () {
    /****** evaluamos los campos del formulario ************/

    /* Declaracion de variables */

    var nombreContacto = $("#nombreContacto").val();
    var telefonoContacto = $("#telefonoContacto").val();
    var emailContacto = $("#emailContacto").val();
    var fechaContacto = $("#fechaContacto").val();
    var tipoConsulta = $("#tipoConsulta").val();
    var mensajeContacto = $("#mensajeContacto").val().trim();
    var correo = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/; //expresion formato email

    //NOMBRE
    if (nombreContacto == "") {
      $("#nombreContacto").focus();
      $(".error1").show();
      $("#nombreContacto").addClass("errorInput");
      $("#nombreContacto").removeClass("ok");
      $("#mensajeNombre").text("El nombre es obligatorio");
      return false;
    } else {
      $(".error1").hide();
      $("#nombreContacto").removeClass("errorInput");
      $("#nombreContacto").addClass("ok");
    } // else ""
    if (nombreContacto.length < 5 || nombreContacto.length > 20) {
      $("#nombreContacto").focus();
      $(".error1").show();
      $("#nombreContacto").addClass("errorInput");
      $("#nombreContacto").removeClass("ok");
      $("#mensajeNombre").text("Debe introducir de 5 a 20 caracteres");
      return false;
    } else {
      $(".error1").hide();
      $("#nombreContacto").removeClass("errorInput");
      $("#nombreContacto").addClass("ok");
    } // else length
    if (!isNaN(nombreContacto)) {
      $("#nombreContacto").focus();
      $(".error1").show();
      $("#nombreContacto").addClass("errorInput");
      $("#nombreContacto").removeClass("ok");
      $("#mensajeNombre").text("Debe introducir letras");
      return false;
    } else {
      $(".error1").hide();
      $("#nombreContacto").removeClass("errorInput");
      $("#nombreContacto").addClass("ok");
    } //else isNaN

    //TELEFONO
    if (telefonoContacto == "") {
      $("#telefonoContacto").focus();
      $(".error2").show();
      $("#telefonoContacto").addClass("errorInput");
      $("#telefonoContacto").removeClass("ok");
      $("#mensajeTelefono").text("El tel??fono es obligatorio");
      return false;
    } else {
      $(".error2").hide();
      $("#telefonoContacto").removeClass("errorInput");
      $("#telefonoContacto").addClass("ok");
    }
    if (isNaN(telefonoContacto)) {
      $("#telefonoContacto").focus();
      $(".error2").show();
      $("#telefonoContacto").addClass("errorInput");
      $("#telefonoContacto").removeClass("ok");
      $("#mensajeTelefono").text("Debe introducir n??meros");
      return false;
    } else {
      $(".error2").hide();
      $("#telefonoContacto").removeClass("errorInput");
      $("#telefonoContacto").addClass("ok");
    }
    if (telefonoContacto.length < 9 || telefonoContacto.length > 16) {
      $("#telefonoContacto").focus();
      $(".error2").show();
      $("#telefonoContacto").addClass("errorInput");
      $("#telefonoContacto").removeClass("ok");
      $("#mensajeTelefono").text("Debe introducir de 9 a 15 n??meros");
      return false;
    } else {
      $(".error2").hide();
      $("#telefonoContacto").removeClass("errorInput");
      $("#telefonoContacto").addClass("ok");
    }

    //CORREO

    if (emailContacto == "") {
      $("#emailContacto").focus();
      $(".error3").show();
      $("#emailContacto").addClass("errorInput");
      $("#emailContacto").removeClass("ok");
      $("#mensajeEmail").text("El email es obligatorio");
      return false;
    } else {
      $(".error3").hide();
      $("#emailContacto").removeClass("errorInput");
      $("#emailContacto").addClass("ok");
    } //else ""
    if (!correo.test(emailContacto)) {
      $("#emailContacto").focus();
      $(".error3").show();
      $("#emailContacto").addClass("errorInput");
      $("#emailContacto").removeClass("ok");
      $("#mensajeEmail").text("Introduce un email valido");
      return false;
    } else {
      $(".error3").hide();
      $("#telefonoContacto").removeClass("errorInput");
      $("#telefonoContacto").addClass("ok");
    } //else test //los valores seleccionados con los obtenidos con la fecha actual ***************/

    //FECHA
    /**** Comparar fechas ****/ //obtener los datos de la fecha seleccionada
    var fechaContacto = $("#fechaContacto").val();
    //crear un objeto fecha para obtener la fecha en el formato input
    var fecha = new Date();
    //obtenemos los valores del dia, mes y a??o
    var dia = fecha.getDate().toString(); //dia correspondiente al mes
    if (dia.length <= 1) {
      dia = "0" + dia;
    }
    var mes = (fecha.getMonth() + 1).toString(); //a??adimos +1 por que los meses empiezan por 0
    //como el formato del mes es 00
    if (mes.length <= 1) {
      mes = "0" + mes;
    }
    var anyo = fecha.getFullYear().toString();
    var hoy = anyo + "-" + mes + "-" + dia;

    //VALIDACION
    if (!fechaContacto) {
      $("#fechaContacto").focus();
      $(".error4").show();
      $("#fechaContacto").addClass("errorInput");
      $("#fechaContacto").removeClass("ok");
      $("#mensajeFecha").text("Debe seleccionar la fecha");
      return false;
    } else if (fechaContacto.toString() < hoy) {
      $("#fechaContacto").focus();
      $("#fechaContacto").addClass("errorInput");
      $("#fechaContacto").removeClass("ok");
      $("#mensajeFecha").text(
        "No debe seleccinar una fecha inferior a la de la consulta"
      );

      return false;
    } else if (fechaContacto.toString() > hoy) {
      $(".error4").hide();
      $("#fechaContacto").removeClass("errorInput");
      $("#fechaContacto").addClass("ok");
      $("#mensajeFecha").text(
        "No debe seleccinar una fecha superior a la de la consulta"
      );
      return false;
    } else if (fechaContacto.toString() === hoy) {
      $("#fechaContacto").removeClass("errorInput");
      $("#fechaContacto").addClass("ok");
    } else {
      $(".error4").hide();
      $("#fechaContacto").removeClass("errorInput");
      $("#fechaContacto").addClass("ok");
    }

    // TIPO CONSULTA
    if (tipoConsulta == "") {
      $("#tipoConsulta").focus();
      $(".error5").show();
      $("#tipoConsulta").addClass("errorInput");
      $("#tipoConsulta").removeClass("ok");
      $("#mensajeConsulta").text("El tipo de consulta es obligatorio");
      return false;
    } else {
      $(".error5").hide();
      $("#tipoConsulta").removeClass("errorInput");
      $("#tipoConsulta").addClass("ok");
    } //else ""
    if (tipoConsulta.length < 3 || tipoConsulta.length > 15) {
      $("#tipoConsulta").focus();
      $(".error5").show();
      $("#tipoConsulta").addClass("errorInput");
      $("#tipoConsulta").removeClass("ok");
      $("#mensajeConsulta").text("Debe introducir de 3 a 15 n??meros");
      return false;
    } else {
      $(".error5").hide();
      $("#tipoConsulta").removeClass("errorInput");
      $("#tipoConsulta").addClass("ok");
    } //else length
    if (!isNaN(tipoConsulta)) {
      $("#tipoConsulta").focus();
      $(".error5").show();
      $("#tipoConsulta").addClass("errorInput");
      $("#tipoConsulta").removeClass("ok");
      $("#mensajeConsulta").text("No puede introducir n??meros");
      return false;
    } else {
      $(".error5").hide();
      $("#tipoConsulta").removeClass("errorInput");
      $("#tipoConsulta").addClass("ok");
    } //else isNaN

    //MENSAJE
    if (mensajeContacto === "") {
      $("#mensajeContacto").focus();
      $("#mensajeContacto").addClass("errorInput");
      $("#mensajeMensaje").text("El mensaje es obligatorio");
      return false;
    } else {
      $(".error6").hide();
      $("#mensajeContacto").removeClass("errorInput");
      $("#mensajeConsulta").addClass("ok");
    } //else ""

    //TERMINOS - checkbox
    var terminos = document.querySelector("#terminos");
    if (terminos.checked == false) {
      $("#terminos").focus();
      $("#mensajeTerminos").text("Debe aceptar las condiciones");
      return false;
    } else {
      $(".error7").hide();
    }

    return true;
  }); //termina submit

  // Ocultar mensajes con boton reset
  $("#boton_borrar").click(function () {
  //ocultar los textos
    $("#mensajeNombre").hide();
    $("#mensajeTelefono").hide();
    $("#mensajeEmail").hide();
    $("#mensajeFecha").hide();
    $("#mensajeConsulta").hide();
    $("#mensajeMensaje").hide();
  });
});//termina ready
    






   