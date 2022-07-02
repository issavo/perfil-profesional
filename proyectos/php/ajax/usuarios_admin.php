<?php

require_once("../config/conexion.php");
//llamada a la conexion con la base de datos
//llamada a la clase Usuario
require_once("../models/Usuarios.php");

//instanciamos la clase usuario para acceder a sus metodos
$usuarios = new Usuarios();

/* declaracion de las variables para almacenar los valores enviados desde el formulario y que recibimos por ajax en este archivo(pertenecientes a los names del formulario). Decidimos si existe el parametro que estamos recibiendo */

$id_usuario = isset($_POST["id_usuario"]);
$usuario = isset($_POST["usuario"]);
$password1 = isset($_POST["password1"]);
$password2 = isset($_POST["password2"]);
$rol = isset($_POST["rol"]);
$estado = isset($_POST["estado"]); //este se envia del formulario

//parametros (op) enviados por ajax desde las funciones de los scripts por la url (metodo get)

switch ($_GET["op"]) {
    case "guardaryeditar":

        /*verificamos si existe el correo en la base de datos, si ya existe un registro (el correo) entonces no se registra el usuario*/
        $datos = $usuarios->get_correo_del_usuario($_POST["usuario"]);

        //validacion de los campos password
        if ($password1 == $password2) {

            /*si el id no existe entonces lo registra, enviado por campo oculto del formulario. importante: se debe poner el $_POST sino no funciona*/

            if (empty($_POST["id_usuario"])) {

                /*si coincide password1 y password2 entonces verificamos si existe el correo en la base de datos, si ya existe un registro con el correo no se registra el usuario*/

                if (is_array($datos) == true and count($datos) == 0) {

                    //no existe el usuario por lo tanto hacemos el registros

                    $usuarios->registrar_usuario($usuario, $password1, $password2, $rol, $estado);

                    $messages[] = "El usuario se registró correctamente";
  
                } else {
                    /*si ya exista el correo aparece el mensaje*/
                    if (is_array($datos) == true and count($datos) > 0) {

                        $errors[] = "El usuario ya existe";
                    }
                }
            } else {

                /*si ya existe entonces editamos los datos del usuario*/
                $datos = $usuarios->get_correo_del_usuario($_POST["usuario"]);

                if (is_array($datos) and count($datos) > 0){
                    $usuarios->editar_usuario($id_usuario, $usuario, $password1, $password2, $rol, $estado);
                    $messages[] = "El usuario se actualizo correctamente";
                } else {
                    $errors[] = "El usuario no existe";
                }
                
            }//cierre de la validacion empty

        } else {

            /*si el password no conincide muestra el mensaje de error*/

            $errors[] = "El password no coincide";
        }//validacion passwords

/* Mensajes personalizados */

        //mensaje success
        if (isset($messages)) {

?>
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php
                foreach ($messages as $message) {
                    echo $message;
                }
                ?>
            </div>
        <?php
        }
        //fin success

        //mensaje error
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

        }

        //fin mensaje error

        break;
    case "mostrar":
        //selecciona el id del usuario
        //el parametro id_usuario se envia por ajax cuando se edita el usuario
        $datos = $usuarios->get_usuario_por_id($_POST['id_usuario']);

        //validacion del id del usuario  
        if (is_array($datos) == true && count($datos) > 0) {
            foreach ($datos as $row) {
                $output["usuario"] = $row["usuario"];
                $output["password1"] = $row["password"];
                $output["password2"] = $row["rep_password"];
                $output["rol"] = $row["rol"];
                $output["estado"] = $row["estado"];
            }
            echo json_encode($output);
        } else {
            //si no existe el registro entonces no recorre el array
            $errors[] = "El usuario no existe";
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

        //los parametros id_usuario y est vienen por via ajax
        $datos = $usuarios->get_usuario_por_id($_POST['id_usuario']);

        //valida el id del usuario
        if (is_array($datos) == true && count($datos) > 0) {

            //edita el estado del usuario 
            $usuarios->editar_estado($_POST['id_usuario'], $_POST['est']); //parametros enviados por ajax
        }
        break;
    case "listar":

        $datos = $usuarios->get_usuarios();

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

            $sub_array[] = $row["usuario"];
            $sub_array[] = $row["password"];
            $sub_array[] = $row["rep_password"];
            $sub_array[] = $row["rol"];
            $sub_array[] = date("d-m-Y", strtotime($row["fecha_alta"]));

            $sub_array[] = '<button type="button" onClick="cambiarEstado(' . $row["id_usuario"] . ',' . $row["estado"] . ');" name="estado" id="' . $row["id_usuario"] . '" class=" btn-sm ' . $atrib . '">' . $est . '</button>';


            $sub_array[] = '<button type="button" onClick="mostrar(' . $row["id_usuario"] . ');"  id="' . $row["id_usuario"] . '" class="btn btn-primary btn-sm update"><i class="glyphicon glyphicon-edit"></i> Editar</button>';

            $sub_array[] = '<button type="button" onClick="eliminar_usuario(' . $row["id_usuario"] . ');"  id="' . $row["id_usuario"] . '" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-edit"></i> Eliminar</button>';

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

    case 'eliminar':
        $datos = $usuarios->get_usuario_por_id($_POST['id_usuario']);

        if (empty($_POST["id_usuario"])) {
            //si no existe el registro entonces no recorre el array
            $errors[] = "El usuario no existe";
        } else {
            //valida el id del cliente
            if (is_array($datos) == true && count($datos) > 0) {

                $datos = $usuarios->eliminar_usuario($_POST["id_usuario"]);
                $messages[] = "El usuario se ha eliminado correctamente.";
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
}



?>