<?php

    require_once("../config/Conexion.php");

    class Perfil_cliente extends Conectar
    {
        //metodo para seleccionar un cliente por el usuario
        public function get_usuario_cliente($usuario)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM clientes WHERE usuario=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $usuario);
            $sql->execute();
            $resultado = $sql->fetchAll();
            return $resultado;
            $conectar = null;
        }

        //método para mostrar los datos de un registro a modificar
        public function get_cliente_por_id($id_cliente)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM clientes WHERE id_cliente=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_cliente);
            $sql->execute();
            $resultado = $sql->fetchAll();
            return $resultado;
            $conectar = null; 
        }

        //metodo para modificar los datos del perfil del cliente
        public function editar_perfil_cliente($nombre, $apellidos, $direccion, $telefono, $usuario, $correo,$id_cliente)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql ="UPDATE clientes SET nombre=?,apellidos=?,direccion=?,telefono=?,usuario=?,correo=? wHERE id_cliente=?";
            // echo $sql;
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $_POST["nombre"]);
            $sql->bindValue(2, $_POST["apellidos"]);
            $sql->bindValue(3, $_POST["direccion"]);
            $sql->bindValue(4, $_POST["telefono"]);
            $sql->bindValue(5, $_POST["usuario"]);
            $sql->bindValue(6, $_POST["correo"]);
            $sql->bindValue(7, $_POST["id_cliente"]);
            $sql->execute();
            //print_r($_POST);
            $conectar = null;
        }

        //metodo para modificar el password del usuario y cliente
        public function editar_password($password1,$password2,$usuario)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE usuarios SET password1=?, rep_password=? WHERE usuario=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $_POST["usuario"]);
            $sql->bindValue(2, $_POST["password1"]);
            $sql->bindValue(3, $_POST["password2"]);
            $sql->execute();
            $conectar = null;
        }
    }











?>