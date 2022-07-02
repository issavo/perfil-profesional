<?php
    // require_once("../config/Conexion.php");
    class Citas extends Conectar
    {
        
        //metodo para listar todos las citas
        public function get_citas()
        {
            $conectar=parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM citas ORDER BY id_cita DESC";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
            $conectar = null;
            
        }

        //metodo para insetar citas, parametros que recibe por ajax desde el formulario
        public function registrar_cita($nombre,$apellidos,$telefono,$usuario,$dia,$hora,$usuario_alta,$estado)
        {
            $conectar=parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO citas VALUES (null,?,?,?,?,?,?,now(),?,?)";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $_POST["nombre"]);
            $sql->bindValue(2, $_POST["apellidos"]);
            $sql->bindValue(3, $_POST["telefono"]);
            $sql->bindValue(4, $_POST["usuario"]);
            $sql->bindValue(5, $_POST["dia"]);
            $sql->bindValue(6, $_POST["hora"]);
            $sql->bindValue(7, $_POST["usuario_alta"]);
            $sql->bindValue(8, $_POST["estado"]);
            $sql->execute();
            $conectar = null;
        }
         //metodo para modificar un registro 
        public function editar_cita($nombre,$apellidos,$telefono,$usuario,$dia,$hora,$estado,$id_cita)
        {
            $conectar=parent::conexion();
            parent::set_names();
            
            $sql = "UPDATE citas SET nombre=?,apellidos=?,telefono=?,usuario=?,dia=?,hora=?,fecha_alta=?,usuario_alta=?,estado=? WHERE id_cita=?";

        // echo $sql;
        $fecha_alta = $_POST["fecha_alta"];
        $fecha_alta = date("Y-m-d", strtotime($fecha_alta));

            $sql = $conectar->prepare($sql); 
            $sql->bindValue(1, $_POST["nombre"]);
            $sql->bindValue(2, $_POST["apellidos"]);
            $sql->bindValue(3, $_POST["telefono"]);
            $sql->bindValue(4, $_POST["usuario"]);
            $sql->bindValue(5, $_POST["dia"]);
            $sql->bindValue(6, $_POST["hora"]);
            $sql->bindValue(7, $fecha_alta);
            $sql->bindValue(8, $_POST["usuario_alta"]);
            $sql->bindValue(9, $_POST["estado"]); 
            $sql->bindValue(10, $_POST["id_cita"]);
            $sql->execute();
            //print_r($_POST);
            $conectar = null;
        }

        //metodo para buscar una cita por su id
        public function get_cita_por_id($id_cita)
        {
            $conectar=parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM citas WHERE id_cita=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_cita);
            $sql->execute();
            return  $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
            $conectar = null;   
        }

        //metodo para editar el estado de la cita, activar y desactivar 
        public function editar_estado($id_cita,$estado)
        {
            $conectar=parent::conexion();
            parent::set_names();
            //el parametro est se envia por ajax
            if ($_POST["est"] == "0"){
                $estado = 1;
            } else {
                $estado = 0;
            }
            $sql ="UPDATE citas SET estado=? WHERE id_cita=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $estado);
            $sql->bindValue(2, $id_cita);
            $sql->execute();
            $conectar = null;
        }

        //metodo para buscar cita segun el usuario
        public function get_usuario_cita($usuario)
        {
            $conectar=parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM citas WHERE usuario=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $usuario);
            $sql->execute();
            return  $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
            $conectar = null;
              
        }

        //metodo para eliminar un registro 
        public function eliminar_cita($id_cita)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "DELETE FROM citas WHERE id_cita=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_cita);
            $sql->execute();
            return $resultado = $sql->fetch();
            $conectar = null;
        }

        //metodo para obtener una cita segun su estado
        public function get_cita_por_id_estado($id_cita, $estado)
        {
            $conectar = parent::conexion();
            parent::set_names();
            //declaramos que el estado este activo, 0
            $estado = 1;
            $sql = "SELECT * FROM citas WHERE id_cita=? AND estado=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_cita);
            $sql->bindValue(2, $estado);
            $sql->execute();
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
            $conectar = null;
        }

        /* CONSULTAS POR FECHAS  */
        //metodo para buscar registros CITAS-FECHA
        public function busca_registro_fecha($fecha_inicial, $fecha_final)
        {
            $conectar = parent::conexion();
            //cambio de formato fecha, segun bbdd
            //variables recibidas por AJAX
            $date_inicial = $_POST["fecha_inicial"];
            $date = str_replace('/', '-', $date_inicial);
            $fecha_inicial = date("Y-m-d", strtotime($date));

            $date_final = $_POST["fecha_final"];
            $date = str_replace('/', '-', $date_final);
            $fecha_final = date("Y-m-d", strtotime($date));

            $sql = "SELECT * FROM citas WHERE dia>=? AND dia<=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $fecha_inicial);
            $sql->bindValue(2, $fecha_final);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
            $conectar = null;
        }

        public function busca_registro_mes($mes, $anyo)
        {
            $conectar = parent::conexion();
            //variables recibidas por AJAX
            $mes = $_POST["mes"];
            $anyo = $_POST["anyo"];
            
            // formato fecha
            $fetxa = ($anyo."-".$mes."%");
            //hacemos la consulta para seleccionar el mes/anyo
            $sql = "SELECT * FROM citas WHERE dia LIKE ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $fetxa);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
            $conectar = null;

        }

        //metodo para buscar una cita que ya exista
        public function buscar_registro_hora($dia,$hora)
        {
            $conectar = parent::conexion();
            //variables recibidas por AJAX 
            $hora = $_POST["hora"];
            $dia = $_POST["dia"];
            $date = str_replace('/', '-', $dia);
            $dia = date("Y-m-d", strtotime($date));
            
            $sql = "SELECT * FROM citas WHERE dia LIKE ? and hora LIKE ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $dia);
            $sql->bindValue(2, $hora);
            $sql->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
            $conectar = null;
        }

        //metodo para calcular el tiempo de permitir modificar la fecha
        public function calcularTiempo($fecha_inicial,$fecha_final)
        {
           
            $fecha_inicial = $_POST["fecha_alta"];
            $date = str_replace('/', '-', $fecha_inicial);
            $fecha_inicial = date("Y-m-d", strtotime($date));

            $fecha_final = $_POST["fecha"];
            $date = str_replace('/', '-', $fecha_final);
            $fecha_final = date("Y-m-d", strtotime($date));

            $datetime1 = date_create($fecha_inicial);
            $datetime2 = date_create($fecha_final);
            $interval = date_diff($datetime1, $datetime2);

             //declarar un array
            $tiempo = array();

            foreach ($interval as $valor ) {
                $tiempo[] = $valor;
            }
                return $tiempo;
        }
       
    }















?>