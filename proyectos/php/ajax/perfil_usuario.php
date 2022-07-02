<?php
require_once("../config/Conexion.php");
require_once("../models/Usuarios.php");
$usuarios = new Usuarios();

if (isset($_REQUEST["op"])){
    
        $usuario = isset($_REQUEST["usuario"]);
        $password1 = isset($_POST["password1"]);
        $password2 = isset($_POST["password2"]);
        $id_usuario = isset($_POST["id_usuario"]);
      
    if (empty($_POST["id_usuario"]) && (empty($_POST["password1"])) && (empty($_POST["password2"]))){
        $errors[] = "No se pueden dejar campos vacíos.";
    } else {
        //validacion de passwords
        if ($password1 == $password2){
            //si existe el usuario
            $datos = $usuarios->get_usuario_por_id($_POST["id_usuario"]);
               //print_r($datos);
            if (is_array($datos) == true && count($datos) > 0){
               $datos = $usuarios->editar_password($password1, $password2, $usuario);
                $messages[] = "El password se actualizo correctamente.";
            
            } else {
                //si no existe el usuario
                $errors[] = "Los datos introducidos no existen.";
            }

        } else {
            $errors[] = "Las contraseñas no coinciden.";
        }
    }
}

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























?>