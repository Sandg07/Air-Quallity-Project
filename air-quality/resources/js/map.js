// Where you want to render the map.
var element = document.getElementById("osm-map");

// Height has to be set. You can do this in CSS too.
element.style = "height:500px; width:100%";

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
        radius: 500,
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
    }
    //this one use first y then x
    var LatLgn = L.latLng(data.y, data.x);
    addPoint(LatLgn, color);
});

// /**
//  ** ON CLICK EVENT
//  */

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
            value: e.latlng.lat + "," + e.latlng.lng,
        });
        return;
    } else if (!currentMarker)
        currentMarker = L.marker(e.latlng, {
            draggable: true,
        })
            .addTo(map)
            .on("click", function () {
                e.originalEvent.stopPropagation();
            });

    // Add an input to the DB
    $("#coordinates").attr({
        value: e.latlng.lat + "," + e.latlng.lng,
    });
    currentMarker["cleared"] = false;
});

if (favorites != undefined && favorites.length != 0) {
    favorites.forEach((favorite) => {
        L.marker([favorite.coordinates_x, favorite.coordinates_y]).addTo(map);
    });
}

$("#addFavoriteBtn").on("click", function (e) {
    e.preventDefault();

    let _token = $('meta[name="csrf-token"]').attr("content");
    let id = $("input[name='id']").val();
    let name = $("input[name='name']").val();
    let category = $("select").val();
    let user_id = $("input[name='user_id']").val();
    let coordinates = $("#coordinates").val();

    $.ajax({
        url: "/map",
        type: "POST",
        data: {
            id: id,
            name: name,
            category: category,
            user_id: user_id,
            coordinates: coordinates,
            _token: _token,
        },
        success: function (response) {
            last = response.last;

            L.marker([last.coordinates_x, last.coordinates_y]).addTo(map);
            $("#favoriteForm")[0].reset();
            $(`<div><strong>ID: ${last.id} </strong><br><strong>Name of place :</strong> ${last.name}<br>
            <strong>Category: </strong> ${last.category}<br>
            <strong>Coordinates_x: </strong> ${last.coordinates_x}<br>
            <strong>Coordinates_y: </strong>${last.coordinates_y} <br>
            <strong>User_id: </strong>${last.user_id} <br>`).appendTo(
                "#all-favorites"
            );
        },
    });
});
