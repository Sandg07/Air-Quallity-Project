/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/datepicker.js ***!
  \************************************/
var date;
$(".date").datepicker({
  format: "dd/mm/yyyy "
}).on("changeDate", function (e) {
  date = e.format();
});
$("#submitBtn").on("click", function (e) {
  e.preventDefault();

  var _token = $('meta[name="csrf-token"]').attr("content");

  $.ajax({
    url: "/forecast",
    type: "POST",
    data: {
      date: date,
      _token: _token
    },
    success: function success(response) {
      var myResponseData = [];

      for (var responseLooped in response) {
        console.log(response);

        if (Object.hasOwnProperty.call(response, responseLooped)) {
          var responseStations = response[responseLooped];

          for (var responseStation in responseStations) {
            if (Object.hasOwnProperty.call(responseStations, responseStation)) {
              var newData = responseStations[responseStation];
              myResponseData.push({
                label: responseStation,
                y: newData.polLabel.PM10
              });
            }
          }

          console.log(myResponseData);
          var newChart = new CanvasJS.Chart("chartContainer", {
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
              dataPoints: myResponseData
            }]
          });
          newChart.render();
        }
      }
    }
  });
});
var myData = [];

for (var station in stations) {
  if (Object.hasOwnProperty.call(stations, station)) {
    var element = stations[station];
    myData.push({
      label: station,
      y: element.polLabel.PM10
    });
  }
}

window.onload = function () {
  var chart = new CanvasJS.Chart("chartContainer", {
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
      dataPoints: myData
    }]
  });
  chart.render();
};
/******/ })()
;