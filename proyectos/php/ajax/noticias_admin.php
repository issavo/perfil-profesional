<?php

require_once("../config/conexion.php");
//llamada a la conexion con la base de datos
//llamada a la clase Usuario
require_once("../models/Noticias.php");

//creamos un objeto e instanciamos la clase usuario para acceder a sus metodos
$noticias = new Noticias();
/* declaracion de cada una de las variables de los valores enviados desde el formulario y que recibimos por ajax (pertenecientes a los names del formulario). Decidimos si existe el parametro que estamos recibiendo */

$id_noticia = isset($_POST["id_noticia"]);
$titulo = isset($_POST["titulo"]);
$subtitulo = isset($_POST["subtitulo"]);
$texto = isset($_POST["texto"]);
$tecnologias = isset($_POST["tecnologias"]); 
$usuario = isset($_POST["usuario"]);
$estado = isset($_POST["estado"]);
//parametros enviados por ajax de campos ocultos en formularios
switch ($_GET["op"]) {
    case "guardaryeditar":

        /*verificamos si existe el correo en la base de datos, si ya existe un registro con el correo entonces no se registra el usuario*/

        $datos = $noticias->get_noticia_por_id($_POST["id_noticia"]);

            /*si el id no existe se registra, importante: se debe poner el $_POST sino no funciona*/

            if (empty($_POST["id_noticia"])) {

                if (is_array($datos) == true and count($datos) == 0) {

                    //no existe el id por lo tanto hacemos el registro

                    $noticias->registrar_noticia($titulo, $subtitulo, $texto, $tecnologias, $usuario, $estado);

                    $messages[] = "La noticia se registró correctamente";

                    /*si ya exista el id aparece el mensaje*/
                } else {
                    if (is_array($datos) == true and count($datos) > 0) {

                        $errors[] = "La noticia ya existe";
                    }
                }
            } //cierre de la validacion empty

            else {

                /*si ya existe entonces editamos la noticia*/

                $noticias->editar_noticia($id_noticia, $titulo, $subtitulo, $texto, $tecnologias, $usuario, $estado);

                $messages[] = "La noticia se ha modificado correctamente";
            }
        
        //mensaje success
        if (isset($messages)) {

        ?>
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <!-- <strong>¡Bien hecho!</strong> -->
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
        //el parametro id_noticia se envia por ajax cuando se edita el registro
        $datos = $noticias->get_noticia_por_id($_POST['id_noticia']);

        //validacion del id del usuario  
        if (is_array($datos) == true && count($datos) > 0) {
            foreach ($datos as $row) {
                
                $output["titulo"] = $row["titulo"];
                $output["subtitulo"] = $row["subtitulo"];
                $output["texto"] = $row["texto"];
                $output["tecnologias"] = $row["tecnologias"];
                $output["usuario"] = $row["usuario"];
                $output["estado"] = $row["estado"];
            }
            echo json_encode($output);
        } else {
            //si no existe el registro entonces no recorre el array
            $errors[] = "La noticia no existe.";
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
        $datos = $noticias->get_noticia_por_id($_POST['id_noticia']);

        //valida el id del usuario
        if (is_array($datos) == true && count($datos) > 0) {

            //edita el estado del usuario 
            $noticias->editar_estado($_POST['id_noticia'], $_POST['est']); //parametros enviados por ajax
        }
        break;
    case "listar":

        $datos = $noticias->get_noticias();

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

            $sub_array[] = $row["titulo"];
            $sub_array[] = $row["subtitulo"];
            $sub_array[] = $row["texto"];
            $sub_array[] = $row["tecnologias"];
            $sub_array[] = $row["usuario"];
            $sub_array[] = date("d-m-Y", strtotime($row["fecha_alta"]));

            $sub_array[] = '<button type="button" onClick="cambiarEstado(' . $row["id_noticia"] . ',' . $row["estado"] . ');" name="estado" id="' . $row["id_noticia"] . '" class="' . $atrib . '">' . $est . '</button>';


            $sub_array[] = '<button type="button" onClick="mostrar(' . $row["id_noticia"] . ');"  id="' . $row["id_noticia"] . '" class="btn btn-primary btn-sm update"><i class="glyphicon glyphicon-edit"></i> Editar</button>';

            $sub_array[] = '<button type="button" onClick="eliminar_noticia(' . $row["id_noticia"] . ');"  id="' . $row["id_noticia"] . '" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-edit"></i> Eliminar</button>';

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
        $datos = $noticias->get_noticia_por_id($_POST['id_noticia']);

        if (empty($_POST["id_noticia"])) {
            //si no existe el registro entonces no recorre el array
            $errors[] = "La noticia no existe";
        } else {
            //valida el id del cliente
            if (is_array($datos) == true && count($datos) > 0) {
                $datos = $noticias->eliminar_noticia($_POST["id_noticia"]);
                $messages[] = "La noticia ha sido eliminada correctamente.";
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
    case 'buscar_noticia':
            $datos = $noticias->get_por_id($_POST["id_noticia"]);
            $data =  array();
            if (is_array($datos) == true and count($datos) > 0){
            //si existe
                foreach ($datos as $row ) {
                    $sub_array = array();

                    $sub_array [] = $row["titulo"];
                    $sub_array [] = $row["subtitulo"];
                    $sub_array [] = $row["texto"];
                    $sub_array [] = $row["tecnologias"];
                    $sub_array[] = '<button role="button" type="submit" class="btn btn-sm btn-default btn-primary text-center" id="btnCerrar" onclick="cerrar('.$row['id_noticia'].');" value="Cerrar"> Cerrar</button>';
                    $data[] = $sub_array;
                }
                echo json_encode($data);
    
            } 
        break;
       

       
}//switch

?>
