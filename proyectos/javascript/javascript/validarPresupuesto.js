//Asociar evento al boton para almacenar los datos en variables
// $('btnEnviar').click(function(){
//     var nombrePresupuesto = document.getElementById('nombrePresupuesto').value;
//     var apellidosPresupuesto = document.getElementById('apellidosPresupuesto').value;
//     var correoPresupuesto = document.getElementById('correoPresupuesto').value;
//     var telefonoPresupuesto = document.getElementById('telefonoPresupuesto').value;

// //variable que almacena los datos del formulario
//   var ruta = "nombre: " + nombrePresupuesto + "&Apellidos: "+ apellidosPresupuesto + "&correo: " + correoPresupuesto +
//                 "&telefono: " + telefonoPresupuesto;
// //llamada  a ajax
//     $.ajax({
//         url: "./php/datosformulariopresupuesto.php",
//         type: "POST",
//         data: ruta,
//     });

// }); //termina click

$(document).ready(function inicio(){
  //asociamos el evento al boton para validar el formulario
    $('#btnEnviar').on("click", validarForm);
    
/***** calcular presupuesto ******/
//LLamada a la funcion calcular por cada elemento en el que se produzca un cambio (evento)
//select
  $("select[id=tipoPresupuesto]").change(function () {
    //alert($("select[id=tipoPresupuesto]").val());
    calcular();
    $("input[id=presupuesto]").val($(this).val());
  });
  $("select[id=plazoPresupuesto]").change(function () {
    //alert($("select[id=plazoPresupuesto]").val());
    calcular();
    $("input[id=presupuesto]").val($(this).val());
    $("input[id=presupuesto]").val($(this).val() * 100 + " %");
  });

//checkbox
  $("input[type=checkbox]").click(function () {
    //alert($("input[type=checkbox]:checked").val($(this).val()));
    calcular();
  });

//funcion calcular para recoger los valores de cada elemento
  var paginaSeleccionada, plazoSeleccionado, secciones, seccionSeleccionada, coste, coste_total, resultado;
  function calcular() {
    paginaSeleccionada = parseFloat($("select[id=tipoPresupuesto]").val());
    plazoSeleccionado = parseFloat($("select[id=plazoPresupuesto]").val());
//recorremos todos los input checkbox
      //var seccion = $("input[type=checkbox]");// recorrera todos los checkbox
    secciones = $("input[type=checkbox]:checked"); //recorre solo los marcados
    seccionSeleccionada = 0;
          secciones.each(function () {
            //alert($(this).val());
            seccionSeleccionada = seccionSeleccionada  + parseFloat($(this).val());
          });
    //alert(seccionSeleccionada);
    $("input[id=presupuesto]").val(seccionSeleccionada); 

  }//termina calcular

//Realizar calculos tras el evento click asociado al boton enviar
$('#btnEnviar').click(function () {
    coste = paginaSeleccionada + seccionSeleccionada;
    coste_total = parseFloat(coste) * plazoSeleccionado;
    resultado = parseFloat(coste - coste_total);
    //alert(resultado);
    $('input[id=presupuesto]').val(resultado);

//No mostrar el valor de la variable resultado (NaN), cuando no se selecciona ningún campo del presupuesto
    if (isNaN(resultado)) {
      $("input[id=presupuesto]").val(resultado);
    } else {
      $("input[id=presupuesto]").val(resultado + " €");
    }
  });   
  
// Ocultar mensajes con boton reset
$('#btn_borrar').click(function(){
    $('#mensajeDatosPer').hide();
    $('#mensajeDatosWeb').hide();
    $('#mensajePresupuesto').hide();
});

});//termina ready


/************ DATOS PERSONALES *************/
//VARIABLES 
var formulario = document.getElementById("formularioPresupuesto");//acceder al formulario
var nombrePresupuesto = document.getElementById('nombrePresupuesto');
var apellidosPresupuesto = document.getElementById('apellidosPresupuesto');
var correoPresupuesto = document.getElementById('correoPresupuesto');
var telefonoPresupuesto = document.getElementById('telefonoPresupuesto');
var observaciones = document.getElementById("observaciones");
//Expresiones Regulares
var nombre = /^[a-zA-ZÀ-ÿ\s]{1,40}$/;//letras, con acentos y espacios
var correo = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
var numero = /^[^0-9]+$/;
var telefono = /^\d{7,14}$/ // 7 a 14 numeros.

/*****  FUNCIONES  VALIDACION CAMPOS  *****/

/** DATOS PERSONALES **/

//NOMBRE
function validarNombre(){
    if (nombrePresupuesto.value == "" ){
        $('#nombrePresupuesto').focus();
        $("#mensajeDatosPer").addClass('inputError');
        $('#mensajeDatosPer').html('<p>El campo nombre es obligatorio</p>');
        return false;
    } else if (nombrePresupuesto.value.length < 2 || nombrePresupuesto.value.length > 15){
            $("#nombrePresupuesto").focus();
            $("#mensajeDatosPer").addClass("inputError");
            $("#mensajeDatosPer").html("<p>Debe introducir de 2 a 15 caracteres</p>");
            return false;
        } else if(!isNaN(nombrePresupuesto.value)){
                $("#nombrePresupuesto").focus();
                $("#mensajeDatosPer").addClass("inputError");
                $("#mensajeDatosPer").html("Debe introducir letras");
              } else if(!nombre.test(nombrePresupuesto.value)) {
                  $("#nombrePresupuesto").focus();
                  $("#mensajeDatosPer").addClass("inputError");
                  $("#mensajeDatosPer").html("<p>No puede introducir números ni caracteres especiales</p>"); 
                  return false; 
                } else {}
    return true;                     
}//termina validarNombre

//APELLIDOS
function validarApellidos(){
  if (apellidosPresupuesto.value == ""){
      $("#apellidosPresupuesto").focus();
      $("#mensajeDatosPer").addClass('inputError');
      $("#mensajeDatosPer").html("<p>El campo apellidos es obligatorio</p>");
      return false;
  } else if (apellidosPresupuesto.value.length < 5 || apellidosPresupuesto.value.length > 30) {
          $("#ApellidosPresupuesto").focus();
          $("#mensajeDatosPer").addClass("inputError");
          $("#mensajeDatosPer").html("<p>Debe introducir de 5 a 30 caracteres</p>");
          return false;
      } else if (!isNaN(apellidosPresupuesto.value)){
            $("#apellidosPresupuesto").focus();
            $("#mensajeDatosPer").addClass("inputError");
            $("#mensajeDatosPer").html("Debe introducir letras");
            return false;
        } else if (!nombre.test(apellidosPresupuesto.value)) {
              $("#apellidosPresupuesto").focus();
              $("#mensajeDatosPer").addClass("inputError");
              $("#mensajeDatosPer").html("<p>No puede introducir números ni caracteres especiales</p>");
              return false;
          } 
    return true;
}//termina validarApellidos

//CORREO

function validarCorreo(){
  if (correoPresupuesto.value == ""){
      $("#correoPresupuesto").focus();
      $("#mensajeDatosPer").addClass("inputError");
      $("#mensajeDatosPer").html("<p>El campo email es obligatorio</p>");
      $("#mensajeDatosPer").show();
  } else if (!correo.test(correoPresupuesto.value)) {
        $("#correoPresupuesto").focus();
        $("#mensajeDatosPer").addClass("inputError");
        $("#mensajeDatosPer").html("<p>Debe introducir un email válido</p>");
        return false;
    }
  return true;
}//termina validarCorreo

//TELEFONO
function validarTel(){
  if (telefonoPresupuesto.value == ""){
      $("#telefonoPresupuesto").focus();
      $("#mensajeDatosPer").addClass("inputError");
      $("#mensajeDatosPer").html("<p>El campo telefono es obligatorio</p>");
      return false;
     } else if (telefonoPresupuesto.value.length < 7 || telefonoPresupuesto.value.length > 14) {
        $("#telefonoPresupuesto").focus();
        $("#mensajeDatosPer").addClass("inputError");
        $("#mensajeDatosPer").html("<p>Debe introducir de 7 a 14 números</p>");
        return false;
     } else if (isNaN(telefonoPresupuesto.value)){
          $("#telefonoPresupuesto").focus();
          $("#mensajeDatosPer").addClass("inputError");
          $("#mensajeDatosPer").html("<p>Debe introducir sólo números</p>");
          return false;
     } else if (!numero.test(telefono.value)){
            $("#telefonoPresupuesto").focus();
            $("#mensajeDatosPer").addClass("inputError");
            $("#mensajeDatosPer").html("<p>Debe introducir números, sin espacios ni caracteres especiales</p>");
            return false;
        }
    return true;
}//termina validarTel



/*** DATOS WEB ***/
//SELECT
//TIPO DE PAGINA
var tipo = document.getElementById('tipoPresupuesto');
function validarTipo(){
  if (tipo.value == ""){
     $("#tipoPresupuesto").focus();
     $("#mensajeDatosWeb").addClass('inputError');
     $("#mensajeDatosWeb").html('<p>Debe seleccionar un tipo de página</p>');
     return false;
  } else {
      $("#mensajeDatosWeb").html("<p>Ha seleccionado un tipo de página</p>");
      $("#mensajeDatosWeb").addClass('ok');
      $("#mensajeDatosWeb").removeClass('inputError');
  }
    return true;
       
}//termina validarTipo

//PLAZO
var plazo = document.getElementById('plazoPresupuesto');
function validarPlazo(){
  if (plazo.value == "") {
    $("#plazoPresupuesto").focus();
    $("#mensajeDatosWeb").addClass('inputError');
    $("#mensajeDatosWeb").html('<p>Debe seleccionar un plazo aproximado</p>');
    return false;
  } else {
      $("#mensajeDatosWeb").html('<p>Ha seleccionado un tipo de página</p>');
      $("#mensajeDatosWeb").addClass('ok');
      $("#mensajeDatosWeb").removeClass('inputError');
    }
  return true;
   
}//termina validarPlazo


//CHECKBOX
//var secciones = $("input[type='checkbox']:checked");
// var secciones = document.getElementsByName('secciones');//accedemos a todos los elementos checkbox
// var j = 0;
// var contador = 0
// function validarSeccion(){
//   if (j !== 0){
//     for (var i = 0; i < secciones.length; i++) {
//       if (secciones[i].value.checked) {
//         j++;
//         contador = contador + 50;
//         alert(contador);
//       }
//     }
//   }

/*******  VALIDACION FORMULARIO   *********/
// var inputs = document.querySelectorAll('#formularioPresupuesto input');
//acceder a todos los campos del formulario, obtenemos un array con querySelectorAll()
  function validarForm(e){
    $("#mensajePresupuesto").hide();
      //alert('hola');
    if(validarNombre(e) && validarApellidos(e) && validarCorreo(e) && validarTel(e) && validarTipo(e) && validarPlazo(e)) {
      $("#mensajePresupuesto").focus();
      $("#mensajePresupuesto").removeClass("inputError");
      $("#mensajePresupuesto").removeClass("error");
      $("#mensajePresupuesto").show();
      $('#mensajePresupuesto').html('<p>El formulario ha sido enviado. Nos pondremos en contacto con usted lo antes posible</p>');
      $('p').hide();
      $('#nota').show();
      return true;
    } else {
      $("#mensajePresupuesto").focus();
      $("#mensajePresupuesto").show();
      $('#mensajePresupuesto').html('<p>El formulario no se ha podido enviar, por favor revise los datos introducidos</p>');
      $('#mensajePresupuesto').addClass('inputError');
      $('#mensajePresupuesto').addClass('error');
      $("#mensajePresupuesto").removeClass('ok');
      $("p").show();
      return false;
    }
  }



















    
















