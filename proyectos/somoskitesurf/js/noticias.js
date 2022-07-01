// Cargar contenido de archivos en contenedor.
 $(document).ready(function(){
    // MENÚ FLOTANTE
      //asociamos el evento al botón noticias 
        $("#menu").hover(function () {
            //$(this).stop().animate( -> el metodo stop() evita que se ejecuten mouseover consecutivos
            $(this).stop().animate({
                left: "0"}, 800, "easeInSine");//termina animate
            },
            function () {
                $(this).stop().animate({
                    left: "-140px"
                }, 600, "easeOutSine");//termina animate
            }
        );//termina hover


    // CARGAR CONTENIDO NOTICIAS EXTERNAS
        //apuntar a los vinculos de las otras paginas
           $("#barra  a").click(function () {
               /* codigo para todos los archivos */
               var url = $(this).attr("href");
               //apuntar al div que descarga la informacion
               $("#noticias_externas").load(url + " #noticia");//importante dejar el espacio antes del selector
               //recibe el nombre del archivo con un espacio y un selector carga una zona determinada
               return false;//deshabilitamos el comportamiento del enlace correspondiente.
           });//termina click
       });//termina ready