$(document).ready(function(){

	$("#form_login").on("submit", function (e) {
    e.preventDefault();//evitar que actualice la pag
    var usuario = $.trim($("#usuario").val());
    var password = $.trim($("#password").val());
    var enviar = $("#enviar").val();

    if (usuario == "" || password == ""){
      bootbox.alert("Introduzca los datos de acceso.");
      return false;
    } else {
        $.ajax({
          url: "ajax/login.php",
          type: "POST",
          data: { usuario: usuario, password: password, enviar: enviar },
          success: function (datos) {
            //console.log(datos);
              var datos = JSON.parse(datos);
              if (datos.error){
                $("#resultados_ajax").html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>'+ datos.error +'</div>');
              } 
              if (datos.rol == "1"){
                window.location = "vistas/usuarios.php";
              } else if (datos.rol == "2"){
                 window.location = "vistas/cliente/citas.php";
              } else if (datos.rol == "3"){
                window.location = "vistas/usuario/alta_cliente.php";
              }
            }
        }); //ajax
      return false;
    } 
  });//submit
});//ready
