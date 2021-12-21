// ************ FUNCTIONS *******************
function addPoint(LatLgn, color) {
    let circle = L.circle(LatLgn, {
        color: "transparent",
        fillColor: color,
        fillOpacity: 0.6,
        radius: 500,
    }).addTo(map);
    return circle;
}

function removePoints(pointsArray) {
    pointsArray.forEach((pointsOnMap) => {
        map.removeLayer(pointsOnMap);
    });
}

function pointsAndCharts(chartData, data) {
    chartData[data.index - 1].y++;
    let LatLgn = L.latLng(data.y, data.x);
    let point = addPoint(LatLgn, chartData[data.index - 1].color);
    allPoints.push(point);
}

function printErrorMsg(msg) {
    $(".print-error-msg").find("ul").html("");

    $(".print-error-msg").css("display", "block");

    $.each(msg, function (key, value) {
        $(".print-error-msg")
            .find("ul")
            .append("<li style='font-size:12px'>" + value + "</li>");
    });
}

function nearestCoordinates(data, favorite) {
    let intermediateValueX = 0;
    let intermediateValueY = 0;
    data.forEach((object) => {
        let xCoord = 0;
        let sumX = 0;
        let yCoord = 0;
        let sumY = 0;
        if (intermediateValueX == 0) {
            intermediateValueX = favorite.coordinates_x - object.x;
            if (intermediateValueX < 0) intermediateValueX *= -1;
            intermediateValueY = favorite.coordinates_y - object.y;
            if (intermediateValueY < 0) intermediateValueY *= -1;
            nearestPoint = object;
        }
        sumX = favorite.coordinates_x - object.x;
        sumY = favorite.coordinates_y - object.y;
        if (sumX < 0) sumX *= -1;
        if (sumY < 0) sumY *= -1;
        if (intermediateValueX > sumX) {
            xCoord = object.x;
            intermediateValueX = sumX;
        }
        if (intermediateValueY > sumY) {
            yCoord = object.y;
            intermediateValueY = sumY;
        }
        if (xCoord == object.x && yCoord == object.y) {
            nearestPoint = object;
        }
    });
    return nearestPoint;
}




// ********** VARIABLES DECLARING ***************

let pollButtons = ["pm10", "no2", "o3", "pm25"];

let alldata = JSON.parse(pollutant.pollutant);

let nearestToMyFavorite = [];

let barchartData = [
    { label: "<= 25", y: 0, color: "#4169E1"},
    { label: "26 - 45", y: 0, color: "#7a96ea" },
    { label: "46-60", y: 0, color: "#b3c3f3" },
    { label: "61-80", y: 0, color: "#d9e1f9" },
    { label: "81-110", y: 0, color: "#FFFF66" },
    { label: "111-150", y: 0, color: "#FFCC00" },
    { label: "151-200", y: 0, color: "#FF9800" },
    { label: "201-270", y: 0, color: "#FF0000" },
    { label: "271-400", y: 0, color: "#bf0000" },
    { label: ">400", y: 0, color: "#800000" },

];
let colors = [];
let allPoints = [];
let newPoints = [];
let currentMarker;
let highestNumber = 0;
let highestIndex = 0;
let sum = 0;
let pieCounter = 0;
let z = 0;

favorites.forEach((favorite) => {
    let myPoint = nearestCoordinates(alldata.pm10, favorite);
    nearestToMyFavorite[z] = myPoint;
    z++;
});

// ************* CREATING MAP *********************

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

// ***************** INSERT POINTS *********************

let allpm10 = alldata.pm10.forEach(function (data) {
    pointsAndCharts(barchartData, data);
    sum += parseInt(data.value);
    pieCounter++;
});
sum /= pieCounter;
sum = Math.round(sum * 100) / 100;
let pieChartColor = "";
if (sum <= 25) pieChartColor = barchartData[0].color;
else if (sum <= 45) pieChartColor = barchartData[1].color;
else if (sum <= 60) pieChartColor = barchartData[2].color;
else if (sum <= 80) pieChartColor = barchartData[3].color;
else if (sum <= 110) pieChartColor = barchartData[4].color;
else if (sum <= 150) pieChartColor = barchartData[5].color;
else if (sum <= 200) pieChartColor = barchartData[6].color;
else if (sum <= 270) pieChartColor = barchartData[7].color;
else if (sum <= 400) pieChartColor = barchartData[8].color;
else if (sum > 400) pieChartColor = barchartData[9].color;



// ***************** ADD BARCHART AND PIECHART ******************************

CanvasJS.addColorSet("customColorSet1", [
    "#4169E1",
    "#7a96ea",
    "#b3c3f3",
    "#d9e1f9",
    "#FFFF66",
    "#FFCC00",
    "#FF9800",
    "#FF0000",
    "#bf0000",
    "#800000",
]);

window.onload = function () {
    let chart = new CanvasJS.Chart("chartContainer1", {
        animationEnabled: true,
        exportEnabled: false,
        theme: "light1",
        colorSet: "customColorSet1",
        axisX: {
             labelFormatter: function () {
                return "";
            }, 
            labelFontColor: "gray",
            lineDashType: "dot",
            gridThickness: 0,
            tickLength: 0,
            lineThickness: 0,
           
        },
     
        axisY: {
            labelFormatter: function () {
                return " ";
            },
            gridThickness: 0,
            tickLength: 0,
            lineThickness: 0,
        },
        data: [
            {
                type: "column",
                indexLabel: "{y}",
                indexLabelFontColor: "lightgray",
                indexLabelPlacement: "inside",
                dataPoints: barchartData,
            },
        ],
    });
    chart.render();

    $("#pieContainer").css({
        "border-radius": "50%",
        "background-color": pieChartColor,
    });
    $("#sum").text(sum);
};



// ************* AJAX CALLS ********************

//Points and Charts

pollButtons.forEach((poll) => {
    $(`#${poll}`).on("click", function (e) {
        e.preventDefault();
        let _token = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            url: "/map",
            type: "POST",
            data: {
                poll: poll,
                _token: _token,
            },
            success: function (response) {
                if (allPoints.length > 1) {
                    removePoints(allPoints);
                    allPoints = [];
                } else {
                    removePoints(newPoints);
                    newPoints = [];
                }
                let newSum = 0;
                let newPieCounter = 0;
                let newPieChartColor;
                let newData = JSON.parse(response.apiData.pollutant);
                let newbarchartData = [
                    { label: "index1", y: 0, color: "#4169E1" },
                    { label: "index2", y: 0, color: "#7a96ea" },
                    { label: "index3", y: 0, color: "#b3c3f3" },
                    { label: "index4", y: 0, color: "#d9e1f9" },
                    { label: "index5", y: 0, color: "#FFFF66" },
                    { label: "index6", y: 0, color: "#FFCC00" },
                    { label: "index7", y: 0, color: "#FF9800" },
                    { label: "index8", y: 0, color: "#FF0000" },
                    { label: "index9", y: 0, color: "#bf0000" },
                    { label: "index10", y: 0, color: "#800000" },
                ];
                newData[poll].forEach((point) => {
                    pointsAndCharts(newbarchartData, point);
                    newSum += parseInt(point.value);
                    newPieCounter++;
                });

                let chart1 = new CanvasJS.Chart("chartContainer1", {
                    animationEnabled: true,
                    exportEnabled: false,
                    theme: "light1",
                    colorSet: "customColorSet1",
                    axisX: {
                        labelFormatter: function () {
                            return " ";
                        },
                        lineDashType: "dot",
                        gridThickness: 0,
                        tickLength: 0,
                        lineThickness: 0,
                    },
                    axisY: {
                        labelFormatter: function () {
                            return " ";
                        },
                        gridThickness: 0,
                        tickLength: 0,
                        lineThickness: 0,
                    },
                    data: [
                        {
                            type: "column",
                            indexLabel: "{y}",
                            indexLabelFontColor: "#5A5757",
                            indexLabelPlacement: "inside",
                            dataPoints: newbarchartData,
                        },
                    ],
                });
                chart1.render();

                newSum /= newPieCounter;
                newSum = Math.round(newSum * 100) / 100;
                if (newSum <= 25) newPieChartColor = barchartData[0].color;
                else if (newSum <= 45) newPieChartColor = barchartData[1].color;
                else if (newSum <= 60) newPieChartColor = barchartData[2].color;
                else if (newSum <= 80) newPieChartColor = barchartData[3].color;
                else if (newSum <= 110) newPieChartColor = barchartData[4].color;
                else if (newSum <= 150) newPieChartColor = barchartData[5].color;
                else if (newSum <= 200)
                    newPieChartColor = barchartData[6].color;
                else if (newSum <= 270)
                    newPieChartColor = barchartData[7].color;
                else if (newSum <= 400)
                    newPieChartColor = barchartData[8].color;
                else if (newSum > 400) newPieChartColor = barchartData[9].color;
                $("#sum").text(newSum);
                $("#pieContainer").css({
                    "border-radius": "50%",
                    "background-color": newPieChartColor,
                });
            },
        });
    });
});



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



var parkIcon = L.divIcon({
    html: '<i class="bi bi-tree-fill fs-3" style="color: #249225"></i>',
    className: "myDivIcon",
});

var cityIcon = L.divIcon({
    html: '<i class="bi bi-building fs-3" style="color: #800000"></i>',
    className: "myDivIcon",
});

var runIcon = L.divIcon({
    html: '<i class="bi bi-bicycle fs-3" style="color: #FFCC00"></i>',
    className: "myDivIcon",
});




if (favorites != undefined && favorites.length != 0) {
    favorites.forEach((favorite, favoriteIndex) => {
        if (favorite.category == "park") {
            var icon = parkIcon;
        } else if (favorite.category == "city") {
            var icon = cityIcon;
        } else {
            var icon = runIcon;
        }
        L.marker([favorite.coordinates_y, favorite.coordinates_x], {
            icon: icon,
        }).addTo(map);
        $("<div class='rounded text-center text-white'>")
            .css({
                "background-color":
                    barchartData[nearestToMyFavorite[favoriteIndex].index]
                        .color,

            })
            .text("AQI: " + nearestToMyFavorite[favoriteIndex].value)
            .appendTo("#nearest" + favorite.id);
    });
}


//***************** ADD NEW FAVORITE *********************

$("#addFavoriteBtn").on("click", function (e) {
    e.preventDefault();

    let newtoken = $('meta[name="csrf-token"]').attr("content");
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
            _token: newtoken,
        },
        success: function (response) {
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
        },
    });
});

// ***************** INSERT SEARCH BOX *********************

new L.Control.GPlaceAutocomplete({
    callback: function (place) {
        var loc = L.latLng(
            place.geometry.location.lat(),
            place.geometry.location.lng()
        );
        map.setView(loc, 14);
    },
}).addTo(map);

// ***************** SHOW ADD FAVORITE SECTION *********************

$("#addFavoriteSection").on("click", function (e) {
    $("#favorite-form-container").toggleClass("invisible visible");
});
