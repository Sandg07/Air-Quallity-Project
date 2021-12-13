/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************!*\
  !*** ./resources/js/map.js ***!
  \*****************************/
// Where you want to render the map.
var element = document.getElementById("osm-map"); // Height has to be set. You can do this in CSS too.

element.style = "height:600px; width:600px"; // Create Leaflet map on map element.

var map = L.map(element); // Add OSM tile layer to the Leaflet map.

L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
  attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map); // Target's GPS coordinates.

var targetLuxCity = L.latLng("49.8096317", "6.064453"); //Luxembourg
// Set map's center to target with zoom 14.

map.setView(targetLuxCity, 9); // Get the coordinates on click

/* function onMapClick(e) {
    alert("You clicked the map at " + e.latlng);
}

map.on("click", onMapClick); */

var myLines = [{
  type: "LineString",
  coordinates: [//this one use first x then y
  [5.95722194, 49.50027806], [5.906932, 49.760736]]
} // {
//     type: "LineString",
//     coordinates: [
//         [-105, 40],
//         [-110, 45],
//     ],
// },
];
/* 
var myStyle = {
    color: "#ff7800",
    weight: 5,
    opacity: 0.65,
};

L.geoJSON(myLines, {
    style: myStyle,
}).addTo(map); */

var datas = [{
  x: "6.44587485",
  y: "49.68132074",
  z: "47.96606075",
  value: "11",
  index: "2"
}, {
  x: "6.44592624",
  y: "49.69031152",
  z: "47.96987591",
  value: "13",
  index: "2"
}]; //this one use first y then x

datas.forEach(function (data) {
  var LatLgn = L.latLng(data.y, data.x);
  addPoint(LatLgn);
});

function addPoint(LatLgn) {
  var circle = L.circle(LatLgn, {
    color: "red",
    fillColor: "#f03",
    fillOpacity: 0.5,
    radius: 1000
  }).addTo(map);
  console.log(LatLgn);
}
/* var circle = L.circle([49.68132074, 6.44587485], {
    color: "red",
    fillColor: "#f03",
    fillOpacity: 0.5,
    radius: 1000,
}).addTo(map);
 */
/******/ })()
;