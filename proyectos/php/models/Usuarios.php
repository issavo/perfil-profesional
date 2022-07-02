<?php
// conexion a la base de datos
    // require_once("../config/conexion.php");

    class Usuarios extends Conectar
    {
        
        //metodo para listar la tabla usuarios
        public function get_usuarios()
        {
            $conectar=parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM usuarios";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
            $conectar = null;
            
        }

        //metodo para registrar usuarios, parametros que recibe por ajax desde el formulario
        public function registrar_usuario($usuario, $password1,$password2,$rol,$estado)
        {
            $pass = hash("SHA256",$_POST["password1"]) ;
            $pass2 = hash("SHA256",$_POST["password2"]) ;
            $conectar=parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO usuarios VALUES (null,?,?,?,?,now(),?)";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $_POST["usuario"]);
            $sql->bindValue(2, $pass);
            $sql->bindValue(3, $pass2);
            $sql->bindValue(4, $_POST["rol"]);
            $sql->bindValue(5, $_POST["estado"]);
            $sql->execute();
            $conectar = null;
        }

        //metodo para modificar un registro de la tabla usuario
        public function editar_usuario($id_usuario,$usuario, $password1,$password2,$rol,$estado)
        {
            $pass = hash("SHA256",$_POST["password1"]) ;
            $pass2 = hash("SHA256",$_POST["password2"]) ;
            
            $conectar=parent::conexion();
            parent::set_names();
            $sql = "UPDATE usuarios SET usuario=?,password=?,rep_password=?,rol=?,estado=? where id_usuario=?"; 

            // echo $sql;

            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $_POST["usuario"]);
            $sql->bindValue(2, $pass);
            $sql->bindValue(3, $pass2);
            $sql->bindValue(4, $_POST["rol"]);
            $sql->bindValue(5, $_POST["estado"]);
            $sql->bindValue(6, $_POST["id_usuario"]);
            $sql->execute();
            $conectar = null;
            // print_r($_POST);
        }

        //metodo para obtener un registro de la tabla usuario segun el id_usuario, que se recibe por ajax y mostrarvlos datos
        public function get_usuario_por_id($id_usuario)
        {
            $conectar=parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM usuarios WHERE id_usuario=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return  $resultado = $sql->fetchAll();
            $conectar = null;
            
        }

        //metodo para editar el estado del usuario, activar y desactivar el estado
        public function editar_estado($id_usuario,$estado)
        {
            $conectar=parent::conexion();
            parent::set_names();
            //el parametro est se envia por ajax
            if ($_POST["est"] == "0"){
                $estado = 1;//activo
            } else {
                $estado = 0;
            }
            $sql ="UPDATE usuarios SET estado=? WHERE id_usuario=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $estado);
            $sql->bindValue(2, $id_usuario);
            $sql->execute();
            $conectar = null;
        }

        //metodo para cambiar el rol de usuario al darse de alta como cliente
        public function editar_rol_usuario($usuario,$rol)
        {
            $conectar=parent::conexion();
            parent::set_names();
            $sql = "UPDATE usuarios SET rol=? WHERE  usuario=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $rol);
            $sql->bindValue(2, $usuario);
            $sql->execute();
            $conectar = null;
        }

        //metodo para validar el correo del usuario, no repetidos
        public function get_correo_del_usuario($usuario)
        {
            $conectar=parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM usuarios WHERE  usuario=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $usuario);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
            $conectar = null;
        }

        //metodo para eliminar un registro de la tabla
        public function eliminar_usuario($id_usuario)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "DELETE FROM usuarios WHERE id_usuario=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado = $sql->fetch();
            $conectar = null;
        }

        //metodo para modificar la contraseña desde el perfil del usuario y desde el perfil del cliente 
        public function editar_password($password1, $password2, $usuario){

            $pass = hash("SHA256",$_POST["password1"]) ;
            $pass2 = hash("SHA256",$_POST["password2"]) ;
            $usuario = $_POST["usuario"];
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE usuarios SET password=?,rep_password=? where usuario=?"; 
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $pass);
            $sql->bindValue(2, $pass2);
            $sql->bindValue(3, $usuario);
            $sql->execute();
            $conectar = null;

        }

        //metodo para verificar usuario y contraseña
        public function login($usuario,$password)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM usuarios WHERE usuario=? AND password=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $usuario);
            $sql->bindValue(2, $password);
            $sql->execute();
            $fila = $sql->fetch(PDO::FETCH_ASSOC);           
            return $fila;
            $conectar = null;
        }

    }
   

?>