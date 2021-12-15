<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" rel="stylesheet" />
    <title>MAP</title>
</head>

<body>

    <form id="myform" method="post">
        @csrf
        <input type="submit" name="no2" value="NO2">
        <input type="submit" name="o3" value="O3">
        <input type="submit" name="pm10" value="PM10">
        <input type="submit" name="pm25" value="PM25">
    </form>

    <div id="osm-map"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>





    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <script type="text/javascript">
        var pollutant = JSON.parse({!! json_encode($array['pollutant']) !!});
    </script>
    <script type="text/javascript" src="/js/map.js"></script>

    <script>
        $(function() {
            $("#myform").on('submit', function(event) {
                event.preventDefault();
                let value = this.value;

                $.ajax({
                    url: "/map",
                    type: "POST",
                    data: {
                        value: value
                    }

                    success: function(array) {
                        console.log(array);

                        function addPoint(LatLgn, color) {
                            var circle = L.circle(LatLgn, {
                                color: "transparent",
                                fillColor: color,
                                fillOpacity: 0.9,
                                radius: 500,
                            }).addTo(map);
                        }
                        var allpm10 = array.pollutant.pm10.forEach(function(data) {
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




                        if (response) {
                            $("#ajaxform")[0].reset();
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
</body>

</html>
