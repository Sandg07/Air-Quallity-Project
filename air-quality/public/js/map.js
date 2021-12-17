/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************!*\
  !*** ./resources/js/map.js ***!
  \*****************************/
// Where you want to render the map.
var element = document.getElementById("osm-map"); // Height has to be set. You can do this in CSS too.

element.style = "height:500px; width:100%"; // Create Leaflet map on map element.

var map = L.map(element); // Add OSM tile layer to the Leaflet map.

L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
  attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map); // Target's GPS coordinates.

var targetLuxCity = L.latLng("49.8096317", "6.064453"); //Luxembourg
// Set map's center to target with zoom 14.

map.setView(targetLuxCity, 9); // ***************** SCALE COLORS *********************
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
// ***************************************************

/*  L.marker([39.61, -105.02]).bindPopup('Littleton, CO.').addTo(groups.poluents);

var groupedOverlays = {
    "Poluents": {
      "PM10": groups.poluents,
      
    },
    "Favorites": {
      "Favorite": groups.favorites,
     
    }
  };
  
  L.control.groupedLayers(basemaps, groupedOverlays, options).addTo(map);

var options = {
    exclusiveGroups: ["Poluents"],
    groupCheckboxes:true};



var layerControl = L.control.groupedLayers(groupedOverlays, options);
map.addControl(layerControl);

   */
// ***************** INSERT PM10 POINTS *********************

function addPoint(LatLgn, color) {
  var circle = L.circle(LatLgn, {
    color: "transparent",
    fillColor: color,
    fillOpacity: 0.7,
    radius: 500
  }).addTo(map);
}

var alldata = JSON.parse(pollutant.pollutant);
var allpm10 = alldata.pm10.forEach(function (data) {
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
  } //this one use first y then x


  var LatLgn = L.latLng(data.y, data.x);
  addPoint(LatLgn, color);
}); // ***************** INSERT FAVORITES *********************
//console.log(favorites);

function addFavorites(x, y) {
  var marker = L.marker(x, y).addTo(map);
} // /**
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
/*******************************************/
// ***************** INSERT FAVORITES *********************

var elmnt = document.getElementById("all-favorites");
Object.values(favorites).forEach(function (favorite) {
  console.log(favorite.id);
  $("#all-favorites").append("<strong>Name of place : </strong>", favorite.name, "<br>");
  $("#all-favorites").append("<strong>Category : </strong>", favorite.category, "<br>"); //var route = @json(route('favorites.delete', [favorite.id]));

  $("#all-favorites").append('<button class="btn-secondary rounded">Delete</button><br>').attr('href', route); // https://github.com/tighten/ziggy
  // 
});
/*  <strong>ID: </strong>{{ $favorite->id }}<br>
        <strong>Name of place : </strong>{{ $favorite->name }}<br>
        <strong>Category: </strong>{{ $favorite->category }}<br>
        <strong>Coordinates_x: </strong>{{ $favorite->coordinates_x }}<br>
        <strong>Coordinates_y: </strong>{{ $favorite->coordinates_y }}<br>
        <strong>User_id: </strong>{{ $favorite->user_id }}<br>

        <a href="{{ route('favorites.delete', [$favorite->id]) }}">Delete</a>
        <hr>
    </div>
@endforeach
@else
<p>No favorites in my DB.</p>
@endif */
/******/ })()
;