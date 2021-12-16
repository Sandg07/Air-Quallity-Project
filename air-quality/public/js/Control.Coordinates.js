/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************************!*\
  !*** ./resources/js/Control.Coordinates.js ***!
  \*********************************************/
/**
 * INSERT MARKER IN MAP FROM DB
 */
function addFavorites(x, y) {
  var marker = L.marker(x, y).addTo(map);
}
/**
 ** SET UP THE MAP
 */
//  Where you want to render the map.


var element = document.getElementById("favoriteMap"); // // Height has to be set. You can do this in CSS too.

element.style = "height:400px; width:600px"; // Create Leaflet map on map element.
//By default Luxembourg city

var map = L.map(element).setView([49.611622, 6.131935], 14);
L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
  attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);
/*
 ON CLICK EVENT
*/
//ADD MARKER

var currentMarker;
map.on("click", function (e) {
  if (currentMarker && currentMarker["cleared"] == false) {
    currentMarker._icon.style.transition = "transform 0.3s ease-out";
    currentMarker._shadow.style.transition = "transform 0.3s ease-out";
    currentMarker.setLatLng(e.latlng);
    setTimeout(function () {
      currentMarker._icon.style.transition = null;
      currentMarker._shadow.style.transition = null;
    }, 300);
    $("#coordinates").attr({
      value: e.latlng.lat + "," + e.latlng.lng
    });
    return;
  } else if (!currentMarker) currentMarker = L.marker(e.latlng, {
    draggable: true
  }).addTo(map).on("click", function () {
    e.originalEvent.stopPropagation();
  }); // Add an input to the DB


  $("#coordinates").attr({
    value: e.latlng.lat + "," + e.latlng.lng
  });
  currentMarker["cleared"] = false;
});

if (favorites != undefined && favorites.length != 0) {
  favorites.forEach(function (favorite) {
    var favoriteMarker = L.marker([favorite.coordinates_x, favorite.coordinates_y]).addTo(map);
  });
}
/******/ })()
;