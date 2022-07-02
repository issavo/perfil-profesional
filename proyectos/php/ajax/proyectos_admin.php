<?php
    require_once("../config/Conexion.php");
    require_once("../models/Proyectos.php");
    $proyectos = new Proyectos();

   /* declaracion de cada una de las variables de los valores enviados desde el formulario y que recibimos por ajax (pertenecientes a los names del formulario). Decidimos si existe el parametro que estamos recibiendo, el valor id_proyecto se carga del campo hidden cuando se edita un registro*/
    $id_proyecto = isset($_POST["id_proyecto"]);
    $titulo = isset($_POST["titulo"]);
    $subtitulo = isset($_POST["subtitulo"]);
    $descripcion = isset($_POST["descripcion"]);
    $tecnologias = isset($_POST["tecnologias"]);
    $duracion = isset($_POST["duracion"]);
    $imagen = isset($_POST["hidden_proyecto_imagen"]);
    $estado = isset($_POST["estado"]);

    switch ($_GET["op"]) {
        case 'guardaryeditar':
            /*verificamos si existe el proyecto en la base de datos, si ya existe un registro con el nombre entonces no se registra el proyecto*/
            $datos = $proyectos->get_proyecto_nombre($titulo);
            /* si no existe el id realiza el registro */
            if (empty($_POST["id_proyecto"])){
                /*verificamos si existe el proyecto en la base de datos, si ya existe un registro, no se registra*/
                if (is_array($datos) == true and count($datos) == 0) {
                   //no existe el registro
                   $proyectos->registrar_proyecto($titulo, $subtitulo, $descripcion, $tecnologias, $duracion, $estado, $imagen);
                   $messages[] = "El proyecto se registró correctamente";
                } else {
                    //si ya existe el registro
                    $errors[]="El proyecto ya existe";
                }
            } else {
                /*si ya existe entonces editamos el proyecto*/
                $proyectos->editar_proyecto($titulo, $subtitulo, $descripcion, $tecnologias, $duracion, $estado, $imagen, $id_proyecto);
                $messages[] = "El proyecto se editó correctamente";
            }

            //mensaje success
            if (isset($messages)){
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
			}
	        //fin success

	        //mensaje error
            if (isset($errors)){
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
        
        case 'mostrar':
           //selecciona el id del proyecto
           //el parametro id_proyecto se envia por AJAX cuando se edita el proyecto
           $datos = $proyectos->get_proyecto_por_id($_POST["id_proyecto"]);
                // si existe el id del proyecto recorre el array
                if (is_array($datos) == true and count($datos) > 0){
                    foreach ($datos as $row ) {
                        $output["titulo"] = $row["titulo"];
                        $output["subtitulo"] = $row["subtitulo"];
                        $output["descripcion"] = $row["descripcion"];
                        $output["tecnologias"] = $row["tecnologias"];
                        $output["duracion"] = $row["duracion"];
                        $output["estado"] = $row["estado"];

                        if($row["imagen"] != ''){
                            $output['proyecto_imagen'] = '<img src="upload/'.$row["imagen"].'" class="img-thumbnail text-center" width="300" height="50" /><input type="hidden" name="hidden_proyecto_imagen" value="'.$row["imagen"].'" />';
                        } else {
                            $output['proyecto_imagen'] = '<input type="hidden" name="hidden_proyecto_imagen" value="" />';
                        }
                    }//foreach
                    echo json_encode($output);
                } else {
                      //si no existe el proyecto entonces no recorre el array
                    $errors[]="El proyecto no existe";
                }

                //inicio de mensaje de error
				if(isset($errors)){
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
	            //fin de mensaje de error
            break;

            case 'activarydesactivar':
                //los parametros id_proyecto y est vienen por ajax
                $datos=$proyectos->get_proyecto_por_id($_POST["id_proyecto"]);
                 // si existe el id del proyecto recorre el array
	            if(is_array($datos)==true and count($datos)>0){
                    //edita el estado del producto
                    $proyectos->editar_estado($_POST["id_proyecto"],$_POST["est"]);
	            } 
                break;

            case 'listar':
                $datos = $proyectos->get_proyectos();
                //declaramos un array
                $data = Array();
                foreach ($datos as $row ) {
                    $sub_array = array();
                    $est = '';
				    //$atrib = 'activo';
				     $atrib = "btn btn-success btn-sm estado";
				    if($row["estado"] == 0){
					    $est = 'INACTIVO';
					    $atrib = "btn btn-danger btn-sm estado";
				    } else {
                        if($row["estado"] == 1){
                            $est = 'ACTIVO';
                            //$atrib = '';
					    }
                    }
                    //$sub_array = array();	
                    $sub_array[] = $row["titulo"];
                    $sub_array[] = $row["subtitulo"];
                    $sub_array[] = $row["descripcion"];
                    $sub_array[] = $row["tecnologias"];
                    $sub_array[] = $row["duracion"];

                    //estado
                    $sub_array[] = '<button type="button" onClick="cambiarEstado(' . $row["id_proyecto"] . ',' . $row["estado"] . ');" name="estado" id="' . $row["id_proyecto"] . '" class=" btn-sm ' . $atrib . '">' . $est . '</button>';
                    //editar
                    $sub_array[] = '<button type="button" onClick="mostrar('.$row["id_proyecto"].');" id="'.$row["id_proyecto"].'" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i> Editar</button>';
                    //eliminar
                    $sub_array[] = '<button type="button" onClick="eliminar_proyecto('.$row["id_proyecto"].');" id="'.$row["id_proyecto"].'" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-edit"></i> Eliminar</button>';

                    //IMAGEN
                    if ($row["imagen"] != ''){
                        $sub_array[] = '<img src="upload/'.$row["imagen"].'" class="img-thumbnail" width="100" height="30" /><input type="hidden" name="hidden_proyecto_imagen" value="'.$row["imagen"].'" />';
                    } else {
                    $sub_array[] = '<button type="button" id="" class="btn btn-primary btn-md"><i class="fa fa-picture-o" aria-hidden="true"></i> Sin imagen</button>';
                    }

                    $data[] = $sub_array;
				} //foreach

            $results = array(
            "sEcho" => 1, //Información para el datatables
            "iTotalRecords" => count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
            "aaData" => $data);

            echo json_encode($results); 
                break;
            case "eliminar":

                $datos = $proyectos->get_proyecto_por_id($_POST["id_proyecto"]);

                if (empty($_POST["id_proyecto"])) {
                    //si no existe el registro entonces no recorre el array
                    $errors[] = "El proyecto no existe";
                    
                } else {
                //valida el id del cliente
                    if (is_array($datos) == true && count($datos) > 0) {

                        $datos = $proyectos->eliminar_proyecto($_POST["id_proyecto"]);
                        $messages[] = "El Proyecto se ha eliminado correctamente.";
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