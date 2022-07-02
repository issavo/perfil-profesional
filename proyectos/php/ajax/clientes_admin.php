<?php

require_once("../config/Conexion.php");
//llamada a la conexion con la base de datos

//llamada a la clase Usuario
require_once("../models/Usuarios.php");
require_once("../models/Clientes.php");

//creamos un objeto e instanciamos la clase usuario para acceder a sus metodos
$clientes = new Clientes();
$usarios = new  Usuarios();
/* declaracion de cada una de las variables de los valores enviados desde el formulario y que recibimos por ajax (pertenecientes a los names del formulario). Decidimos si existe el parametro que estamos recibiendo */

$id_cliente = isset($_POST["id_cliente"]);
$nombre = isset($_POST["nombre"]);
$apellidos = isset($_POST["apellidos"]);
$direccion = isset($_POST["direccion"]);
$telefono = isset($_POST["telefono"]);
$usuario = isset($_POST["usuario"]);
$correo = isset($_POST["correo"]);
$estado = isset($_POST["estado"]); //este se envia del formulario
$rol = isset($_POST["rol"]);

//parametros enviados por ajax de campos ocultos en formularios
switch ($_GET["op"]) {
    case "guardaryeditar":
            /*verificamos si existe el usuario en la base de datos, si ya existe el usuario se registra el cliente*/
            $datos = $usarios->get_correo_del_usuario($_POST["usuario"]);
            if (is_array($datos) == true and count($datos) > 0){
                if (empty($_POST["id_cliente"])){
                    /*verificacion si el usuario ya existe como cliente*/
                     $datos = $clientes->get_correo_cliente($_POST["usuario"]);
                    if (is_array($datos) == true and count($datos) == 0) {
                        $datos = $clientes->registrar_cliente($nombre, $apellidos, $direccion, $telefono, $usuario, $correo, $estado, $rol);
                        $messages["exito"] = "El cliente se registró correctamente.";
                    } else {
                        $messages["error"] = "Existe un cliente con este usuario.";
                    }

                } else {
                //modificamos el perfil
                    $datos = $clientes->get_cliente_por_id($_POST["id_cliente"]);
                    if (is_array($datos) == true and count($datos) > 0) {

                        $datos = $clientes->editar_cliente($id_cliente, $nombre, $apellidos, $direccion, $telefono, $usuario, $correo, $estado, $rol);

                        $messages["exito"] = "cliente actualizado correctamente.";
                    } else {
                        $messages["error"] = "El cliente no existe";
                    }
                }

            } else {
                $messages["eror"] = "El usuario no existe.";
            }
                   
         echo json_encode($messages);
        break;

    case "mostrar":
        //selecciona el id del cliente
        //el parametro id_cliente se envia por ajax cuando se edita el usuario
        $datos = $clientes->get_cliente_por_id($_POST['id_cliente']);

        //validacion del id del cliente 
        if (is_array($datos) == true && count($datos) > 0) {
            foreach ($datos as $row) {
                $output["nombre"] = $row["nombre"];
                $output["apellidos"] = $row["apellidos"];
                $output["direccion"] = $row["direccion"];
                $output["telefono"] = $row["telefono"];
                $output["usuario"] = $row["usuario"];
                $output["correo"] = $row["correo"];
                $output["estado"] = $row["estado"];
                $output["rol"] = $row["rol"];
            }
            echo json_encode($output);
        } else {
            //si no existe el registro entonces no recorre el array
            $errors[] = "El cliente no existe";
        }

        //mensaje de error
        if (isset($errors)) {
        ?>
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong>
                <?php
                foreach ($errors as $error) {
                    echo $error;
                }
                ?>
            </div>
        <?php
        } //mensaje error

        break;
    case "activarydesactivar":

        //los parametros id_cliente y est vienen por via ajax
        $datos = $clientes->get_cliente_por_id($_POST['id_cliente']);

        //valida el id del cliente
        if (is_array($datos) == true && count($datos) > 0) {

            //edita el estado del usuario 
            $clientes->editar_estado($_POST['id_cliente'], $_POST['est']); //parametros enviados por ajax
        }
        break;
        
    case "listar":

        $datos = $clientes->get_clientes();

        //declaramos el array
        $data = array();

        //recorremos el array
        foreach ($datos as $row) {

            $sub_array = array();

            //estado
            $est = '';

            $atrib = "btn btn-success btn-sm estado";
            if ($row["estado"] == 0) {
                $est = 'INACTIVO';
                $atrib = "btn btn-danger btn-sm estado";
            } else {

                if ($row["estado"] == 1) {
                    $est = 'ACTIVO';
                }
            }

            $sub_array[] = $row["nombre"];
            $sub_array[] = $row["apellidos"];
            $sub_array[] = $row["direccion"];
            $sub_array[] = $row["telefono"];
            $sub_array[] = $row["usuario"];
            $sub_array[] = $row["correo"];
            $sub_array[] = $row["rol"];
            $sub_array[] = date("d-m-Y", strtotime($row["fecha_alta"]));
            
            $sub_array[] = '<button type="button" onClick="cambiarEstado(' . $row["id_cliente"] . ',' . $row["estado"] . ');" name="estado" id="' . $row["id_cliente"] . '" class="' . $atrib . '">' . $est . '</button>';


            $sub_array[] = '<button type="button" onClick="mostrar(' . $row["id_cliente"] . ');"  id="' . $row["id_cliente"] . '" class="btn btn-primary btn-sm update"><i class="glyphicon glyphicon-edit"></i> Editar</button>';

            $sub_array[] = '<button type="button" onClick="eliminar_cliente(' . $row["id_cliente"] . ');"  id="' . $row["id_cliente"] . '" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-edit"></i> Eliminar</button>';

            $data[] = $sub_array;
        }

        $results = array(
            "sEcho" => 1, //Información para el datatables
            "iTotalRecords" => count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
            "aaData" => $data
        );
        echo json_encode($results);
        break;
        
    case 'buscar_cliente':
            $datos = $clientes->get_cliente_por_id_estado($_POST["id_cliente"], $_POST["est"]);
            // Comprobar que el cliente este activo
            if (is_array($datos) == true and count($datos) > 0){
                //si existe
                foreach ($datos as $row ) {
                $output["nombre"] = $row["nombre"];
                $output["apellidos"] = $row["apellidos"];
                $output["direccion"] = $row["direccion"];
                $output["telefono"] = $row["telefono"];
                $output["usuario"] = $row["usuario"];
                $output["correo"] = $row["correo"];
                $output["estado"] = $row["estado"];
                // $output["rol"] = $row["rol"];
                }
            } else {
                //si no existe
                $output["error"] = "El cliente seleccionado está inactivo.";
            }
            echo json_encode($output);
        break;

    case "eliminar":

        $datos = $clientes->get_cliente_por_id($_POST['id_cliente']);

        if (empty($_POST["id_cliente"])) {
             //si no existe el registro entonces no recorre el array
            $errors[] = "El cliente no existe";
            
        } else {
           //valida el id del cliente
            if (is_array($datos) == true && count($datos) > 0) {

                $datos = $clientes->eliminar_cliente($_POST["id_cliente"]);
                $messages[] = "El cliente se ha eliminado correctamente.";
            }
        }

        //mensaje succes
        if (isset($messages)) {

        ?>
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>¡Bien hecho!</strong>
                <?php
                foreach ($messages as $message) {
                    echo $message;
                }
                ?>
            </div>
        <?php
        } //$messages - succes

        //mensaje de error
        if (isset($errors)) {
        ?>
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong>
                <?php
                foreach ($errors as $error) {
                    echo $error;
                }
                ?>
            </div>
        <?php
        } //mensaje error
        break;

        /*se muestran en ventana modal, el datatable de los clientes en citas para seleccionar  los clientes activos y luego se autocompletan los campos de un formulario*/
    case 'listar_en_citas':
        //todos los clientes registrados
        $datos = $clientes->get_clientes();
        //declaramos un array
        $data = Array();

        foreach ($datos as $row ) {
            //declaracion de variables
            $sub_array = array();
            $est = '';

            //ESTADO DEL CLIENTE
            $atrib = "btn btn-success btn-sm estado";
            if ($row["estado"] == 0){
                $est = 'INACTIVO';
                $atrib = "btn btn-danger btn-sm estado";
            } else {
                if ($row["estado"] == 1){
                        $est = 'ACTIVO';
                }
            } //estado
            
            $sub_array[] = $row["nombre"];
            $sub_array[] = $row["apellidos"];
            $sub_array[] = $row["direccion"];
            $sub_array[] = $row["telefono"];
            $sub_array[] = $row["usuario"];
            $sub_array[] = $row["correo"];
            
            $sub_array[] = '<button type="button" name="estado" id="' . $row["id_cliente"] . '" class="' . $atrib . '">' . $est . '</button>';


            $sub_array[] = '<button type="button" onClick="agregar_registro(' . $row["id_cliente"] . ','.$row["estado"].');"  id="' . $row  ["id_cliente"] . '" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</button>';

            $data[] = $sub_array;

        } //foreach
        $results = array(
            "sEcho" => 1, //Información para el datatables
            "iTotalRecords" => count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
            "aaData" => $data
        );
    echo json_encode($results);
        break;
}//switch



?>