var formulario = document.getElementById("formulario");//acceder al formulario
var inputs = document.querySelectorAll('#formulario input');
//acceder a todos los campos del formulario, obtenemos un array con querySelectorAll()



const expresiones = {
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    password: /^.{4,12}$/, // 4 a 12 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

var campos = {
    nombre: false,
    usuario: false,
    telefono: false,
    correo: false,
    password: false,
    nombre: false
}

function validarFormulario(e){//recibe como parametro el objeto formulario
//console.log(e.target.name); => identificar cada uno de los imputs que se validan
    switch (e.target.name) {// accedemos al input que inicio del evento por el atributo name de todos los campos
        case "nombre":
//invocamos a la funcion validarCampo pasando los tres argumentos correspondientes en cada caso de cada campo
                validarCampo(expresiones.nombre, e.target, 'nombre');           
            break;
        case "usuario":
                validarCampo(expresiones.usuario, e.target, 'usuario'); 
            break;
        case "telefono":
                validarCampo(expresiones.telefono, e.target, 'telefono'); 
            break;
        case "correo":
                validarCampo(expresiones.correo, e.target, 'correo'); 
        break;
        case "password":
                validarCampo(expresiones.password, e.target, 'password'); 
                validarPassword2();//por si se modifica
            break;
        case "password2":
                validarPassword2();
            break;
    }//termina switch

}//termina validarFormulario

       
/* creamos la funcion validarCampo para optimizar la validacion, cada campo tiene una peculiaridad:
recibe 3 argumentos para validar segun el campo:
    -expresion -> sustituye a expresiones.usuario, para accader a la expresion de cada campo
    -input -> sustituye a e.target, para acceder al valor de cada input correspondiente a cada campo
    -campo -> sustituye  a grupo__usuario por `grupo__${campo}`, para pasar la variable campo
    se sustituye la (') por el acento (`) */
    
function validarCampo(expresion, input, campo){
    if (expresion.test(input.value)) {
        document.getElementById(`grupo__${campo}`).classList.remove(`formulario__grupo-incorrecto`);//elimina la clase
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');//añade la clase
        // querySelector -> accede a un elemento, recibe como parametro el id del campo 
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');//quita icono circulo
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');//añade icono check
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');//quita el texto
        campos[campo] = true;//para acceder al objeto campos, 
    } else {
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');//añade icono circulo
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');//quita icono check
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');//muestra el texto
        campos[campo] = false;
    }//termina if
}//termina validarCampo

/* validacion password2 */
function validarPassword2(){
    var inputPassword1 = document.getElementById('password');
    var inputPassword2 = document.getElementById('password2');

    if(inputPassword1.value !== inputPassword2.value){
        document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__password2 i`).classList.add('fa-times-circle');//añade icono circulo
        document.querySelector(`#grupo__password2 i`).classList.remove('fa-check-circle');//quita icono check
        document.querySelector(`#grupo__password2 .formulario__input-error`).classList.add('formulario__input-error-activo');//muestra el texto
        campos['password'] = false;
    } else {
        document.getElementById(`grupo__password2`).classList.add('formulario__grupo-correcto');
        document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-incorrecto');
        document.querySelector(`#grupo__password2 i`).classList.add('fa-check-circle');//añade icono circulo
        document.querySelector(`#grupo__password2 i`).classList.remove('fa-times-circle');//quita icono check
        document.querySelector(`#grupo__password2 .formulario__input-error`).classList.remove('formulario__input-error-activo');//muestra el texto
        campos['password'] = true;
    }//termina if
}//termina validarPassword2



/**** cada vez que hay un evento de teclado  en los campos y fuera de ellos validar el formulario ****/
inputs.forEach(function(input){
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});











/* para que el formulario no se envie*/
formulario.addEventListener('submit', function(e) {
    e.preventDefault();//desactiva el boton y no lo envia
    /* validacion de campos vacios en el evento submit, para ello  creamos el objeto campos en la declaracion de variables*/
    var terminos = document.getElementById('terminos')
    if(campos.usuario && campos.nombre && campos.telefono && campos.correo && campos.password && terminos.checked){
            formulario.reset(); //reinicia todos los campos

        //mostrar el mensaje en caso de que se cumpla la condicion
        document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
        //desaparecer el mensaje tras tiempo
        setTimeout(() => {
            document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
        }, 5000);
        //desaparecer todos los iconos
        document.querySelectorAll('formulario__grupo_correcto').forEach(function(icono){
            icono.classList.remove('formulario__grupo_correcto');
        });//termina forEach
    } else {
        document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
    }//termina if
});