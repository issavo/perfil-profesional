<?php

class Noticias extends Conectar
   
{
    private $noticias = array();
    
    /****  Mostrar noticias en el index ****/
    /*selecciona las noticias por id_noticia  */

    
    //metodo para mostrar noticias segun criterio id_noticia
    public function get_por_id($id_noticia)
    {
     
        $conectar = Conectar::conexion();
        $sql = "SELECT * FROM noticias WHERE id_noticia=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_noticia);
        $sql->execute();
        while($fila = $sql->fetch()){
            $this->noticias[] = $fila;
        }
        
        return $this->noticias;
        $conectar = null;
    }
    
    // para mostrar la noticia breve
    //metodo que muestra 5 noticias, las ultimas 5
    public function get_5_noticias()
    {
        $conectar = Conectar::conexion();
        $sql = "SELECT * FROM noticias ORDER BY id_noticia DESC LIMIT 0,6";//
        $resultado = $conectar->prepare($sql);
        $resultado->execute();
        while ($fila=$resultado->fetch()) {
           $this->noticias[] = $fila;
        }
        return $this->noticias;
        $conectar=null;
    }

    //metodo para obtener el nº total de registros
    public function total_Noticias()
    {
        $conectar = Conectar::conexion();
        $sql = "SELECT count(*) AS total FROM noticias";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        if ( $resultado = $sql->fetch()){
            $total = $resultado["total"];
        }   
        return $total;
        $conectar=null;
    }

    //Metodos para mostrar una cita en concreto con el criterio id y la posicion. 
    public function get_noticia1()
    {
        $conectar = Conectar::conexion();
        $sql = "SELECT * FROM noticias ORDER BY id_noticia DESC LIMIT 0,1"; //
        $resultado = $conectar->prepare($sql);
        $resultado->execute();
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        return $fila;
        $conectar = null;
       

    }
    public function get_noticia2()
    {
        $conectar = Conectar::conexion();
        $sql = "SELECT * FROM noticias ORDER BY id_noticia DESC LIMIT 1,2"; //
        $resultado = $conectar->prepare($sql);
        $resultado->execute();
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        return $fila;
        $conectar = null;
       

    }
    public function get_noticia3()
    {
        $conectar = Conectar::conexion();
        $sql = "SELECT * FROM noticias ORDER BY id_noticia DESC LIMIT 2,3"; //
        $resultado = $conectar->prepare($sql);
        $resultado->execute();
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        return $fila;
        $conectar = null;
    }
    public function get_noticia4()
    {
        $conectar = Conectar::conexion();
        $sql = "SELECT * FROM noticias ORDER BY id_noticia DESC LIMIT 3,4"; //
        $resultado = $conectar->prepare($sql);
        $resultado->execute();
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        return $fila;
        $conectar = null;
    }
    public function get_noticia5()
    {
        $conectar = Conectar::conexion();
        $sql = "SELECT * FROM noticias ORDER BY id_noticia DESC LIMIT 4,5"; //
        $resultado = $conectar->prepare($sql);
        $resultado->execute();
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        return $fila;
        $conectar = null;
    }

    

    
/******************************** ADMINISTRADOR *********************************/
    //metodo para listar los registros de la tabla
    public function get_noticias()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM noticias";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
        $conectar = null;
    }

    //metodo para registrar noticias, parametros que recibe por ajax desde el formulario
    public function registrar_noticia($titulo, $subtitulo, $texto, $tecnologias, $usuario, $estado)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO noticias VALUES (null,?,?,?,?,?,now(),?)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $_POST["titulo"]);
        $sql->bindValue(2, $_POST["subtitulo"]);
        $sql->bindValue(3, $_POST["texto"]);
        $sql->bindValue(4, $_POST["tecnologias"]);
        $sql->bindValue(5, $_POST["usuario"]);
        $sql->bindValue(6, $_POST["estado"]);
        $sql->execute();
        $conectar = null;
    }

    //metodo para modificar un registro de la tabla 
    public function editar_noticia($id_usuario, $titulo, $subtitulo, $texto, $tecnologias, $usuario, $estado)
    {

        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE noticias SET titulo=?,subtitulo=?,texto=?,tecnologias=?,usuario=?,estado=? where id_noticia=?";

        // echo $sql;

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $_POST["titulo"]);
        $sql->bindValue(2, $_POST["subtitulo"]);
        $sql->bindValue(3, $_POST["texto"]);
        $sql->bindValue(4, $_POST["tecnologias"]);
        $sql->bindValue(5, $_POST["usuario"]);
        $sql->bindValue(6, $_POST["estado"]);
        $sql->bindValue(7, $_POST["id_noticia"]);
        $sql->execute();
        $conectar = null;
        // print_r($_POST);
    }

    //metodo para obtener un registro de la tabla usuario segun el id, que se recibe por ajax
    public function get_noticia_por_id($id_noticia)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM noticias WHERE id_noticia=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_noticia);
        $sql->execute();
        return  $resultado = $sql->fetchAll();
        $conectar = null;
    }

    //metodo para eliminar un registro de la tabla
    public function eliminar_noticia($id_noticia)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM noticias WHERE id_noticia=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_noticia);
        $sql->execute();
        return $resultado = $sql->fetch();
        $conectar = null;
    }

    //metodo para editar el estado del usuario, activar y desactivar 
    public function editar_estado($id_noticia, $estado)
    {
        $conectar = parent::conexion();
        parent::set_names();
        //el parametro est se envia por ajax
        if ($_POST["est"] == "0") {
            $estado = 1;
        } else {
            $estado = 0;
        }
        $sql = "UPDATE noticias SET estado=? WHERE id_noticia=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $estado);
        $sql->bindValue(2, $id_noticia);
        $sql->execute();
        $conectar = null;
    }
}














?>