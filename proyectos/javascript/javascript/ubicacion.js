"use strict";
/************* Cargar Mapa  *******************/

//soportar geolocalizacion del navegador
if (navigator.geolocation) {
  //si funciona la geolocalizacion
  //cargar mapa al cargar la pagina

  //coordenadas y zoom
  var mimapa = L.map("mapa").setView([39.470038, -0.377209], 17);
  //capa del mapa
  L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 18,
    attribution:
      'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
  }).addTo(mimapa);
  //creamos marcador
  var marcador = L.marker([39.470038, -0.377209]).addTo(mimapa);
  L.marker([39.470038, -0.377209], { draggable: true })
    .addTo(mimapa)
    .bindPopup(
      "Empresa: <b>Pages</b><br/>Desarrollo de páginas webs<br/>c/La Marina,33<br/>46002, VALENCIA"
    );

  //Boton calcular ruta

  $("#calRuta").on("click", function () {
    //obtenemos la posición del usuario
    navigator.geolocation.getCurrentPosition(function (position) {
      var latitude = position.coords.latitude;
      var longitude = position.coords.longitude;

      //dibujamos el mapa desde la ubicacion del usuario
      var map = L.map("mapa2", {
        center: [latitude, longitude],
        zoom: 17,
      });

      //capa del mapa
      L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        maxZoom: 18,
        attribution:
          'Datos del mapa de &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>, ' +
          '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
          'Imágenes © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: "mapbox/streets-v11",
      }).addTo(map);

      //calcular ruta con el metodo routing machine
      L.Routing.control({
        waypoints: [
          L.latLng(latitude, longitude),
          L.latLng(39.470038, -0.377209),
        ],
        language: "es",
        routeWhileDragging: true,
      }).addTo(map);
    });
  });

  //Boton mi ubicacion
  $("#miUbicacion").on("click", function () {
    //obtenemos la posición del usuario
    navigator.geolocation.getCurrentPosition(function (position) {
      var latitude = position.coords.latitude;
      var longitude = position.coords.longitude;
      //dibujamos el mapa desde la ubicacion del usuario
      var m = L.map("mapa2").setView([latitude, longitude], 17);
      //capa del mapa
      L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        maxZoom: 18,
        attribution:
          'Datos del mapa de &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>, ' +
          '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
          'Imágenes © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: "mapbox/streets-v11",
      }).addTo(m);
      //creamos marcador
      var marca = L.marker([latitude, longitude], { draggable: true })
        .addTo(m)
        .bindPopup("<p><b>Mi ubicación</b></p>");
    });
  });
} else {
  //si no funciona geolocalizacion
  //coordenadas y zoom
  var mimapa = L.map("mapa").setView([39.470038, -0.377209], 17);

  //capa del mapa
  L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 18,
    attribution:
      'Datos del mapa de &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>, ' +
      '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
      'Imágenes © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: "mapbox/streets-v11",
  }).addTo(mimapa);

  //creamos marcador
  var marcador = L.marker([39.470038, -0.377209], { draggable: true })
    .addTo(mimapa)
    .bindPopup(
      "Empresa: <b>Pages</b><br/>Desarrollo de páginas webs<br/>c/La Marina,33<br/>"
    )
    .openPopup();
} //termina if
