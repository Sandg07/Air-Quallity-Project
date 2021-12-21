/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************!*\
  !*** ./resources/js/map.js ***!
  \*****************************/
// ************ FUNCTIONS *******************
//adding all the points on the card
function addPoint(LatLgn, color) {
  var circle = L.circle(LatLgn, {
    color: "transparent",
    fillColor: color,
    fillOpacity: 0.6,
    radius: 500
  }).addTo(map);
  return circle;
} //before adding a new layer, remove all the points from the last layer


function removePoints(pointsArray) {
  pointsArray.forEach(function (pointsOnMap) {
    map.removeLayer(pointsOnMap);
  });
} //processing the data for the layer/points and the barchart


function pointsAndCharts(chartData, data) {
  chartData[data.index - 1].y++;
  var LatLgn = L.latLng(data.y, data.x);
  var point = addPoint(LatLgn, chartData[data.index - 1].color);
  allPoints.push(point);
} //error messages for the favorites ajax call


function printErrorMsg(msg) {
  $(".print-error-msg").find("ul").html("");
  $(".print-error-msg").css("display", "block");
  $.each(msg, function (key, value) {
    $(".print-error-msg").find("ul").append("<li style='font-size:12px'>" + value + "</li>");
  });
} // calculating the nearest point to your favorite to show the aqi


function nearestCoordinates(data, favorite) {
  var intermediateValueX = 0;
  var intermediateValueY = 0;
  data.forEach(function (object) {
    var xCoord = 0;
    var sumX = 0;
    var yCoord = 0;
    var sumY = 0; //only for the first object in the loop

    if (intermediateValueX == 0) {
      intermediateValueX = favorite.coordinates_x - object.x;
      if (intermediateValueX < 0) intermediateValueX *= -1;
      intermediateValueY = favorite.coordinates_y - object.y;
      if (intermediateValueY < 0) intermediateValueY *= -1; //if this is the nearest point-> has to be the object

      nearestPoint = object;
    }

    sumX = favorite.coordinates_x - object.x;
    sumY = favorite.coordinates_y - object.y; //can't ever be negatif!!

    if (sumX < 0) sumX *= -1;
    if (sumY < 0) sumY *= -1;

    if (intermediateValueX > sumX) {
      xCoord = object.x;
      intermediateValueX = sumX;
    }

    if (intermediateValueY > sumY) {
      yCoord = object.y;
      intermediateValueY = sumY;
    } //when both of them match the object, which is a point on the map, this is the nearest one


    if (xCoord == object.x && yCoord == object.y) {
      nearestPoint = object;
    }
  });
  return nearestPoint;
} // ********** VARIABLES DECLARING ***************
//diffrent variables needed for functions or to store later on variables


var pollButtons = ["pm10", "no2", "o3", "pm25"];
var alldata = JSON.parse(pollutant.pollutant);
var nearestToMyFavorite = [];
var barchartData = [{
  label: "<= 25",
  y: 0,
  color: "#4169E1"
}, {
  label: "26 - 45",
  y: 0,
  color: "#7a96ea"
}, {
  label: "46-60",
  y: 0,
  color: "#b3c3f3"
}, {
  label: "61-80",
  y: 0,
  color: "#d9e1f9"
}, {
  label: "81-110",
  y: 0,
  color: "#FFFF66"
}, {
  label: "111-150",
  y: 0,
  color: "#FFCC00"
}, {
  label: "151-200",
  y: 0,
  color: "#FF9800"
}, {
  label: "201-270",
  y: 0,
  color: "#FF0000"
}, {
  label: "271-400",
  y: 0,
  color: "#bf0000"
}, {
  label: ">400",
  y: 0,
  color: "#800000"
}];
var colors = [];
var allPoints = [];
var newPoints = [];
var currentMarker;
var sum = 0;
var pieCounter = 0;
var z = 0; //populating the array with the points nearest to my favorite

favorites.forEach(function (favorite) {
  var myPoint = nearestCoordinates(alldata.pm10, favorite);
  nearestToMyFavorite[z] = myPoint;
  z++;
}); // ************* CREATING MAP *********************
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
//default data when opening the page

var allpm10 = alldata.pm10.forEach(function (data) {
  pointsAndCharts(barchartData, data);
  sum += parseInt(data.value);
  pieCounter++;
});
sum /= pieCounter;
sum = Math.round(sum * 100) / 100;
var pieChartColor = "";
if (sum <= 25) pieChartColor = barchartData[0].color;else if (sum <= 45) pieChartColor = barchartData[1].color;else if (sum <= 60) pieChartColor = barchartData[2].color;else if (sum <= 80) pieChartColor = barchartData[3].color;else if (sum <= 110) pieChartColor = barchartData[4].color;else if (sum <= 150) pieChartColor = barchartData[5].color;else if (sum <= 200) pieChartColor = barchartData[6].color;else if (sum <= 270) pieChartColor = barchartData[7].color;else if (sum <= 400) pieChartColor = barchartData[8].color;else if (sum > 400) pieChartColor = barchartData[9].color; // ***************** ADD BARCHART AND PIECHART ******************************

CanvasJS.addColorSet("customColorSet1", ["#4169E1", "#7a96ea", "#b3c3f3", "#d9e1f9", "#FFFF66", "#FFCC00", "#FF9800", "#FF0000", "#bf0000", "#800000"]); //adding default barchart on opening the page

window.onload = function () {
  var chart = new CanvasJS.Chart("chartContainer1", {
    animationEnabled: true,
    exportEnabled: false,
    theme: "light1",
    colorSet: "customColorSet1",
    axisX: {
      labelFormatter: function labelFormatter() {
        return "";
      },
      labelFontColor: "gray",
      lineDashType: "dot",
      gridThickness: 0,
      tickLength: 0,
      lineThickness: 0
    },
    axisY: {
      labelFormatter: function labelFormatter() {
        return " ";
      },
      gridThickness: 0,
      tickLength: 0,
      lineThickness: 0
    },
    data: [{
      type: "column",
      indexLabel: "{y}",
      indexLabelFontColor: "lightgray",
      indexLabelPlacement: "inside",
      dataPoints: barchartData
    }]
  });
  chart.render(); //adding the overall aqi on the page

  $("#pieContainer").css({
    "border-radius": "50%",
    "background-color": pieChartColor
  });
  $("#sum").text(sum);
}; // ************* AJAX CALLS ********************
//Points and Charts changing when clicked on a diffrent polluant (pm10, no2, o3, pm2.5)


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
        var newNearestToMyFavorite = [];
        var newZ = 0;
        favorites.forEach(function (favorite) {
          console.log(newData);
          var myNewPoint = nearestCoordinates(newData[poll], favorite);
          newNearestToMyFavorite[newZ] = myNewPoint;
          newZ++;
        });

        if (favorites != undefined && favorites.length != 0) {
          favorites.forEach(function (favorite, favoriteIndex) {
            $("#favoriteAqiShower").css({
              "background-color": barchartData[newNearestToMyFavorite[favoriteIndex].index].color
            }).text("AQI: " + newNearestToMyFavorite[favoriteIndex].value);
          });
        }

        var chart1 = new CanvasJS.Chart("chartContainer1", {
          animationEnabled: true,
          exportEnabled: false,
          theme: "light1",
          colorSet: "customColorSet1",
          axisX: {
            labelFormatter: function labelFormatter() {
              return " ";
            },
            lineDashType: "dot",
            gridThickness: 0,
            tickLength: 0,
            lineThickness: 0
          },
          axisY: {
            labelFormatter: function labelFormatter() {
              return " ";
            },
            gridThickness: 0,
            tickLength: 0,
            lineThickness: 0
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
        if (newSum <= 25) newPieChartColor = barchartData[0].color;else if (newSum <= 45) newPieChartColor = barchartData[1].color;else if (newSum <= 60) newPieChartColor = barchartData[2].color;else if (newSum <= 80) newPieChartColor = barchartData[3].color;else if (newSum <= 110) newPieChartColor = barchartData[4].color;else if (newSum <= 150) newPieChartColor = barchartData[5].color;else if (newSum <= 200) newPieChartColor = barchartData[6].color;else if (newSum <= 270) newPieChartColor = barchartData[7].color;else if (newSum <= 400) newPieChartColor = barchartData[8].color;else if (newSum > 400) newPieChartColor = barchartData[9].color;
        $("#sum").text(newSum);
        $("#pieContainer").css({
          "border-radius": "50%",
          "background-color": newPieChartColor
        });
      }
    });
  });
}); // ******************* ADDING NEW FAVORITES AND SHOWING FAVORITES FROM DB *******

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
var parkIcon = L.divIcon({
  html: '<i class="bi bi-tree-fill fs-3" style="color: #88bb11"></i>',
  className: "myDivIcon"
});
var cityIcon = L.divIcon({
  html: '<i class="bi bi-building fs-3" style="color: white"></i>',
  className: "myDivIcon"
});
var runIcon = L.divIcon({
  html: '<i class="bi bi-bicycle fs-3" style="color: #bf0000"></i>',
  className: "myDivIcon"
});

if (favorites != undefined && favorites.length != 0) {
  favorites.forEach(function (favorite, favoriteIndex) {
    if (favorite.category == "park") {
      var icon = parkIcon;
    } else if (favorite.category == "city") {
      var icon = cityIcon;
    } else {
      var icon = runIcon;
    }

    L.marker([favorite.coordinates_y, favorite.coordinates_x], {
      icon: icon
    }).addTo(map);
    $("<div id='favoriteAqiShower' class='rounded text-center text-white'>").css({
      "background-color": barchartData[nearestToMyFavorite[favoriteIndex].index].color
    }).text("AQI: " + nearestToMyFavorite[favoriteIndex].value).appendTo("#nearest" + favorite.id);
  });
} //***************** ADD NEW FAVORITE *********************


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
        $("#favoriteForm")[0].reset();
        location.reload();
        /*   $(
            `<div class="row m-0 align-items-center">
        <div class="col col-1 ">` +
                (last.category == "Park"
                    ? `
                <i class="bi bi-tree-fill fs-3" style="color: #88bb11"></i>`
                    : `<i class="bi bi-building fs-3" style="color: gray"></i>`) +
                ` </div>
        <div class="col ps-1 m-1">
            <p class="ms-2 mb-0 p-0" style="font-size:14px"><strong>` +
                last.name +
                `
                </strong>
            </p>
            <p class="ms-2 mb-0 mt-0 p-0" style="font-size:14px; color: gray"> ` +
                last.category +
                ` </p>
        </div>
        <div class="col col-1 m-2">
            
        </div>
        <hr class="m-0">
        </div>`
        ).appendTo("#all-favorites"); */
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
$("#pm10").on("click", function () {
  $(this).addClass("active");
  $("#no2").removeClass("active");
  $("#o3").removeClass("active");
  $("#pm25").removeClass("active");
});
$("#no2").on("click", function () {
  $(this).addClass("active");
  $("#pm10").removeClass("active");
  $("#o3").removeClass("active");
  $("#pm25").removeClass("active");
});
$("#o3").on("click", function () {
  $(this).addClass("active");
  $("#pm10").removeClass("active");
  $("#no2").removeClass("active");
  $("#pm25").removeClass("active");
});
$("#pm25").on("click", function () {
  $(this).addClass("active");
  $("#pm10").removeClass("active");
  $("#no2").removeClass("active");
  $("#o3").removeClass("active");
});
/******/ })()
;