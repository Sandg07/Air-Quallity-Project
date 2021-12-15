<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        value: value
                    },

                    success: function() {
                        var pollutant = JSON.parse({!! json_encode($array['pollutant']) !!});
                        console.log(pollutant);


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
