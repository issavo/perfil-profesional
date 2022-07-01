$(document).ready(function () {
    $("#contenedor_portfolio p").hide();
    //identificar y poner a la escucha todas las imagenes
    var imagenes = document.querySelectorAll("#contenedor_portfolio div");
    textos = new Array();
    textos = document.querySelectorAll("#contenedor_portfolio p");
    for (var i = 0; i < imagenes.length; i++) {
        imagenes[i].addEventListener("click", cambiar, false);
        $(imagenes[i]).width(560).height(350).click(
        function () {
            $(this).animate({
                marginTop: "150px",
                width: "300px",
                height: "200px"
            }, 1500, function () {
                for (var i = 0; i < textos.length; i++){
                $(textos[i]).fadeIn(1000).delay(1000).fadeOut(1000);
                }
                //delay realiza una pausa en el efecto
            }).delay(3000);//termina animate

            $(this).animate({
                marginTop: "0px",
                width: "100px",
                height: "100px"
            }, 1500);
        });//termina click
});// termina función ready



// dentro de ready
//identificar y poner a la escucha todas las imagenes
var imagenes = document.querySelectorAll("##contenedor_portfolio div");
for (var i = 0; i < imagenes.length; i++) {
    imagenes[i].addEventListener("mouseove", cambiar, false);
    imagenes[i].addEventListener("mouseout", restaurar, false);
}
//fuera de ready
function cambiar(e) {
    //para microsoft
    if(!e){e = window.event;}
    //$("header img").attr("src", "../img/playa2.JPG"); //-> Para imagen header
    if (e.target.id == imagen_1 ) {
        $('texto_1').fadeIn(500).fadeOut(1500);  
    } else if (e.target.id == imagen_2) {
        $('texto_2').fadeIn(500).fadeOut(1500);
    } else if (e.target.id == imagen_3) {
        $('texto_3').fadeIn(500).fadeOut(1500);
    } else if (e.target.id == imagen_4) {
        $('texto_4').fadeIn(500).fadeOut(1500);;
    }
}        


// <!-------------------------------------------------------------------------------------------->
$(document).ready(function () {
    $("#contenedor_portfolio p").hide();
    var imagenes = document.querySelectorAll("#contenedor_portfolio img");
    for (var i = 0; i < imagenes.length; i++) {
        $(imagenes[i]).width(560).height(350).click(
            function () {
                $(this).animate({
                    marginLeft: "150px",
                    width: "800px",
                    height: "400px"
                }, 1500, function (e) {
                    if (e.target == imagen_1) {
                        $('texto_1').fadeIn(500).fadeOut(1500);
                    } else if (e.target == imagen_2) {
                        $('texto_2').fadeIn(500).fadeOut(1500);
                    } else if (e.target == imagen_3) {
                        $('texto_3').fadeIn(500).fadeOut(1500);
                    } else if (e.target == imagen_4) {
                        $('texto_4').fadeIn(500).fadeOut(1500);;
                    }//termina if
                       

                        			// var textos = document.querySelectorAll("#contenedor_portfolio p");
                        			// for (var i = 0; i < textos.length; i++){
                        			// $(textos[i]).fadeIn(1000).delay(1000).fadeOut(1000);
                        			// }//termina for

                    //delay realiza una pausa en el efecto
                }).delay(3000);//termina function

                $(this).animate({
                    marginLeft: "0px",
                    width: "560px",
                    height: "350px"
                }, 5000);
            });//termina click
    }//termina for


 });// termina función ready
