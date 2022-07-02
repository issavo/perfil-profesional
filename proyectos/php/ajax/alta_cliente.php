<?php
//llamada a la conexion con la base de datos
require_once("../config/Conexion.php");

//llamada a la clase Cliente
require_once("../models/Clientes.php");
//llamada a la clase usuario para editar el rol
require_once("../models/Usuarios.php");

$usuarios = new Usuarios();
$clientes = new Clientes();

    //validacion de campos vacios
    if (
        empty($_POST["nombre"]) && empty($_POST["apellidos"]) && empty($_POST["direccion"]) && empty($_POST["telefono"])
        && empty($_POST["correo"])
    ) {
        $errors[] = "No se pueden dejar campos vacíos.";
    } else {
        
        $nombre = isset($_POST["nombre"]);
        $apellidos = isset($_POST["apellidos"]);
        $direccion = isset($_POST["direccion"]);
        $telefono = isset($_POST["telefono"]);
        $usuario = isset($_POST["usuario"]);
        $correo = isset($_POST["correo"]);
        $id_cliente = isset($_POST["id_cliente"]);
        $estado = isset($_POST["estado"]);
        $rol = isset($_POST["rol"]);

        switch ($_GET["op"]) {
            case 'guardarCliente':
                    /*verificacion si existe un cliente con este usuario*/
                    $datos = $clientes->get_datos_cliente($_POST["nombre"], $_POST["apellidos"], $_POST["usuario"]);
                    if (is_array($datos) == true and count($datos) == 0){
                        //modificamos el rol del usuario
                            $usuarios->editar_rol_usuario($_POST["usuario"], $_POST["rol"]);
                        //no existe un cliente asociado a ese usuario hacemos el registro
                            $clientes->registrar_cliente($nombre, $apellidos, $direccion, $telefono, $usuario,$correo, $estado, $rol);
                            $messages["exito"] = "El Cliente se registró correctamente";
                            
                    } else {
                        // si existe 
                        $messages["error"] = "ya existe un cliente con este usuario.";
                    }
                    echo json_encode($messages);            
        }//switch         
    }//if
      
    

















?>