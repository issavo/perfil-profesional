<?php

require_once("../config/Conexion.php");
require_once("../models/Usuarios.php");

$usuarios = new Usuarios();

if (isset($_POST["enviar"]) && $_POST["enviar"] == "si"){//comprobacion envio formulario

    $usuario = isset($_POST["usuario"]);
    $password = isset($_POST["password"]);
    $password = hash("SHA256", $_POST["password"]);
    
   
    if (empty($usuario) and empty($password)){//validacion campos vacios
        $messages["error"] = "Introduzca los datos de acceso.";
    } else {
        //si existe el usuario
       $usu = $usuarios->get_correo_del_usuario($_POST["usuario"]);
        
        if (is_array($usu) == true and count($usu) == 0){
            //usuario no registrado
            $messages["error"] = "usuario no registrado.";

        } else {
            
            //si esta registrado
                $pass_bd = $usu[0]["password"];
            
                $datos = $usuarios->login($_POST["usuario"],$password);
                //comprobar usuario y password
              
                if (is_array($datos) == true and count($datos) > 0){
                   $pass = $datos["password"];//obtener password encryptado
                   
                   if ($pass == $password){//verificar passwords
                            $_SESSION["id_usuario"] = $datos["id_usuario"];
                            $_SESSION["usuario"] = $datos["usuario"];
                            $_SESSION["rol"] = $datos["rol"];
                            $_SESSION["estado"] = $datos["estado"];
                            $messages["exito"] = "ok";
                            if ($_SESSION["rol"] == 1){
                                $messages["rol"] = "1";
                            } else if ($_SESSION["rol"] == 2){
                                $messages["rol"] = "2";
                            } else if ($_SESSION["rol"] == 3){
                                $messages["rol"] = "3";
                            }
                   } else {
                       //password incorrecto
                       $messages["error"] = "Contraseña incorrecta.";
                   }
                  
                } else {
                    //No existe los datos introducidos
                    $messages["error"]  = "Los datos introducidos son incorrectos.";     
                }
        } //is_array 
   }//empty
}//isset
echo json_encode($messages);



?>