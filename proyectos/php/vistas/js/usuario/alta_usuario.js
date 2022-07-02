$(document).ready(function () {
 
  $("#btnSend").on("click",function () {

    var correo = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    //Expresiones regulares

    //validar usuario
    if ($("#usuario").val() == "") {
      bootbox.alert("Introduzca un usuario");
      return false;
    } 
    if (!correo.test($("#usuario").val())) {
      bootbox.alert("Introduzca un email valido.");
      return false;
    } 
    //validar password1
    if ($("#password1").val() == "") {
      bootbox.alert("Introduzca una contraseña.");
      return false;
    } 

    if ($("#password1").val().length < 8) {
      bootbox.alert("Para una contraseña segura, minímo 8 caracteres.");
        return false;
    } 
    
    //validar password2
    if ($("#password2").val() == "") {
      bootbox.alert("Debe repetir la contraseña.");
        return false;
    }
    //validar passwords
    if ($("#password1").val() != $("#password2").val()) {
      bootbox.alert("Las contraseñas deben ser iguales.");
        return false;
    } 
      var usuario = $("#usuario").val();
      var password1 = $("#password1").val();
      var password2 = $("#password2").val();
      var rol = $("#rol").val();
      var id_usuario = $("#id_usuario").val();
      var enviar = $("#enviar").val();
      var est = $("#estado").val();
      
      $.ajax({
          url: "../../ajax/alta_usuario.php",
          type: "POST",
          dataType:"json",
          data: {
            usuario:usuario,
            password1:password1,
            password2:password2,
            id_usuario:id_usuario,
            rol:rol,
            enviar:enviar,
            estado:est,
          },
          success: function (datos) {
            //alert(datos);
            //console.log(datos);
            if(datos.exito){
              $("#resultados_ajax").html('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>¡Bien hecho!</strong>'+ ' '+ datos.exito + '<div>');
            } else {
             
              $("#resultados_ajax").html(' <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error! </strong>'+''+ datos.error +'</div>');   
            }
          },
      });//ajax
        return false;
  });//click
  
}); //ready

//funcion que limpia los campos del formulario
function limpiar(){
    $("#usuario").val("");
    $("#password1").val("");
    $("#password2").val("");
}



