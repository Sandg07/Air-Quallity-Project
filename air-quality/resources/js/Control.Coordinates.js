/**
 ** SET UP THE MAP
 */

//  Where you want to render the map.
var element = document.getElementById("favoriteMap");

// // Height has to be set. You can do this in CSS too.
element.style = "height:400px; width:600px";

// Create Leaflet map on map element.
//By default Luxembourg city
var map = L.map(element).setView([49.611622, 6.131935], 14);

L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
    attribution:
        '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);

/*
 ON CLICK EVENT
*/

//ADD MARKER
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
        url: "/favorites",
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
                "#favoritesData"
            );
        },
    });
});
