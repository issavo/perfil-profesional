//llamada a la funcion editar_perfil
$("#form_perfil_cliente").on("submit", function (e) {
  editar_perfil_cliente(e);
});



//mostrar perfil del cliente
function mostrar_perfil_cliente(usuario)
{
    $.post("../../ajax/perfil_cliente.php?op=mostrar_perfil",{usuario:usuario},function(data,status){
    var data = JSON.parse(data);
        //console.log(data);
          
        $("#nombre_perfil").val(data.nombre);
        $("#apellidos_perfil").val(data.apellidos);
        $("#direccion_perfil ").val(data.direccion);
        $("#telefono_perfil").val(data.telefono);
        $("#usuario_perfil").html(data.usuario);
        $("#correo_perfil").val(data.correo);
        $("#id_cliente_perfil").val(data.id_cliente); 
        $("#estado_cliente").val(data.estado);
    });
}

function editar_perfil_cliente(e)
{
    e.preventDefault();
    var nombre =  $("#nombre_perfil").val();
    var apellidos =  $("#apellidos_perfil").val();
    var direccion =  $("#direccion_perfil ").val().trim();
    var telefono = $("#telefono_perfil").val();
    var usuario = $("#usuario_perfil").val();
    var correo = $("#correo_perfil").val();
    var id_cliente = $("#id_cliente_perfil").val();  
    
    if (nombre == "" && apellidos == "" && direccion == "" && telefono == "" && usuario == "" && correo == "" && id_cliente == ""){
        bootbox.alert("No se pueden dejar campos vacíos.");
        return false;
    } else {
        $.ajax({
            url: "../../ajax/perfil_cliente.php?op=editar_perfil",
            type:"POST",
            data:{nombre:nombre,
                apellidos:apellidos,
                direccion:direccion,
                telefono:telefono,
                usuario:usuario,
                correo:correo,
                id_cliente:id_cliente
            },
            success:function (data) {
                //alert(data);
                //console.log(data);
                $('#resultados_ajax').html(data);
                 setTimeout(location.reload(), 1500);
            }

        });
    }
}