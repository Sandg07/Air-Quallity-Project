<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- link for the map --}}
    <link href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" rel="stylesheet" />

    <style>
        .leaflet-control-coordinates {
            background: white;
            border-radius: 4px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.65);
            cursor: pointer;
            padding: 2px 5px;
        }

        .leaflet-control-coordinates.hidden {
            display: none;
        }

        .leaflet-control-coordinates-lng {
            padding-left: 5px;
        }

    </style>
    <title>Document</title>
</head>

<body>

    <h2>My Favorites</h2>

    <div class="favoriteForm">
        <form action="" method="post">
            <input type="text" name="name" placeholder="Name of place">
            <input type="text" name="coordinates" id="coordinates" value="">
            <select name="category">
                <option value="park">Park</option>
                <option value="city">City</option>
                <option value="running path">Running</option>
            </select>
            <button type="submit" name="submitBtn" id="submitBtn"></button>
        </form>
    </div>
    <br>
    <div id="favoriteMap"></div>

    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    {{-- <script src="/js/generalMap.js"></script> --}}
    <script src="/js/Control.Coordinates.js"></script>
</body>

</html>
