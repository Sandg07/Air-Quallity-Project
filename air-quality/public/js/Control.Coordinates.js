/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************************!*\
  !*** ./resources/js/Control.Coordinates.js ***!
  \*********************************************/
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
}).addTo(map); // /**
//  ** ON CLICK EVENT
//  */

var currentMarker;
map.on("click", function (e) {
  if (currentMarker) {
    currentMarker._icon.style.transition = "transform 0.3s ease-out";
    currentMarker._shadow.style.transition = "transform 0.3s ease-out";
    currentMarker.setLatLng(e.latlng);
    setTimeout(function () {
      currentMarker._icon.style.transition = null;
      currentMarker._shadow.style.transition = null;
    }, 300);
    return;
  }

  currentMarker = L.marker(e.latlng, {
    draggable: true
  }).addTo(map).on("click", function () {
    e.originalEvent.stopPropagation();
  }); // Add an input to the DB

  $("<input>").attr({
    value: e.latlng.lat + "," + e.latlng.lng,
    // value: "(" + e.latlng.lat + "," + e.latlng.lng + ")",
    id: "coordinates",
    name: "coordinates"
  }).appendTo("form");
});
document.getElementById("done").addEventListener("click", function () {
  currentMarker = null;
});
/**
 * INSERT MARKER IN MAP FROM DB
 */

console.log(favorites);
/*******************************************/

/**
 * Circle marker example :
 * var c = L.circle([e.latlng.lat,e.latlng.lng], {radius: 15}).addTo(map);
 */

/**
 * Polygon / Polyline marker example :
 * var xlng = 0.000256;
 * var xlat = 0.0002;
 *   L.polygon([
        [e.latlng.lat - xlat, e.latlng.lng - xlng],
        [e.latlng.lat + xlat, e.latlng.lng - xlng],
        [e.latlng.lat - xlat, e.latlng.lng + xlng],
        [e.latlng.lat + xlat, e.latlng.lng + xlng],
    ]).addTo(map);

    L.polyline([
        [e.latlng.lat, e.latlng.lng - xlng],
        [e.latlng.lat, e.latlng.lng + xlng],
    ]).addTo(map);
 */
/******/ })()
;