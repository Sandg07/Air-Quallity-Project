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

    <div id="osm-map"></div>

    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <script type="text/javascript">
        var pm10 = JSON.parse({!! json_encode($array['pm10']) !!});
        var pm25 = JSON.parse({!! json_encode($array['pm25']) !!});
        var o3 = JSON.parse({!! json_encode($array['o3']) !!});
        var no2 = JSON.parse({!! json_encode($array['no2']) !!});
    </script>
    <script type="text/javascript" src="/js/map.js"></script>
</body>

</html>
