<?php
// conexion a la base de datos
    // require_once("../config/conexion.php");


    class Clientes extends Conectar
    {
        //metodo para listar todos los clientes
        public function get_clientes()
        {
            $conectar=parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM clientes ORDER BY id_cliente DESC";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
            $conectar = null;
            
        }

        //metodo para insetar clientes, parametros que recibe por ajax desde el formulario
        public function registrar_cliente($nombre,$apellidos,$direccion,$telefono,$usuario,$correo,$estado,$rol)
        {
            $conectar=parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO clientes VALUES (null,?,?,?,?,?,?,now(),?,?)";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $_POST["nombre"]);
            $sql->bindValue(2, $_POST["apellidos"]);
            $sql->bindValue(3, $_POST["direccion"]);
            $sql->bindValue(4, $_POST["telefono"]);
            $sql->bindValue(5, $_POST["usuario"]);
            $sql->bindValue(6, $_POST["correo"]);
            $sql->bindValue(7, $_POST["estado"]);
            $sql->bindValue(8, $_POST["rol"]);
            $sql->execute();
            $conectar = null;
        }

        //metodo para modificar un registro 
        public function editar_cliente($id_cliente, $nombre, $apellidos, $direccion, $telefono, $usuario, $correo, $estado, $rol)
        {
            $conectar=parent::conexion();
            parent::set_names();
            $sql = "UPDATE clientes SET nombre=?,apellidos=?,direccion=?,telefono=?,usuario=?,correo=?,estado=?,rol=? where id_cliente=?"; 

            // echo $sql;

            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $_POST["nombre"]);
            $sql->bindValue(2, $_POST["apellidos"]);
            $sql->bindValue(3, $_POST["direccion"]);
            $sql->bindValue(4, $_POST["telefono"]);
            $sql->bindValue(5, $_POST["usuario"]);
            $sql->bindValue(6, $_POST["correo"]);
            $sql->bindValue(7, $_POST["estado"]);
            $sql->bindValue(8, $_POST["rol"]); 
            $sql->bindValue(9, $_POST["id_cliente"]);
            $sql->execute();
            //print_r($_POST);
            $conectar = null;
        }
        // metodo  para validar el id del cliente(luego llamamos al metodo de editar_estado()) 
        /*el id_cliente se envia por ajax cuando se editar el boton cambiar estado y que se ejecuta el evento onclick y llama la funcion de javascript*/
        public function get_cliente_por_id($id_cliente)
        {
            $conectar=parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM clientes WHERE id_cliente=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_cliente);
            $sql->execute();
            return  $resultado = $sql->fetchAll();
            $conectar = null;
            
        }

        //metodo para editar el estado del usuario, activar y desactivar 
        public function editar_estado($id_cliente,$estado)
        {
            $conectar=parent::conexion();
            parent::set_names();
            //el parametro est se envia por ajax
            if ($_POST["est"] == "0"){
                $estado = 1;
            } else {
                $estado = 0;
            }
            $sql ="UPDATE clientes SET estado=? WHERE id_cliente=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $estado);
            $sql->bindValue(2, $id_cliente);
            $sql->execute();
            $conectar = null;
        }

        //metodo para validacion del cliente con el usuario, no repetidos
        public function get_correo_cliente($usuario)
        {
            $conectar=parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM clientes WHERE usuario=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $usuario);
            $sql->execute();
            return $resultado = $sql->fetchAll();
            $conectar = null;
        }

        //metodo para eliminar un registro de la tabla
        public function eliminar_cliente($id_cliente)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "DELETE FROM clientes WHERE id_cliente=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_cliente);
            $sql->execute();
            return $resultado = $sql->fetch();
            $conectar = null;
        }

        //metodo para validar Clientes activos
        public function get_cliente_por_id_estado($id_cliente,$estado)
        {
            $conectar = parent::conexion();
            //declaramos que el estado este activo, 1
            $estado = 1;
            $sql = "SELECT * FROM clientes WHERE id_cliente=? AND estado=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_cliente);
            $sql->bindValue(2, $estado);
            $sql->execute();
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
            $conectar = null;
        }

        /*metodo si el cliente ya existe, valida si existe el cliente o el usuario, si existe entonces se hace el registro del cliente*/
        public function get_datos_cliente($nombre, $apellidos, $usuario){
           $conectar = parent::conexion();
           parent::set_names();
           $sql = "SELECT * FROM clientes WHERE nombre=? AND apellidos=? AND usuario=?";
           $sql = $conectar->prepare($sql);
           $sql->bindValue(1, $nombre);
           $sql->bindValue(2, $apellidos);
           $sql->bindValue(3, $usuario);
           $sql->execute();
           $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
           return $resultado;
           $conectar = null;
        }
    }

?>