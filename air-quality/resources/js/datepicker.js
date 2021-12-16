let date;
$(".date")
    .datepicker({
        format: "dd/mm/yyyy ",
    })
    .on("changeDate", function (e) {
        date = e.format();
    });
$("#submitBtn").on("click", function (e) {
    e.preventDefault();
    let _token = $('meta[name="csrf-token"]').attr("content");

    $.ajax({
        url: "/forecast",
        type: "POST",
        data: {
            date: date,
            _token: _token,
        },
        success: function (response) {
            let myResponseDataPM10 = [];
            let myResponseDataNO2 = [];
            let myResponseDataOzone = [];

            for (const responseLooped in response) {
                if (Object.hasOwnProperty.call(response, responseLooped)) {
                    const responseStations = response[responseLooped];
                    for (const responseStation in responseStations) {
                        if (
                            Object.hasOwnProperty.call(
                                responseStations,
                                responseStation
                            )
                        ) {
                            const newData = responseStations[responseStation];

                            myResponseDataPM10.push({
                                label: responseStation,
                                y: newData.polLabel.PM10,
                            });
                            myResponseDataNO2.push({
                                label: responseStation,
                                y: newData.polLabel.NO2,
                            });
                            myResponseDataOzone.push({
                                label: responseStation,
                                y: newData.polLabel.Ozone,
                            });
                        }
                    }

                    var newChartPM10 = new CanvasJS.Chart("chartContainer1", {
                        animationEnabled: true,
                        exportEnabled: true,
                        theme: "light1",
                        title: {
                            text: "PM10",
                        },
                        data: [
                            {
                                type: "column",
                                indexLabel: "{y}",
                                indexLabelFontColor: "#5A5757",
                                indexLabelPlacement: "inside",
                                dataPoints: myResponseDataPM10,
                            },
                        ],
                    });
                    newChartPM10.render();
                    var newChartNO2 = new CanvasJS.Chart("chartContainer2", {
                        animationEnabled: true,
                        exportEnabled: true,
                        theme: "light1",
                        title: {
                            text: "NO2",
                        },
                        data: [
                            {
                                type: "column",
                                indexLabel: "{y}",
                                indexLabelFontColor: "#5A5757",
                                indexLabelPlacement: "inside",
                                dataPoints: myResponseDataNO2,
                            },
                        ],
                    });
                    newChartNO2.render();
                    var newChartOzone = new CanvasJS.Chart("chartContainer3", {
                        animationEnabled: true,
                        exportEnabled: true,
                        theme: "light1",
                        title: {
                            text: "Ozone",
                        },
                        data: [
                            {
                                type: "column",
                                indexLabel: "{y}",
                                indexLabelFontColor: "#5A5757",
                                indexLabelPlacement: "inside",
                                dataPoints: myResponseDataOzone,
                            },
                        ],
                    });
                    newChartOzone.render();
                }
            }
        },
    });
});

let myDataPM10 = [];
let myDataNO2 = [];
let myDataOzone = [];

for (const station in stations) {
    if (Object.hasOwnProperty.call(stations, station)) {
        const element = stations[station];
        myDataPM10.push({ label: station, y: element.polLabel.PM10 });
        myDataNO2.push({ label: station, y: element.polLabel.NO2 });
        myDataOzone.push({ label: station, y: element.polLabel.Ozone });
    }
}

window.onload = function () {
    var chartPM10 = new CanvasJS.Chart("chartContainer1", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light1",
        title: {
            text: "PM10",
        },
        data: [
            {
                type: "column",
                indexLabel: "{y}",
                indexLabelFontColor: "#5A5757",
                indexLabelPlacement: "inside",
                dataPoints: myDataPM10,
            },
        ],
    });
    chartPM10.render();
    var chartNO2 = new CanvasJS.Chart("chartContainer2", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light1",
        title: {
            text: "NO2",
        },
        data: [
            {
                type: "column",
                indexLabel: "{y}",
                indexLabelFontColor: "#5A5757",
                indexLabelPlacement: "inside",
                dataPoints: myDataNO2,
            },
        ],
    });
    chartNO2.render();
    var chartOzone = new CanvasJS.Chart("chartContainer3", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light1",
        title: {
            text: "NO2",
        },
        data: [
            {
                type: "column",
                indexLabel: "{y}",
                indexLabelFontColor: "#5A5757",
                indexLabelPlacement: "inside",
                dataPoints: myDataOzone,
            },
        ],
    });
    chartOzone.render();
};
