<?php

    
    require_once("../config/Conexion.php");
    //llamada a la conexion con la base de datos
    //llamada a la clase Usuario
    require_once("../models/Citas.php");

    $citas = new Citas();

    /* declaracion de cada una de las variables de los valores enviados desde el formulario y que recibimos por ajax    (pertenecientes a los names del formulario). Decidimos si existe el parametro que estamos recibiendo */

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
    $estado = isset($_POST["estado"]); //este se envia del formulario
    $fecha_inicial = isset($_POST["fecha_inicial"]);
    $fecha_final = isset($_POST["fecha_final"]);
    $mes = isset($_POST["mes"]);
    $anyo = isset($_POST["anyo"]);
    switch ($_GET["op"]) {
        case 'buscar_citas_fecha':
            $datos = $citas->busca_registro_fecha($_POST["fecha_inicial"], $_POST["fecha_final"]);
            //declaramos un array
            $data = Array();

            foreach ($datos as $row ) {
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
            case 'buscar_citas_mes':
                         $datos = $citas->busca_registro_mes($_POST["mes"], $_POST["anyo"]);
            //declaramos un array
            $data = Array();

            foreach ($datos as $row ) {
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
        
        
    }

?>