/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/generalMap.js ***!
  \************************************/
// Where you want to render the map.
var element = document.getElementById("osm-map"); // Height has to be set. You can do this in CSS too.

element.style = "height:200px; width:400px"; // Create Leaflet map on map element.

var map = L.map(element); // Add OSM tile layer to the Leaflet map.

L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
  attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map); // Target's GPS coordinates.

var targetLuxCity = L.latLng("49.611622", "6.131935"); //Luxembourg

var targetBelval = L.latLng("49.500278", "5.957222"); //Belval
// Set map's center to target with zoom 14.

map.setView(targetLuxCity, 10);
map.setView(targetBelval, 10); // Place a marker on the same location.

L.marker(targetLuxCity).addTo(map);
L.marker(targetBelval).addTo(map);
/******/ })()
;