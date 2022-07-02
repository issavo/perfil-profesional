<?php
    // conexion a la base de datos
    // require_once("../config/conexion.php");

    class Proyectos extends Conectar
    {
        private $proyectos = array();
      /* ADMINISTRADOR */
        //metodo para listar la tabla proyectos
        public function get_proyectos()
        {
            $conectar=parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM proyectos";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
            $conectar = null;  
        }

        /*poner ruta de las imagenes vistas/upload*/
        public function upload_image()
        {

          if(isset($_FILES["proyecto_imagen"]))
          {
            //extension de la imagen
            $extension = explode('.', $_FILES['proyecto_imagen']['name']);
            //anadir nuevo nombre a las imagenes
            $new_name = rand() . '.' . $extension[1];
             //indicamos el directorio o carpeta donde se guardará con el nuevo nombre
            $destination = '../vistas/upload/' . $new_name;
            //movemos la imagen de la carpeta temporal a la carpeta destino
            move_uploaded_file($_FILES['proyecto_imagen']['tmp_name'], $destination);
            return $new_name;
          }
        }


        //metodo para registrar proyectos en la tabla proyectos, parametros que recibe por ajax desde el formulario
        public function registrar_proyecto($titulo, $subtitulo, $descripcion, $tecnologias, $duracion, $estado, $imagen)
        {
          $conectar = parent::conexion();
          parent::set_names();
          //ALMACENAR IMAGEN
          //llamo a la funcion upload_image()
          require_once("Proyectos.php");
          $imagen_proyecto = new Proyectos();
          $imagen = '';
          if ($_FILES["proyecto_imagen"]["name"] != "")
          {
            $imagen = $imagen_proyecto->upload_image();
          }
          $sql = "INSERT INTO proyectos VALUES (null,?,?,?,?,?,?,?)";
          $sql = $conectar->prepare($sql);
          $sql->bindValue(1, $_POST["titulo"]);
          $sql->bindValue(2, $_POST["subtitulo"]);
          $sql->bindValue(3, $_POST["descripcion"]);
          $sql->bindValue(4, $_POST["tecnologias"]);
          $sql->bindValue(5, $_POST["duracion"]);
          $sql->bindValue(6, $_POST["estado"]);
          $sql->bindValue(7, $imagen);
          $sql->execute();
          $conectar = null;
        }

        //obtener el registro por id despues de editar
        public function get_proyecto_por_id($id_proyecto)
        {
          $conectar = parent::conexion();
          parent::set_names();
          $sql = "SELECT * FROM proyectos WHERE id_proyecto=?";
          $sql = $conectar->prepare($sql);
          $sql->bindValue(1, $id_proyecto);
          $sql->execute();
          $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
          return $resultado;
          $conectar = null;
        }

        //método para editar registros
        public function editar_proyecto($titulo, $subtitulo, $descripcion, $tecnologias, $duracion, $estado, $imagen, $id_proyecto)
        {
          $conectar = parent::conexion();
          parent::set_names();
          //llamo a la funcion upload_image()
          require_once("Proyectos.php");
          $imagen_proyecto = new Proyectos();
          $imagen = '';
          if ($_FILES["proyecto_imagen"]["name"] != "")
          {
            $imagen = $imagen_proyecto->upload_image();
          } else {
            $imagen = $_POST["hidden_proyecto_imagen"];
          }
          $sql = "UPDATE proyectos SET titulo=?, subtitulo=?, descripcion=?, tecnologias=?, duracion=?, estado=?,imagen=? WHERE id_proyecto=?";
          $sql = $conectar->prepare($sql);
          $sql->bindValue(1, $_POST["titulo"]);
          $sql->bindValue(2, $_POST["subtitulo"]);
          $sql->bindValue(3, $_POST["descripcion"]);
          $sql->bindValue(4, $_POST["tecnologias"]);
          $sql->bindValue(5, $_POST["duracion"]);
          $sql->bindValue(6, $_POST["estado"]);
          $sql->bindValue(7, $imagen);
          $sql->bindValue(8, $_POST["id_proyecto"]);
          $sql->execute();
          $conectar = null;
        }

        //método para activar Y/0 desactivar el estado del proyecto
        public function editar_estado($id_proyecto,$estado)
        {
          $conectar=parent::conexion();
          parent::set_names();     
          //si estado es igual a 0 entonces lo cambia a 1
          //el parametro est viene por via ajax, viene de est:est
          $estado = 0;
          if($_POST["est"] == 0){
            $estado = 1;
          }
          $sql="UPDATE proyectos SET  estado=? WHERE id_proyecto=?";
          $sql=$conectar->prepare($sql);
          $sql->bindValue(1, $estado);
          $sql->bindValue(2, $id_proyecto);
          $sql->execute();
          $conectar = null;
        }

        //metodo para buscar un proyecto por el nombre
         public function get_proyecto_nombre($titulo)
         {
              $conectar=parent::conexion();
              parent::set_names();
              $sql= "SELECT* FROM proyectos where titulo=?";
              $sql=$conectar->prepare($sql);
              $sql->bindValue(1, $titulo);
              $sql->execute();
              $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
              return $resultado;
              $conectar = null;
        }

        // Metodo para mostrar los proyectos en inicio
        public function get_mostrar_proyectos()
        {
          $conectar = parent::conexion();
          parent::set_names();
          $sql = "SELECT * FROM proyectos ORDER BY id_proyecto DESC";
          $sql = $conectar->prepare($sql);
          $sql->execute();
          while($fila = $sql->fetch()){
               $this->proyectos[] = $fila;
          }
          return $this->proyectos;
          $conectar = null; 
        }

        //metodo para eliminar un registro de la tabla
        public function eliminar_proyecto($id_proyecto)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "DELETE FROM proyectos WHERE id_proyecto=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_proyecto);
            $sql->execute();
            return $resultado = $sql->fetch();
            $conectar = null;
        }

    }















?>