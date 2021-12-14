/**
 ** SET UP THE MAP
 */

//  Where you want to render the map.
var element = document.getElementById("favoriteMap");

// // Height has to be set. You can do this in CSS too.
element.style = "height:400px; width:600px";

// Create Leaflet map on map element.
//By default Luxembourg city
var map = L.map(element).setView([49.611622, 6.131935], 12);

// Add OSM tile layer to the Leaflet map.
L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
    attribution:
        '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);

/**
 ** ON CLICK EVENT
 */
var xlng = 0.000256;
var xlat = 0.0002;

map.on("click", function (e) {
    console.log(e.latlng.lat, e.latlng.lng);
    //var c = L.circle([e.latlng.lat,e.latlng.lng], {radius: 15}).addTo(map);
    L.polygon([
        [e.latlng.lat - xlat, e.latlng.lng - xlng],
        [e.latlng.lat + xlat, e.latlng.lng - xlng],
        [e.latlng.lat - xlat, e.latlng.lng + xlng],
        [e.latlng.lat + xlat, e.latlng.lng + xlng],
    ]).addTo(map);

    L.polyline([
        [e.latlng.lat, e.latlng.lng - xlng],
        [e.latlng.lat, e.latlng.lng + xlng],
    ]).addTo(map);

    $("<input>")
        .attr({
            value: "(" + e.latlng.lat + "," + e.latlng.lng + ")",
            id: "coordinates",
            name: "coordinates",
        })
        .appendTo("form");

    // $("#coordinates").append("(" + e.latlng.lat + "," + e.latlng.lng + ")");
    // console.log(e);
});
