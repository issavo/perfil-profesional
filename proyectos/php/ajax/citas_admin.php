<?php

    //llamada a la conexion con la base de datos
    require_once("../config/Conexion.php");

    //llamada a la clase Usuario
    require_once("../models/Citas.php");

    $citas = new Citas();

    /* declaracion de variables de los valores enviados desde el formulario y que recibimos por ajax (pertenecientes a los names del formulario). Valido si existe el parametro que estamos recibiendo */

    $id_cita = isset($_POST["id_cita"]);
    $nombre = isset($_POST["nombre"]);
    $apellidos = isset($_POST["apellidos"]);
    $telefono = isset($_POST["telefono"]);
    $usuario = isset($_POST["usuario"]);
    $correo = isset($_POST["correo"]);
    $dia = isset($_POST["dia"]);
    $hora = isset($_POST["hora"]);
    $fecha_alta = isset($_POST["fecha_alta"]);
    $usuario_alta = isset($_POST["usuario_alta"]);
    $estado = isset($_POST["estado"]); // enviado desde del formulario
    
    switch ($_GET["op"]) {

        case 'listar_en_modal':
                //llamada al metodo que recoge todos los registros
                $datos = $citas->get_citas();
                //declaramos un array
                $data = array();

                //recorremos el array
                foreach ($datos as $row) {
                    $sub_array = array();
                    //estado
                    $est = '';

                    $atrib = "btn btn-success btn-sm estado";
                    if ($row["estado"] == 0) {
                        $est = 'ANULADA';
                        $atrib = "btn btn-danger btn-sm estado";
                    } else {
                        if ($row["estado"] == 1) {
                            $est = 'ACTIVA';
                        }
                    }
                    $sub_array[] = $row["id_cita"];
                    $sub_array[] = $row["nombre"];
                    $sub_array[] = $row["apellidos"];
                    $sub_array[] = $row["telefono"];
                    $sub_array[] = $row["usuario"];
                    $sub_array[] = date("d-m-Y", strtotime($row["dia"]));
                    $sub_array[] = $row["hora"];
                    $sub_array[] = date("d-m-Y", strtotime($row["fecha_alta"]));
                    $sub_array[] = $row["usuario_alta"];

                    $sub_array[] = '<button type="button" name="estado" id="' . $row["id_cita"] . '" class="' . $atrib . '">' . $est . '</button>';

                    $sub_array[] = '<button disabled type="button" onClick="agregarRegistro(' . $row["id_cita"] . ',' . $row["estado"] . ');"  id="' . $row["id_cita"] . '" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</button>';

                    $data[] = $sub_array;
                }//foreach

                $results = array(
                "sEcho" => 1, //Información para el datatables
                "iTotalRecords" => count($data), //enviamos el total registros al datatable
                "iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
                "aaData" => $data
                );
                echo json_encode($results);
            break;
            
        case 'buscar_cita':
             $datos = $citas->get_cita_por_id_estado($_POST["id_cita"], $_POST["estado"]);
            
            if (is_array($datos) == true and count($datos) > 0){
                //si existe
                foreach ($datos as $row ) {

                $output["id_cita"] = $row["id_cita"];
                $output["nombre"] = $row["nombre"];
                $output["apellidos"] = $row["apellidos"];
                $output["telefono"] = $row["telefono"];
                $output["usuario"] = $row["usuario"];
                $output["dia"] = $row["dia"];
                $output["hora"] = $row["hora"];
                $output["fecha_alta"] = $row["fecha_alta"];
                $output["usuario_alta"] = $row["usuario_alta"];
                $output["estado"] = $row["estado"];
                }
            } else {
                //si no existe
                $output["error"] = "La cita seleccionada está activa.";
            }
            echo json_encode($output);
            break;

        case 'insertar':
            //verificacion si ya existe la cita.
            $datos = $citas->buscar_registro_hora($_POST["dia"],$_POST["hora"]);
            if (is_array($datos) == true and count($datos) == 0){
                //si no existe
                $citas->registrar_cita($nombre, $apellidos, $telefono, $usuario, $dia, $hora, $usuario_alta, $estado);
                $messages["exito"] = "La cita ha sido registrada con éxito";
            } else {
                $messages["error"] = "La cita seleccionada no está disponible.";
            }
            echo json_encode($messages);
       
            break;

        case 'listar':
                $datos = $citas->get_citas();

                //declaramos el array
                $data = array();

                //recorremos el array
                foreach ($datos as $row) {

                    $sub_array = array();

                    //estado
                    $est = '';

                    $atrib = "btn btn-success btn-sm estado";
                    if ($row["estado"] == 0) {
                        $est = 'ANULADA';
                        $atrib = "btn btn-danger btn-sm estado";
                    } else {

                        if ($row["estado"] == 1) {
                            $est = 'ACTIVA';
                        }
                    }

                    $sub_array[] = '<button class="btn btn-primary btn-md detalle"   id="' . $row["id_cita"] . '"  data-toggle="modal" data-target="#detalle_cita"><i class="fa fa-eye"></i></button>';

                    $sub_array[] = $row["id_cita"];
                    $sub_array[] = $row["nombre"];
                    $sub_array[] = $row["apellidos"];
                    $sub_array[] = $row["telefono"];
                    $sub_array[] = $row["usuario"];
                    $sub_array[] = date("d-m-Y",strtotime($row["dia"]));
                    $sub_array[] = $row["hora"];
                    $sub_array[] = date("d-m-Y", strtotime($row["fecha_alta"]));
                    $sub_array[] = $row["usuario_alta"];

                    $sub_array[] = '<button type="button" onClick="cambiarEstado(' . $row["id_cita"] . ',' . $row["estado"] . ');" name="estado" id="' . $row["id_cita"] . '" class="' . $atrib . '">' . $est . '</button>';

                    $sub_array[] = '<button type="button" onClick="mostrar(' . $row["id_cita"] . ');"  id="' . $row["id_cita"] . '" data-toggle="modal" data-target="#citaModal" class="btn btn-primary btn-sm update"><i class="glyphicon glyphicon-edit"></i> Editar</button>';

                    $sub_array[] = '<button type="button" onClick="eliminar_cita(' . $row["id_cita"] . ');"  id="' . $row["id_cita"] . '" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-edit"></i> Eliminar</button>';

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
        case 'cambiar_estado_cita':
                //los parametros id_cita y est vienen por via ajax
                $datos = $citas->get_cita_por_id($_POST['id_cita']);

                //valida el id de la cita
                if (is_array($datos) == true && count($datos) > 0) {

                //edita el estado de la cita 
                $citas->editar_estado($_POST['id_cita'], $_POST['est']); //parametros enviados por ajax
                }
            break;
        case 'ver_detalle_cita':
               $datos = $citas->get_cita_por_id($_POST["id_cita"]);
               if (is_array($datos) and count($datos) > 0){
                    foreach ($datos as $row ) {

                    //estado
                    $est = '';

                    $atrib = "btn btn-success btn-sm estado";
                    if ($row["estado"] == 0) {
                        $est = 'ANULADA';
                        $atrib = "btn btn-danger btn-sm estado";
                    } else {

                        if ($row["estado"] == 1) {
                            $est = 'ACTIVA';
                        }
                    }
                        $output["id_cita"] = $row["id_cita"];
                        $output["nombre"] = $row["nombre"];
                        $output["apellidos"] = $row["apellidos"];
                        $output["telefono"] = $row["telefono"];
                        $output["usuario"] = $row["usuario"];
                        $output["dia"] = date("d-m-Y", strtotime($row["dia"]));
                        $output["hora"] = $row["hora"];
                        $output["fecha_alta"] = date("d-m-Y",strtotime($row["fecha_alta"]));
                        $output["usuario_alta"] = $row["usuario_alta"];
                        $output["estado"] =  '<button type="button" name="estado" id="' . $row["id_cita"] . '" class="' . $atrib . '">' . $est . '</button>';
                    } 
                    echo json_encode($output);
                }  else {
                //si no existe
                $errors[] = "La cita seleccionada no existe.";
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
        case 'mostrar':
            //selecciona el id de la cita
            //el parametro id_cita se envia por ajax cuando se edita el registro
            $datos = $citas->get_cita_por_id($_POST['id_cita']);
         
            if (is_array($datos) == true && count($datos) > 0) {
                foreach ($datos as $row) {

                    $output["id_cita"] = $row["id_cita"];
                    $output["nombre"] = $row["nombre"];
                    $output["apellidos"] = $row["apellidos"];
                    $output["telefono"] = $row["telefono"];
                    $output["usuario"] = $row["usuario"];
                    $output["dia"] = date("d-m-Y", strtotime($row["dia"]));
                    $output["hora"] = $row["hora"];
                    $output["fecha_alta"] = date("d-m-Y",strtotime($row["fecha_alta"]));
                    $output["usuario_alta"] = $row["usuario_alta"];
                    $output["estado"] = $row["estado"];
                }
                echo json_encode($output);
            } else {
                //si no existe el registro entonces no recorre el array
                $errors[] = "La cita no existe.";
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
        case 'editar':
                //si esta disponible la cita
                $datos = $citas->buscar_registro_hora($_POST["dia"], $_POST["hora"]);
                    //si existe
                if(is_array($datos) == true and count($datos) > 0){
                    //validacion del estado
                    $datos = $citas->get_cita_por_id_estado($_POST["id_cita"], $_POST["estado"]);
                    if ($datos[0]["estado"] == 0){
                        //si esta anulada
                        $citas->editar_cita($id_cita,$nombre, $apellidos, $telefono, $usuario, $dia, $hora,$fecha_alta,$usuario_alta, $estado);
                        $messages["exito"] = "La cita se actualizo correctamente.";
                    } else {
                        $messages["error"] = "La cita no está disponible.";
                    }

                } else {
                    $datos = $citas->editar_cita($id_cita,$nombre, $apellidos, $telefono, $usuario, $dia, $hora,$fecha_alta,$usuario_alta, $estado);
                    $messages["exito"] = "La cita se actualizo correctamente.";
                }
                echo json_encode($messages);
            break;
         case "eliminar":

        $datos = $citas->get_cita_por_id($_POST['id_cita']);

        if (empty($_POST["id_cita"])) {
             //si no existe el registro entonces no recorre el array
            $errors[] = "La cita no existe";
            
        } else {
           //valida el id del cliente
            if (is_array($datos) == true && count($datos) > 0) {

                $datos = $citas->eliminar_cita($_POST["id_cita"]);
                $messages[] = "La cita se ha eliminado correctamente.";
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
    }//switch



























?>