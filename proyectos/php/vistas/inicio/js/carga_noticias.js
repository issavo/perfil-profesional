
$(document).ready(function() {
  //ocultar el texto de la noticia al cargar la pagina
   $("#caja1").hide();
   $("#caja2").hide();
   $("#caja3").hide();
   $("#caja4").hide();
   $("#caja5").hide();
  
});

//funciones para mostrar las noticias de forma independiente
//mostrar la noticia 1
 function mostrar1(id_noticia){
   //evento para ocultar el contenido de la noticia
       $(document).on("click", "#" + id_noticia, function () {
        $('#caja1').show();
       });   
 }
//mostrar la noticia 2
 function mostrar2(id_noticia){
   //evento para ocultar el contenido de la noticia
       $(document).on("click", "#" + id_noticia, function () {
        $('#caja2').show();
       });   
 }
//mostrar la noticia 3
 function mostrar3(id_noticia){
   //evento para ocultar el contenido de la noticia
       $(document).on("click", "#" + id_noticia, function () {
        $('#caja3').show();

       });   
 }
//mostrar la noticia 4
 function mostrar4(id_noticia){
   //evento para ocultar el contenido de la noticia
       $(document).on("click", "#" + id_noticia, function () {
        $('#caja4').show();
       });   
 }
//mostrar la noticia 5
 function mostrar5(id_noticia){
   //evento para ocultar el contenido de la noticia
       $(document).on("click", "#" + id_noticia, function () {
         
        $('#caja5').show();
       });   
 }

//cerrar las noticias de forma independiente
//noticia 1
function cerrar1(id_noticia){
    //evento para ocultar el contenido de la noticia
    $(document).on("click", "#" + id_noticia, function () {
      $("#caja1").hide();
    });
      
}
//noticia 2
function cerrar2(id_noticia){
    //evento para ocultar el contenido de la noticia
    $(document).on("click", "#" + id_noticia, function () {
      $("#caja2").hide();
    });
      
}
//noticia 3
function cerrar3(id_noticia){
    //evento para ocultar el contenido de la noticia
    $(document).on("click", "#" + id_noticia, function () {
      $("#caja3").hide();
    });
      
}
//noticia 4
function cerrar4(id_noticia){
    //evento para ocultar el contenido de la noticia
    $(document).on("click", "#" + id_noticia, function () {
      $("#caja4").hide();
    });
      
}
//noticia 5
function cerrar5(id_noticia){
    //evento para ocultar el contenido de la noticia
    $(document).on("click", "#" + id_noticia, function () {
      $("#caja5").hide();
    });
      
}


//mostrar la noticia en inicio2
 function mostrar_noticia(id_noticia){
    $.ajax({
					url:"ajax/noticias_admin.php?op=buscar_noticia",
					method:"POST",
					data:{id_noticia:id_noticia},
					cache: false,
					dataType:"json",
					success:function(data){
            console.log(data);
            // $("#titulo").val(data.titulo);
            // $("#subtitulo").val(data.subtitulo);
            // $("#texto_noticia").val(data.texto);
            // $("#tecnologias").val(data.tecnologias);
          }//success
    });//ajax
 }
  
 
