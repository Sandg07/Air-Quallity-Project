// Where you want to render the map.
var element = document.getElementById("osm-map");

// Height has to be set. You can do this in CSS too.
element.style = "height:600px; width:600px";

// Create Leaflet map on map element.
var map = L.map(element);

// Add OSM tile layer to the Leaflet map.
L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
    attribution:
        '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);

// Target's GPS coordinates.
var targetLuxCity = L.latLng("49.8096317", "6.064453"); //Luxembourg

// Set map's center to target with zoom 14.
map.setView(targetLuxCity, 9);
