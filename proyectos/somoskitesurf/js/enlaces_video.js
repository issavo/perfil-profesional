/************************************** Funcionalidad de la botonera del video ********************************/
/* El botón de play inicia y pausa el video */
//identificar los elementos, declaración de las variables globales para acceder desde cualquier método
var mivideo;
var reproducir;
var barra;
var progreso;
var maximo;
maximo = 600;
//La funcionalidad se define en la función comenzar()
function comenzar() {
    //inicialización de las variables->identificacion de los elementos dentro de la función
    //asociar los elementos con las variables para poder referenciar los elementos con las variables posteriormente

    mivideo = document.getElementById("enlaces_3_video");
    reproducir = document.getElementById("reproducir");
    barra = document.getElementById("barra_progreso");
    progreso = document.getElementById("progreso");

    /* Tanto el botón como la barra de progreso responderán a eventos por lo que añado addEventListener()*/
    //prepara el Botón para desencadenar una accion tras un evento
    reproducir.addEventListener("click", pinchar, false);

    //prepara la barra de progreso del video para desencadenar una accion tras un evento
    barra.addEventListener("click", evolucionando, false);
}

/************************************** Funcionalidad del botón ********************************************/
function pinchar() {
    //que reproduzca el vídeo
    if ((mivideo.paused == false) && (mivideo.ended == false)) {
        mivideo.pause();
        //cambia el texto del botón
        reproducir.innerHTML = "Play";
    } else {
        mivideo.play();
        //cambiar el texto del botón cuando el video se inicia
        reproducir.innerHTML = "Pause";
        /* Para que este llamando constantemente a la función estado utilizamos el método setInterval(), el cuál requiere de una variable. Recibe 2 parámetros: 
            - 1º->función a la que quieres llamar
            - 2º->con cuánta frecuencia quieres llamar a esa función (en milisegundos(msg))*/
        bucle = setInterval(estado, 30); //Llamará 1 vez por cada 30 msg para que sea más fluido
    }
}


/*****************************************  Barra de progreso del video **************************************/

/*función que muestra el estado de la barra de progreso del video */
function estado() {
    if (mivideo.ended == false) {
        //Queremos que la progresion de la barra se sincronice con el tiempo en el que transcurre el video
        //Declaramos una variable
        var total = parseInt(mivideo.currentTime * maximo / mivideo.duration); //Es una regla de 3
        progreso.style.width = total + 'px';
        //modifica el estilo de un elemento (barra de progreso) y une el valor de almacena con la medida del width      
    }
}
/* mivideo.currentTime, lo que hace es devolver el sg de reproducción del vídeo en el que te encuentras */
/* maximo, la variable que almacena el ancho total correspondiente a la barra */
/* mivideo.duration, corresponde a la duración total del vídeo */

/****************** Poder avanzar o retroceder el vídeo desde la barra de progreso ******************/

/*Lo primero que necesito saber es en que punto de la pantalla se encuentra el ratón cuando hago click sobre la barra de progreso. Para ello existe:
    - la propiedad pageX -> que nos devuelve la posición del ratón en el eje X(eje horizontal al igual que la barra de progreso)
    - la propiedad offsetLeft -> que nos devuelve la distancia que hay desde el borde izquierdo dónde empieza la página hasta el pto dónde empieza la barra de progreso.botons
Si resto estas dos medidas, el resultado sería el pto/la distancia dónde se ha hecho click en la barra de progreso  */

function evolucionando(posicion) {
    if ((mivideo.paused == false) && (mivideo.ended == false)) {
        //declarar e inicializar la variable que almacena la posición del ratón dentro de la barra
        var ratonX = posicion.pageX - barra.offsetLeft;
        //la variable posicion la recibe como parámetro la función
        var nuevoTiempo = ratonX * mivideo.duration / maximo;
        //ahora llevamos el video a ese nuevoTiempo
        mivideo.currentTime = nuevoTiempo;
        //ahora llevamos la barra de progreso a ese tiempo
        progreso.style.width = ratonX + 'px';
    }
}
/* Lo segundo que necesito es saber ese punto donde hace click en la barra a que segundo del video corresponde, otra regla de tres.
- La variable nuevoTiempo lo que hace es almacenar el tiempo al que corresponde */
//generar el evento que llama a la función que reproduce el video pinchar()
window.addEventListener("load", comenzar, false);


