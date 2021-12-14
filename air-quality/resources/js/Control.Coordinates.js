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

//Empty array to add all favorites
var allFavorites = [];

map.on("click", function (e) {
    console.log(e.latlng.lat, e.latlng.lng);
    //var c = L.circle([e.latlng.lat,e.latlng.lng], {radius: 15}).addTo(map);

    currentMarker1 = L.polygon([
        [e.latlng.lat - xlat, e.latlng.lng - xlng],
        [e.latlng.lat + xlat, e.latlng.lng - xlng],
        [e.latlng.lat - xlat, e.latlng.lng + xlng],
        [e.latlng.lat + xlat, e.latlng.lng + xlng],
    ])
        .addTo(map)
        .on("click", function (e) {
            e.originalEvent.stopPropagation();
        });

    currentMarker2 = L.polyline([
        [e.latlng.lat, e.latlng.lng - xlng],
        [e.latlng.lat, e.latlng.lng + xlng],
    ])
        .addTo(map)
        .on("click", function (e) {
            e.originalEvent.stopPropagation();
        });

    if (currentMarker1 && currentMarker2) {
        $("<input>")
            .attr({
                value: "(" + e.latlng.lat + "," + e.latlng.lng + ")",
                id: "coordinates",
                name: "coordinates",
            })
            .appendTo("form");

        array_push();
        return;
    }
    // $("#coordinates").append("(" + e.latlng.lat + "," + e.latlng.lng + ")");
    // console.log(e);
    // map.clearLayers();
});

document.getElementById("clearBtn").addEventListener("click", function () {
    currentMarker1 = null;
    currentMarker2 = null;
});
// tileLayer.on("click", () => {
//     if (L.polygon) this.remove();
//     if (L.popyline) this.remove();
// });

/**
 *  console.log(e.latlng.lat, e.latlng.lng);
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
 */
