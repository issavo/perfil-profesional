<?php

//llamada a la conexion con la base de datos
require_once("../config/Conexion.php");

//llamada a la clase Usuario
require_once("../models/Citas.php");

$citas = new Citas();

/* declaracion de cada una de las variables de los valores enviados desde el formulario y que recibimos por ajax (pertenecientes a los names del formulario). Decidimos si existe el parametro que estamos recibiendo */

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
$estado = isset($_POST["estado"]);
$fecha = isset($_POST["fecha"]);


switch ($_GET["op"]) {
    case 'listar_en_cliente':
        //llamada al metodo que recoge todos los registros
        $datos = $citas->get_usuario_cita($_POST["usuario"]);
       
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
                
                if ($row["estado"] == 0){
                    $sub_array[] = '<button type="button" onClick="mostrar(' . $row["id_cita"] . ');"  id="' . $row["id_cita"] . '" data-toggle="modal" data-target="#citaModal" role="button" class="btn btn-primary btn-sm update" disabled><i class="glyphicon glyphicon-edit"></i> Editar fecha</button>';
                } else {
                     $sub_array[] = '<button type="button" onClick="mostrar(' . $row["id_cita"] . ');"  id="' . $row["id_cita"] . '" data-toggle="modal" data-target="#citaModal" role="button" class="btn btn-primary btn-sm update"><i class="glyphicon glyphicon-edit"></i> Editar fecha</button>';
                }
               

                $sub_array[] = '<button class="btn btn-primary btn-md detalle"   id="' . $row["id_cita"] . '"  data-toggle="modal" data-target="#detalle_cita"><i class="fa fa-eye"></i></button>';
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

    case 'mostrar':
        //selecciona el id de la cita
        //el parametro id_cita se envia por ajax cuando se edita el registro
        $datos = $citas->get_cita_por_id($_POST['id_cita']);
        //validacion del id  
        if (is_array($datos) == true && count($datos) > 0) {
            foreach ($datos as $row) {
                $output["id_cita"] = $row["id_cita"];
                $output["nombre"] = $row["nombre"];
                $output["apellidos"] = $row["apellidos"];
                $output["telefono"] = $row["telefono"];
                $output["usuario"] = $row["usuario"];
                $output["dia"] = date("d-m-Y", strtotime($row["dia"]));
                $output["hora"] = $row["hora"];
                $output["fecha_alta"] = date("d-m-Y", strtotime($row["fecha_alta"]));
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
        //calculo de días pasados entre fecha alta de la cita y el día de editar
        $datos =  $citas->calcularTiempo($_POST["fecha_alta"], $_POST["fecha"]);
        
        if (is_array($datos) == true) {
            //posicion de días que han pasado
            if ($datos[2] > 3){
                //se cumple
                $messages["error"] = "Han pasado " .$datos[2]. " días, por lo que no se pueden modificar la cita.";
            }  else { 
                //no se cumple
                //si esta disponible la cita
                $datos = $citas->buscar_registro_hora($_POST["dia"], $_POST["hora"]);
                //si existe
                if (is_array($datos) == true and count($datos) > 0) {
                    //validacion del estado
                    $datos = $citas->get_cita_por_id_estado($_POST["id_cita"], $_POST["estado"]);
                    if ($datos[0]["estado"] == 0) {
                        //si esta anulada
                        $citas->editar_cita($id_cita, $nombre, $apellidos, $telefono, $usuario, $dia, $hora, $fecha_alta, $usuario_alta, $estado);
                        
                        $messages["exito"] = "La cita se actualizo correctamente.";
                    } else {
                        $messages["error2"] = "La cita no está disponible.";
                    }
                } else {
                    $datos = $citas->editar_cita($id_cita, $nombre, $apellidos, $telefono, $usuario, $dia, $hora,    $fecha_alta, $usuario_alta, $estado);
                 
                        $messages["exito"] = "La cita se actualizo correctamente.";
                }
             
            }
            echo json_encode($messages);
        }    
          
        break;
    

}


?>