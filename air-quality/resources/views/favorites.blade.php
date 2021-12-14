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
        <form action="" method="get">
            @csrf
            <input type="text" name="name" placeholder="Name of place">
            <select name="category">
                <option value="park">Park</option>
                <option value="city">City</option>
                <option value="running path">Running</option>
            </select>
            <button type="submit" name="submitBtn" id="submitBtn">Add</button>
        </form>
    </div>
    <br>

    <div id="test"></div>
    <div id="favoriteMap"></div>

    <!--  Script for Map -->
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    {{-- <script src="/js/generalMap.js"></script> --}}
    <script src="/js/Control.Coordinates.js"></script>

    <!-- JQUERY FOR AJAX CALL -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- AJAX call on LIKE icon to add in Favorite page -->
    {{-- <script>
        /* Wait for the page to be loaded/ready */
        $('#favoriteMap').click(function(e) {
            // 'Stop' the form
            e.preventDefault();

            // let e = $(this).attr('coordinates');

            console.log(this.value);
            // Ajax call
            $.ajax({
                    url: "FavoriteModel.php",
                    method: "get",
                    data: {
                        e: this.value,
                    }
                })
                .done(function(result) {
                    // If AJAX call worked
                    $("#coordinates").input(result);
                    // alert('insert in playlist content');
                })
                .fail(function(result) {
                    console.log("AJAX FAILED");
                });
        });
    </script> --}}

</body>

</html>
