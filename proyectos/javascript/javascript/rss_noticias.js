/*************** Lector RSS de un archivo xml *********************/
//asociamos el evento a la imagen
document.getElementById("btn").addEventListener("click", cargarRss, true);
    function cargarRss() {
        //creamos el objeto xhr
        var xhr = new XMLHttpRequest();
    //por cada cambio de estado se ejecuta una funcion
            xhr.onreadystatechange = function () {
                //comprobacion del estado y status
                if (this.readyState == 4 && this.status == 200) {
                    //llamamos a la funcion que carga el documento xml
                    cargaXML(this);
                }
            }; //termina function
    //especificamos la solicitud
            xhr.open("GET", "./docs/portada.xml", true);
    //enviamos la solicitud
            xhr.send();
    } //termina cargarRss

//funcion que carga el archivo xml
    function cargaXML(xml) {
          //capturar la respuesta del servidor
          var docXML = xml.responseXML;
    //definimos las variables que van a rellenar el div
          var lista = "<li><h2><a href=''></a></h2></li><br/>";
          var noticias = docXML.getElementsByTagName("item");
          for (var i = 0; i < noticias.length; i++) {
            lista += "<li>";
            lista += "<h3>";
            lista += noticias[i].getElementsByTagName("title")[0].textContent;
            lista += "</h3></li>";
            lista += "<li>";
            lista += "<a href='" + noticias[i].getElementsByTagName("link")[0].textContent +"'>";     
            lista += noticias[i].getElementsByTagName("link")[0].textContent;
            lista += "</a>";
            lista += "</li>";
          }

          document.getElementById("enlaces_externos").innerHTML = lista;
        }
