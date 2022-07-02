<?php
/* funcion que inicia o  reanuda una sesion, se añade aqui porque siempre llamamos al archivo conexion para crear la variable de sesion */
    session_start();
    class Conectar 
    {
        //protected, solo llamar dentro de la misma clase
        protected $dbh;

       protected function conexion()
        {
            try {
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=pages", "localhost:8080", "");
                return $conectar;//se llamara desde otra clase
  
            } catch (Exception $e) {
                 print "¡Error!: " . $e->getMessage() . "<br/>";
                die();  
            }//catch 
        }//conexion 

        //metodo para la codificacion de caracteres extraños (ñ,tildes,acentos,...)
        public function set_names()
        {
            return $this->dbh->query("SET NAMES 'utf8");
        }

        //metodo para indicar la ruta del proyecto
        public function ruta()
        {
            return "http://localhost/proyecto/";
        }

        //metodo que acorta el contenido de la noticia 
        public static function corta_palabra($palabra,$num)
        {

            $largo=strlen($palabra);//indicar el largo de una cadena
            $cadena=substr($palabra,0,$num);
            return $cadena;
        }

    }//Conectar


    

?>