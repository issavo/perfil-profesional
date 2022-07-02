$(document).ready(function(){
    $("#cliente_form").on("submit", function (e) {
        e.preventDefault();

      var usuario = $("#usuario").val();
      var password1 = $("#password1").val();
      var password2 = $("#password2").val();
      var id_usuario = $("#id_usuario").val();

      if (usuario == "") {
        bootbox.alert("El campo usuario no puede estar vacío.");
        return false;
      }

      if (password1 == "") {
        bootbox.alert("El campo password no puede estar vacío.");
        return false;
      }

      if (password1 < 8) {
        bootbox.alert("La contraseña debe tener un mínimo de 8 caracteres.");
        return false;
      }
      

      if (password1 != password2) {
        bootbox.alert("Los campos password deben ser iguales.");
        return false;
      }

      $.ajax({
        url: "../../ajax/perfil_usuario.php?op=editarpassword",
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
          setTimeout(location.reload(),3000);
        },
      }); //ajax
      return false;
    });//click
});//ready