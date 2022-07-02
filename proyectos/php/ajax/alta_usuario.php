<?php
//llamada a la conexion con la base de datos
require_once("../config/Conexion.php");

//llamada a la clase Usuario
require_once("../models/Usuarios.php");

$usuarios = new Usuarios();

/*validacion que se haya enviado el formulario */

if (isset($_POST["enviar"]) && $_POST["enviar"]== "si" ) {

    if(empty($_POST["usuario"]) && empty($_POST["password1"])){

        $messages["error"] = "Introduzca los datos de acceso";

    } else {

        $usuario = isset($_POST["usuario"]);
        $password1 = isset($_POST["password1"]);
        $password2 = isset($_POST["password2"]);
        $rol = isset($_POST["rol"]);
        $estado = isset($_POST["estado"]);
        $id_usuario = isset($_POST["id_usuario"]);
        //verificacion passeords iguales
        if ($password1 == $password2) {
            //validacion usuarios, no repetidos
             $datos = $usuarios->get_correo_del_usuario($_POST["usuario"]);
                //si no exite
                if (is_array($datos) == true and count($datos) == 0){
                    $usuarios->registrar_usuario($usuario, $password1, $password2, $rol, $estado);
                    $messages["exito"] = "El usuario se registró correctamente. Puede acceder desde Mi cuenta.";
                
                } else {
                    //si existe
                    $messages["error"] = "Los datos introducidos ya existen.";
                }
        } else {
             /*si el password no conincide, entonces se muestra el mensaje de error*/
            $messages["error"] = "El password no coincide";
        }   
    } 
} else {

    $messages["error"] = "Error en el envio de datos.";
}

echo json_encode($messages);


?>