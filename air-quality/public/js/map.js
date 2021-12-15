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

map.setView(targetLuxCity, 9); // ********** Get the coordinates on click ********** 

/* function onMapClick(e) {
    alert("You clicked the map at " + e.latlng);
}

map.on("click", onMapClick); */
// *************************************************** 
// ********** INSERT LINES ********** 

/* var myLines = [
    {
        type: "LineString",
        coordinates: [
            //this one use first x then y
            [5.95722194, 49.50027806],
            [5.906932, 49.760736],
        ],
    }, */
// {
//     type: "LineString",
//     coordinates: [
//         [-105, 40],
//         [-110, 45],
//     ],
// },
//];

/* 
var myStyle = {
    color: "#ff7800",
    weight: 5,
    opacity: 0.65,
};

L.geoJSON(myLines, {
    style: myStyle,
}).addTo(map); */
// *************************************************** 
// ***************** SCALE COLORS ********************* 
// > 200 = #800000
// 151 - 200 = #bf0000 
// 101 - 150 = #FF0000
// 71 - 100 = #FF9800
// 51 - 70 = #FFCC00
// 41 - 50 = #FFFF66
// 31 - 40 = #d9e1f9
// 21 - 30 = #b3c3f3
// 11 - 20 = #7a96ea
// <= 10 = #4169E1
//this one use first y then x

console.log(pm10);

function addPoint(LatLgn, color) {
  var circle = L.circle(LatLgn, {
    color: "transparent",
    fillColor: color,
    fillOpacity: 0.9,
    radius: 500
  }).addTo(map);
  console.log(LatLgn);
}

pm10.pm10.forEach(function (data) {
  if (data.index == 1) {
    var color = "#4169E1";
  } else if (data.index == 2) {
    var color = "#7a96ea";
  } else if (data.index == 3) {
    var color = "#b3c3f3";
  } else if (data.index == 4) {
    var color = "#d9e1f9";
  } else if (data.index == 5) {
    var color = "#FFFF66";
  } else if (data.index == 6) {
    var color = "#FFCC00";
  } else if (data.index == 7) {
    var color = "#FF9800";
  } else if (data.index == 8) {
    var color = "#FF0000";
  } else if (data.index == 9) {
    var color = "#bf0000";
  } else if (data.index == 9) {
    var color = "#800000";
  }

  var LatLgn = L.latLng(data.y, data.x);
  addPoint(LatLgn, color);
});
/* var circle = L.circle([49.68132074, 6.44587485], {
    color: "red",
    fillColor: "#f03",
    fillOpacity: 0.5,
    radius: 1000,
}).addTo(map);
 */
/******/ })()
;