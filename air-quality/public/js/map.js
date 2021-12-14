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
// const pm10 = require("storage/json/pm10.json");

var datas = JSON.parse('pm10');
/* const fs = require("storage/json/pm10.json")
function jsonReader(filePath, cb) {
    fs.readFile(filePath, (err, fileData) => {
        if (err) {
            return cb && cb(err)
        }
        try {
            const object = JSON.parse(fileData)
            return cb && cb(null, object)
        } catch(err) {
            return cb && cb(err)
        }
    })
}
jsonReader('storage/json/pm10.json', (err, customer) => {
    if (err) {
        console.log(err)
        return
    } */

/*   console.log(customer.address) // => "Infinity Loop Drive"
})*/
//this one use first y then x

console.log(datas);
datas.forEach(function (data) {
  var LatLgn = L.latLng(data.y, data.x);
  addPoint(LatLgn);
});

function addPoint(LatLgn) {
  var circle = L.circle(LatLgn, {
    color: "red",
    fillColor: "#f02",
    fillOpacity: 0.2,
    radius: 500
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