<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    {{-- Responsive meta from Bootstrap --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/style.css">
    {{-- end Bootstrap --}}


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" rel="stylesheet" />
    <!--  Script for the SearchBox -->
    <link href="css/leaflet-gplaces-autocomplete.css" rel="stylesheet" />
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGPahFxTIjD23cemDxCcXJTeUmRblqRfs&libraries=places">
    </script>
    <title>MAP</title>
</head>

<body>
    {{-- CHART SECTION --}}
    <div class="chart-container row justify-content-center align-items-center col-12">
        <div id="chartContainer1" style="height: 500px; width: 50%;"></div>
        <div id="pieContainer" class="flex-column mx-auto d-flex justify-content-center align-items-center"
            style="height: 200px; width: 30%;">
            <p id="sum"></p>
            <p>AQI</p>
        </div>
    </div>
    {{-- MAP SECTION --}}
    <div class="map-favorite-container container col-12 ">
        <div class="row justify-content-md-center">
            <div class="map-container col mb-2 mt-2 ">
                <div class="col">
                    {{-- BUTTONS TO CHANGE POLLUTANT --}}
                    <form method="POST">
                        @csrf
                        <div class="btn-group btn-group-toggle w-100 mb-2 mt-2" data-toggle="buttons">
                            <button class="btn btn-primary active" type="button" name="poll" id="pm10">PM10</button>
                            <button class="btn btn-primary " type="button" name="poll" id="no2">NO2</button>
                            <button class="btn btn-primary" type="button" name="poll" id="o3"> O3 </button>
                            <button class="btn btn-primary " type="button" name="poll" id="pm25"> PM2.5 </button>
                        </div>
                    </form>
                </div>
                {{-- LEGEND FOR MAP --}}
                <div class="col">
                    <div class="container-map" id="osm-map"></div>

                    <div class="row p-2">
                        <div class="col">
                            <div class="square p-2 rounded" style="background-color: #800000;"></div>
                            <span class="p-2 " style="font-size:10px"> > 400</span>
                        </div>
                        <div class="col ">
                            <div class="square  p-2  rounded" style="background-color: #bf0000;"></div>
                            <span class="p-2" style="font-size:10px"> 271 - 400</span>
                        </div>
                        <div class="col ">
                            <div class="square  p-2  rounded" style="background-color: #FF0000;"></div>
                            <span class="p-2" style="font-size:10px"> 201 - 270</span>
                        </div>
                        <div class="col ">
                            <div class="square  p-2  rounded" style="background-color: #FF9800;"></div>
                            <span class="p-2" style="font-size:10px"> 151 - 200</span>
                        </div>

                        <div class="col ">
                            <div class="square  p-2  rounded" style="background-color: #FFCC00;"></div>
                            <span class="p-2" style="font-size:10px"> 111 - 150</span>
                        </div>
                        <div class="col ">
                            <div class="square  p-2  rounded" style="background-color: #FFFF66;"></div>
                            <span class="p-2" style="font-size:10px"> 81 - 110</span>
                        </div>
                        <div class="col ">
                            <div class="square  p-2  rounded" style="background-color: #d9e1f9;"></div>
                            <span class="p-2" style="font-size:10px"> 61 - 80</span>
                        </div>
                        <div class="col ">
                            <div class="square  p-2  rounded" style="background-color: #b3c3f3;"></div>
                            <span class="p-2" style="font-size:10px"> 46 - 60</span>
                        </div>
                        <div class="col ">
                            <div class="square  p-2  rounded" style="background-color: #7a96ea;"></div>
                            <span class="p-2" style="font-size:10px"> 26 - 45</span>
                        </div>
                        <div class="col ">
                            <div class="square  p-2  rounded" style="background-color: #4169E1;"></div>
                            <span class="p-2" style="font-size:10px">
                                <= 25</span>
                        </div>

                    </div>

                </div>
            </div>

            <div class="favorites-container col border flex-row p-2 mb-2 mt-2">
                <h2>My Favorites</h2>
                {{-- SHOW FAVORITES --}}

                <div id="all-favorites" class="border overflow-auto h-50 mb-2 mt-2 "
                    style="background-color: rgb(247, 245, 245)">

                    @if (count($array[0]) >= 1)
                        @foreach ($array[0] as $favorite)
                            <div>
                                <strong>Name of place : </strong>{{ $favorite->name }}<br>
                                <strong>Category: </strong>{{ $favorite->category }}<br>
                                <a href="{{ route('favorites.delete', [$favorite->id]) }}">Delete</a>
                            </div>
                            <hr>
                        @endforeach


                    @else
                        <p>No favorites in my DB.</p>
                    @endif
                </div>
                {{-- FAVORITES FORM SHOW/HIDE BUTTON --}}
                <button class="btn btn-primary" type="button" name="add-favorite" id="addFavoriteSection" value="">Add a
                    favorite place</button>

                <div class="invisible" id="favorite-form-container">

                    {{-- ADD FAVORITES FORM --}}
                    <h4>Add a new favorite place</h4>
                    <div>
                        <form action="" id="favoriteForm" method="POST">
                            @csrf
                            <input type="text" name="name" placeholder="Name of place"> <br>
                            <select name="category">
                                <option value="">Category</option>
                                <option value="park">Park</option>
                                <option value="city">City</option>
                                <option value="running_place">Running place</option>
                            </select><br>
                            <input type="text" name="coordinates" id="coordinates" hidden>
                            <input type="submit" name="addFavoriteBtn" id="addFavoriteBtn" value="Add">
                        </form>
                    </div>
                </div>
                <div class="response">
                    {{-- ERRORS HANDLING --}}
                    @if ($message = Session::get('success'))
                        <p style="color:green">{{ $message }}</p>
                    @endif

                    @if ($message = Session::get('error'))
                        <p style="color:red">{{ $message }}</p>
                    @endif
                </div>
            </div>
        </div>
        {{-- jQuery Script --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        {{-- SCRIPT for CanvasJS --}}
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <!--  Script for the Map -->
        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
        {{-- PHP arrays to script --}}
        <script>
            var pollutant = {!! json_encode($array[1]) !!}
            var favorites = {!! json_encode($array[0]) !!}
        </script>
        {{-- AUTOCOMPLETE SCRIPT --}}
        <script type="text/javascript" src="/js/leaflet-gplaces-autocomplete.js"></script>
        {{-- CUSTOM SCRIPT --}}
        <script type="text/javascript" src="/js/map.js"></script>
        {{-- Bootstrap js --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
</body>

</html>
