
//cuando se da click al boton submit entonces se ejecuta la funcion guardarCliente(e);
$("#btnGuardar").on("click", function (e) {
	
  		guardarCliente(e);
	
});




//la funcion guardaryeditar(e); se llama cuando se da click al boton submit
function guardarCliente(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	var nombre = $('#nombre').val();
	var apellidos = $('#apellidos').val();
	var telefono = $('#telefono').val();
	var direccion = $('#direccion').val().trim();
	var usuario = $('#usuario').val();
	var correo = $('#correo').val();
	var estado = $('#estado').val();
	var rol = $('#rol').val();
	var id_cliente = $('#id_cliente').val();
	//Expresiones regulares
	var email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    
// NOMBRE
	if (nombre == ""){
		$("#resultados_ajax").html(' <div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong><p>No se pueden dejar el campo nombre vacío.</p> </div>');
		return false;
        }
		
		
	if (nombre.length < 3){
		$("#resultados_ajax").html(' <div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong><p>El campo nombre debe tener un mínimo de 3 caracteres .</p> </div>');
		return false;
	}
	if (nombre.length > 30){
		$("#resultados_ajax").html(' <div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong><p>El campo nombre debe tener un máximo de 30 caracteres .</p> </div>');
		return false;
	}

// APELLIDOS
	if (apellidos == "") {
    $("#resultados_ajax").html(
      ' <div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong><p>No se pueden dejar el campo apellidos vacío.</p></div>'
    );
    return false;
  	}
	if (apellidos.length < 3){
		$("#resultados_ajax").html(' <div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong><p>El campo apellidos debe tener un mínimo de 3 caracteres .</p> </div>');
		return false;
	}
	if (apellidos.length > 30){
		$("#resultados_ajax").html(' <div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong><p>El campo apellidos debe tener un máximo de 30 caracteres .</p> </div>');
		return false;
	}

// DIRECCION
	if (direccion === ""){
		$("#resultados_ajax").html(' <div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong><p>No se pueden dejar el campo dirección vacío.</p></div>');
		return false;
    }

	if (direccion.length < 5){
		$("#resultados_ajax").html(' <div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong><p>El campo dirección debe tener un mínimo de 5 caracteres .</p> </div>');
		return false;
	}
	if (direccion.length > 200){
		$("#resultados_ajax").html(' <div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong><p>El campo dirección debe tenerun máximo de 200 caracteres .</p> </div>');
		return false;
	}

//TELEFONO 
	if (telefono == "" ){
		$("#resultados_ajax").html(' <div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong><p>No se pueden dejar el campo teléfono vacío.</p></div>');
		return false;
        }
	if (isNaN(telefono)){
		$("#resultados_ajax").html(' <div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong><p> Debe introducir solo números en el campo teléfono, sin espacios ni caracter exraño.</p> </div>');
		return false;
	}
	if (telefono.length < 9){
		$("#resultados_ajax").html(' <div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong><p>El campo teléfono debe tener un mínimo de 9 caracteres.</p> </div>');
		return false;
	}
	if (telefono.length > 15){
		$("#resultados_ajax").html(' <div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong><p>El campo teléfono debe tener un máximo de 15 caracteres.</p> </div>');
		return false;
	}

//CORREO 
	if (correo == "" ){
		$("#resultados_ajax").html(' <div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong><p>No se pueden dejar el campo correo vacío.</p></div>');
		return false;
    }

	if (correo.length > 50){
		$("#resultados_ajax").html(' <div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong><p>El campo correo debe tener un máximo de 50 caracteres.</p> </div>');
		return false;
	}

	if (!email.test(correo)){
		$("#resultados_ajax").html(' <div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong><p>En el campo correo debe introducir un correo valido.</p> </div>');
		return false;
	}
	$.ajax({
		url: "../../ajax/alta_cliente.php?op=guardarCliente",
		type: "POST",
		data:{nombre:nombre, apellidos:apellidos, direccion:direccion, telefono:telefono, usuario:usuario,correo:correo, estado:estado, rol:rol, id_cliente:id_cliente},
		beforeSend: function(data){
			//alert(data);
		},
		success: function(data)
		{                    
		   // console.log(data);
			var data = JSON.parse(data);
			if(data.exito){
              $("#resultados_ajax").html('<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>¡Bien hecho!</strong>'+ ' '+ data.exito + '<div>');
			  window.location = "../../cliente/citas.php";
            } else {
             
              $("#resultados_ajax").html(' <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error! </strong>'+''+ data.error +'</div>');   
            }
				
		}//success
		
	});//ajax
	return false;
}	

		


