/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************!*\
  !*** ./resources/js/map.js ***!
  \*****************************/
// ************ FUNCTIONS *******************
function addPoint(LatLgn, color) {
  var circle = L.circle(LatLgn, {
    color: "transparent",
    fillColor: color,
    fillOpacity: 0.6,
    radius: 500
  }).addTo(map);
  return circle;
}

function removePoints(pointsArray) {
  pointsArray.forEach(function (pointsOnMap) {
    map.removeLayer(pointsOnMap);
  });
}

function pointsAndCharts(chartData, data) {
  chartData[data.index - 1].y++;
  var LatLgn = L.latLng(data.y, data.x);
  var point = addPoint(LatLgn, chartData[data.index - 1].color);
  allPoints.push(point);
}

function printErrorMsg(msg) {
  $(".print-error-msg").find("ul").html("");
  $(".print-error-msg").css("display", "block");
  $.each(msg, function (key, value) {
    $(".print-error-msg").find("ul").append("<li>" + value + "</li>");
  });
} // ********** VARIABLES DECLARING ***************


var pollButtons = ["pm10", "no2", "o3", "pm25"];
var alldata = JSON.parse(pollutant.pollutant);
var barchartData = [{
  label: "index1",
  y: 0,
  color: "#4169E1"
}, {
  label: "index2",
  y: 0,
  color: "#7a96ea"
}, {
  label: "index3",
  y: 0,
  color: "#b3c3f3"
}, {
  label: "index4",
  y: 0,
  color: "#d9e1f9"
}, {
  label: "index5",
  y: 0,
  color: "#FFFF66"
}, {
  label: "index6",
  y: 0,
  color: "#FFCC00"
}, {
  label: "index7",
  y: 0,
  color: "#FF9800"
}, {
  label: "index8",
  y: 0,
  color: "#FF0000"
}, {
  label: "index9",
  y: 0,
  color: "#bf0000"
}, {
  label: "index10",
  y: 0,
  color: "#800000"
}];
var colors = [];
var allPoints = [];
var newPoints = [];
var currentMarker;
var highestNumber = 0;
var highestIndex = 0;
var sum = 0;
var pieCounter = 0; // ************* CREATING MAP *********************
// Where you want to render the map.

var element = document.getElementById("osm-map"); // Height has to be set. You can do this in CSS too.

element.style = "height:500px; width:100%"; // Create Leaflet map on map element.

var map = L.map(element); // Add OSM tile layer to the Leaflet map.

L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
  attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map); // Target's GPS coordinates.

var targetLuxCity = L.latLng("49.8096317", "6.064453"); //Luxembourg
// Set map's center to target with zoom 14.

map.setView(targetLuxCity, 9); // ***************** INSERT POINTS *********************

var allpm10 = alldata.pm10.forEach(function (data) {
  pointsAndCharts(barchartData, data);
  sum += parseInt(data.value);
  pieCounter++;
});
sum /= pieCounter;
sum = Math.round(sum * 100) / 100;
var pieChartColor = "";
if (sum <= 10) pieChartColor = barchartData[0].color;else if (sum <= 20) pieChartColor = barchartData[1].color;else if (sum <= 30) pieChartColor = barchartData[2].color;else if (sum <= 40) pieChartColor = barchartData[3].color;else if (sum <= 50) pieChartColor = barchartData[4].color;else if (sum <= 70) pieChartColor = barchartData[5].color;else if (sum <= 100) pieChartColor = barchartData[6].color;else if (sum <= 150) pieChartColor = barchartData[7].color;else if (sum <= 200) pieChartColor = barchartData[8].color;else if (sum > 200) pieChartColor = barchartData[9].color; // ***************** ADD BARCHART AND PIECHART ******************************

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
  $("#pieContainer").css({
    "border-radius": "50%",
    "background-color": pieChartColor
  });
  $("#sum").text(sum);
}; // *********** Drawing line on PieChart ******************
// ******************* ADDING NEW FAVORITES AND SHOWING FAVORITES FROM DB *******


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
} // ************* AJAX CALLS ********************
//Points and Charts


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
        if (allPoints.length > 1) {
          removePoints(allPoints);
          allPoints = [];
        } else {
          removePoints(newPoints);
          newPoints = [];
        }

        var newSum = 0;
        var newPieCounter = 0;
        var newPieChartColor;
        var newData = JSON.parse(response.apiData.pollutant);
        var newbarchartData = [{
          label: "index1",
          y: 0,
          color: "#4169E1"
        }, {
          label: "index2",
          y: 0,
          color: "#7a96ea"
        }, {
          label: "index3",
          y: 0,
          color: "#b3c3f3"
        }, {
          label: "index4",
          y: 0,
          color: "#d9e1f9"
        }, {
          label: "index5",
          y: 0,
          color: "#FFFF66"
        }, {
          label: "index6",
          y: 0,
          color: "#FFCC00"
        }, {
          label: "index7",
          y: 0,
          color: "#FF9800"
        }, {
          label: "index8",
          y: 0,
          color: "#FF0000"
        }, {
          label: "index9",
          y: 0,
          color: "#bf0000"
        }, {
          label: "index10",
          y: 0,
          color: "#800000"
        }];
        newData[poll].forEach(function (point) {
          pointsAndCharts(newbarchartData, point);
          newSum += parseInt(point.value);
          newPieCounter++;
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
        newSum /= newPieCounter;
        newSum = Math.round(newSum * 100) / 100;
        if (newSum <= 10) newPieChartColor = barchartData[0].color;else if (newSum <= 20) newPieChartColor = barchartData[1].color;else if (newSum <= 30) newPieChartColor = barchartData[2].color;else if (newSum <= 40) newPieChartColor = barchartData[3].color;else if (newSum <= 50) newPieChartColor = barchartData[4].color;else if (newSum <= 70) newPieChartColor = barchartData[5].color;else if (newSum <= 100) newPieChartColor = barchartData[6].color;else if (newSum <= 150) newPieChartColor = barchartData[7].color;else if (newSum <= 200) newPieChartColor = barchartData[8].color;else if (newSum > 200) newPieChartColor = barchartData[9].color;
        $("#sum").text(newSum);
        $("#pieContainer").css({
          "border-radius": "50%",
          "background-color": newPieChartColor
        });
      }
    });
  });
}); // Favorites

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
      if ($.isEmptyObject(response.error)) {
        last = response.last;
        L.marker([last.coordinates_x, last.coordinates_y]).addTo(map);
        $("#favoriteForm")[0].reset();
        $("<div><strong>Name of place :</strong> ".concat(last.name, "<br>\n            <strong>Category: </strong> ").concat(last.category, "<br>")).appendTo("#all-favorites");
      } else {
        printErrorMsg(response.error);
      }
    }
  });
}); // ***************** INSERT SEARCH BOX *********************

new L.Control.GPlaceAutocomplete({
  callback: function callback(place) {
    var loc = L.latLng(place.geometry.location.lat(), place.geometry.location.lng());
    map.setView(loc, 14);
  }
}).addTo(map); // ***************** SHOW ADD FAVORITE SECTION *********************

$("#addFavoriteSection").on("click", function (e) {
  $("#favorite-form-container").toggleClass("invisible visible");
});
/******/ })()
;