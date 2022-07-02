<?php
    require_once("../config/Conexion.php");
    require_once("../models/Perfil_cliente.php");
    $perfil = new Perfil_cliente();
    //declaramos las variables de los valores que se envian por el formulario y que recibimos por ajax
    /*el valor id_cliente se carga en el campo hidden cuando se edita un registro*/
    $id_cliente = isset($_POST["id_cliente"]);
    $nombre = isset($_POST["nombre_perfil"]);
    $apellidos = isset($_POST["apellidos"]);
    $direccion = isset($_POST["direccion"]);
    $telefono = isset($_POST["telefono"]);
    $usuario = isset($_POST["usuario"]);
    $correo = isset($_POST["correo"]);
    

    switch ($_GET["op"]) {
        case 'mostrar_perfil':
            //selecciona el id_cliente
            $datos = $perfil->get_usuario_cliente($_POST["usuario"]);
            //si existe el id del cliente recorrera el array
            if (is_array($datos) == true and count($datos) > 0) {
               foreach ($datos as $row) {
                   $output["nombre"] = $row["nombre"];
                   $output["apellidos"] = $row["apellidos"];
                   $output["direccion"] = $row["direccion"];
                   $output["telefono"] = $row["telefono"];
                   $output["usuario_perfil"] = $row["usuario"];
                   $output["correo"] = $row["correo"];
                   $output["id_cliente"] = $row["id_cliente"];
               }
               echo json_encode($output);
            } else {
                //si no existe el registro no recorre el array
                $errors[] = "El cliente no existe"; 
            }

            break;
        
        case 'editar_perfil':
            //verificacion de si existe el cliente
            $datos = $perfil->get_usuario_cliente($_POST["usuario"]);
            if (is_array($datos) == true and count($datos) > 0){
                    //si existe editamos los datos
                    $perfil->editar_perfil_cliente( $nombre, $apellidos, $direccion, $telefono, $usuario, $correo,$id_cliente);

                    $messages[] = "Los datos del cliente se actualizaron correctamente.";
            } else {
                $errors[] = "El usuario no existe.";
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
            //mesaje error
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