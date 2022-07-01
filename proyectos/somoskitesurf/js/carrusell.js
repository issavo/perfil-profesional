// creamos dos funciones para que se muevan en cada sentido

function moverIzq() {
    // si aplicamos el script con el src, al desplazarse las imagenes se van machacando los src
    // por lo que declaramos una variable
    var imagen5;
    imagen5 = document.getElementById('img5').src; //inicializacion de la variable
    //esta variable recoge el src de img5 para que no se pierda nunca
    //vamos a ir desplazando las imagenes
    document.getElementById('img5').src = document.getElementById('img1').src;
    //indicamos a img5 el origen, que es imagen1 y la ruta de img5 se pierde.
    document.getElementById('img1').src = document.getElementById('img2').src;
    //indicamos a img1 el origen, que es imagen2 y la ruta de img1 se pierde. Asi con las demas
    document.getElementById('img2').src = document.getElementById('img3').src;
    document.getElementById('img3').src = document.getElementById('img4').src;
    // document.getElementById('img4').src = document.getElementById('img5').src; 
    //llegados a este punto (img4) se crea un bucle y muestra la misma img5 en todas las posiciones. porque img5 no existe
    //Para solucionarlo haremos en el ultimo
    document.getElementById('img4').src = imagen5;
}
//para la siguiente funcion es lo mismo pero la numeracion inversa
function moverDer() {
    //declaramos una variable
    var imagen1;
    imagen1 = document.getElementById('img1').src;
    document.getElementById('img1').src = document.getElementById('img5').src;
    document.getElementById('img5').src = document.getElementById('img4').src;
    document.getElementById('img4').src = document.getElementById('img3').src;
    document.getElementById('img3').src = document.getElementById('img2').src;
    document.getElementById('img2').src = imagen1;
}