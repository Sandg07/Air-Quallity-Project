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
// ***************** INSERT POINTS *********************

function addPoint(LatLgn, color) {
  var circle = L.circle(LatLgn, {
    color: "transparent",
    fillColor: color,
    fillOpacity: 0.6,
    radius: 500
  }).addTo(map);
}

var pollButtons = ["pm10", "no2", "o3", "pm25"];
pollButtons.forEach(function (poll) {
  $("#".concat(poll)).on("click", function (e) {
    e.preventDefault();

    var _token = $('meta[name="csrf-token"]').attr("content");

    $.ajax({
      url: "/map",
      type: "POST",
      data: {
        poll: poll,
        _token: _token
      },
      success: function success(response) {
        var newData = JSON.parse(response.apiData.pollutant);
        var newbarchartData = [{
          label: "index1",
          y: 0
        }, {
          label: "index2",
          y: 0
        }, {
          label: "index3",
          y: 0
        }, {
          label: "index4",
          y: 0
        }, {
          label: "index5",
          y: 0
        }, {
          label: "index6",
          y: 0
        }, {
          label: "index7",
          y: 0
        }, {
          label: "index8",
          y: 0
        }, {
          label: "index9",
          y: 0
        }, {
          label: "index10",
          y: 0
        }];
        newData[poll].forEach(function (point) {
          if (point.index == 1) {
            var color = "#4169E1";
            newbarchartData[0].y++;
          } else if (point.index == 2) {
            var color = "#7a96ea";
            newbarchartData[1].y++;
          } else if (point.index == 3) {
            var color = "#b3c3f3";
            newbarchartData[2].y++;
          } else if (point.index == 4) {
            var color = "#d9e1f9";
            newbarchartData[3].y++;
          } else if (point.index == 5) {
            var color = "#FFFF66";
            newbarchartData[4].y++;
          } else if (point.index == 6) {
            var color = "#FFCC00";
            newbarchartData[5].y++;
          } else if (point.index == 7) {
            var color = "#FF9800";
            newbarchartData[6].y++;
          } else if (point.index == 8) {
            var color = "#FF0000";
            newbarchartData[7].y++;
          } else if (point.index == 9) {
            var color = "#bf0000";
            newbarchartData[8].y++;
          } else if (point.index == 9) {
            var color = "#800000";
            newbarchartData[9].y++;
          } //this one use first y then x


          var LatLgn = L.latLng(point.y, point.x);
          addPoint(LatLgn, color);
        });
        var chart1 = new CanvasJS.Chart("chartContainer1", {
          animationEnabled: true,
          exportEnabled: true,
          theme: "light1",
          title: {
            text: "PM10"
          },
          data: [{
            type: "column",
            indexLabel: "{y}",
            indexLabelFontColor: "#5A5757",
            indexLabelPlacement: "inside",
            dataPoints: newbarchartData
          }]
        });
        chart1.render();
      }
    });
  });
});
var alldata = JSON.parse(pollutant.pollutant);
var barchartData = [{
  label: "index1",
  y: 0
}, {
  label: "index2",
  y: 0
}, {
  label: "index3",
  y: 0
}, {
  label: "index4",
  y: 0
}, {
  label: "index5",
  y: 0
}, {
  label: "index6",
  y: 0
}, {
  label: "index7",
  y: 0
}, {
  label: "index8",
  y: 0
}, {
  label: "index9",
  y: 0
}, {
  label: "index10",
  y: 0
}];
var allpm10 = alldata.pm10.forEach(function (data) {
  if (data.index == 1) {
    var color = "#4169E1";
    barchartData[0].y++;
  } else if (data.index == 2) {
    var color = "#7a96ea";
    barchartData[1].y++;
  } else if (data.index == 3) {
    var color = "#b3c3f3";
    barchartData[2].y++;
  } else if (data.index == 4) {
    var color = "#d9e1f9";
    barchartData[3].y++;
  } else if (data.index == 5) {
    var color = "#FFFF66";
    barchartData[4].y++;
  } else if (data.index == 6) {
    var color = "#FFCC00";
    barchartData[5].y++;
  } else if (data.index == 7) {
    var color = "#FF9800";
    barchartData[6].y++;
  } else if (data.index == 8) {
    var color = "#FF0000";
    barchartData[7].y++;
  } else if (data.index == 9) {
    var color = "#bf0000";
    barchartData[8].y++;
  } else if (data.index == 9) {
    var color = "#800000";
    barchartData[9].y++;
  } //this one use first y then x


  var LatLgn = L.latLng(data.y, data.x);
  addPoint(LatLgn, color);
}); // ***************** ADD BARCHART ******************************

window.onload = function () {
  var chart = new CanvasJS.Chart("chartContainer1", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1",
    title: {
      text: "PM10"
    },
    data: [{
      type: "column",
      indexLabel: "{y}",
      indexLabelFontColor: "#5A5757",
      indexLabelPlacement: "inside",
      dataPoints: barchartData
    }]
  });
  chart.render();
}; // /**
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
      value: e.latlng.lat + "," + e.latlng.lng
    });
    return;
  } else if (!currentMarker) currentMarker = L.marker(e.latlng, {
    draggable: true
  }).addTo(map).on("click", function () {
    e.originalEvent.stopPropagation();
  }); // Add an input to the DB


  $("#coordinates").attr({
    value: e.latlng.lat + "," + e.latlng.lng
  });
  currentMarker["cleared"] = false;
});

if (favorites != undefined && favorites.length != 0) {
  favorites.forEach(function (favorite) {
    L.marker([favorite.coordinates_x, favorite.coordinates_y]).addTo(map);
  });
}

$("#addFavoriteBtn").on("click", function (e) {
  e.preventDefault();
  var newtoken = $('meta[name="csrf-token"]').attr("content");
  var id = $("input[name='id']").val();
  var name = $("input[name='name']").val();
  var category = $("select").val();
  var user_id = $("input[name='user_id']").val();
  var coordinates = $("#coordinates").val();
  $.ajax({
    url: "/map",
    type: "POST",
    data: {
      id: id,
      name: name,
      category: category,
      user_id: user_id,
      coordinates: coordinates,
      _token: newtoken
    },
    success: function success(response) {
      last = response.last;
      console.log(response);
      L.marker([last.coordinates_x, last.coordinates_y]).addTo(map);
      $("#favoriteForm")[0].reset();
      $("<div><strong>Name of place :</strong> ".concat(last.name, "<br>\n            <strong>Category: </strong> ").concat(last.category, "<br>")).appendTo("#all-favorites");
    }
  });
}); // ***************** INSERT SEARCH BOX *********************

new L.Control.GPlaceAutocomplete({
  callback: function callback(place) {
    var loc = place.geometry.location;
    map.panTo([loc.lat(), loc.lng()]);
    map.setZoom(16);
  }
}).addTo(map); // ***************** SHOW ADD FAVORITE SECTION *********************

$("#addFavoriteSection").on("click", function (e) {
  $("#favorite-form-container").toggleClass("invisible visible");
});
/******/ })()
;