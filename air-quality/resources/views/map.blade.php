<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    {{-- Responsive meta from Bootstrap --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/style.css">
    {{-- end Bootstrap --}}

    {{-- Forecast --}}

    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
        rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> --}}
    {{--  --}}

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!--  Script for the SearchBox -->
    <link href="css/leaflet-gplaces-autocomplete.css" rel="stylesheet" />
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGPahFxTIjD23cemDxCcXJTeUmRblqRfs&libraries=places">
    </script>
    <title>MAP</title>
</head>

<body class="bg-light">
    @include('userTopNavbar')
    <div class="container-lg">
        <div class="row col-12 mx-2">
            <div class="col-12 o-0 ">
                <div class="row">
                    <div class="py-6 mt-4 text-primary">
                        <h3 class=""> Welcome {{ $array[2] }}!</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row col-12 mx-2">
            <div class="info-text col-12 py-6 my-4 text-justify">
                <span>Here you find the Index Dashboard that shows the most probable distribution of the pollutant in question with a spatial resolution of 1 km², which is updated every hour, using   geostatistical interpolation API from <a href="https://data.public.lu/fr/">Luxembourg data platform.</a><br><br>Choose the pollutant to see how many stations per index, the medium of the values and the distribuiton in the map. Don't forget to save your favorite's places. Enjoy!
                </span>
            </div>
            
        </div>
        <div class="row p-0">
            <div class="charts-map-favorite-container col-12 p-0 container">
                <div class="poluttantsbtn-container row p-0 m-4 justify-content-center">
                    <div class="row p-4 m-0 col-12 d-flex rounded shadow bg-white h-100">
                    <div class="barchart-title col-12 p-0 text-uppercase text-start">
                        <h5 style="font-size:12px; color: gray" class="m-0 pb-2 ">Choose the pollutant :</h5>
                    </div>
                    <form class="p-0" method="POST">
                        @csrf
                        <div class="btn-group btn-group-toggle p-0 m-0 col-12" data-toggle="buttons">
                            <button class="btn btn-secondary active" type="button" name="poll" id="pm10">PM10</button>
                            <button class="btn btn-secondary " type="button" name="poll" id="no2">NO2</button>
                            <button class="btn btn-secondary" type="button" name="poll" id="o3"> O3 </button>
                            <button class="btn btn-secondary " type="button" name="poll" id="pm25"> PM2.5 </button>
                        </div>
                    </form>
                </div>
                </div>

                <div class="chart-container row p-0 col-12 flex-fill justify-content-around m-0" style="height: 200px">
                    <div class="row p-4 m-0 col-8 d-flex rounded shadow bg-white h-100">
                        <div class="barchart-title col-12 p-0 justify-content-start text-uppercase text-start">
                            <h5 style="font-size:12px; color: gray" class="m-0 pb-2 ">stations / index</h5>
                        </div>
                        <div id="chartContainer1" class="justify-content-center flex-nowrap p-0 m-0 h-75"></div>
                       {{--  <div class="scale-container p-0 m-0 row col-12">
                            <div class="p-1 ps-2 ms-2 col text-center "
                                style="font-size:8px; color: white; height: 20px; width: 10%;background-color: #4169E1">
                                >= 25</div>
                            <div class="p-1 ms-1 col text-center"
                                style="font-size:8px; color: white;background-color: #7a96ea">
                                26 - 45</div>
                            <div class="p-1 ms-1 col text-center"
                                style="font-size:8px; color: white;background-color: #b3c3f3">
                                46 - 60</div>
                            <div class="p-1 ms-1 col text-center"
                                style="font-size:8px; color: white;background-color: #d9e1f9">
                                61 - 80</div>
                            <div class="p-1 ms-1 col text-center"
                                style="font-size:8px; color: white;background-color: #FFFF66">
                                81 - 110</div>
                            <div class="p-1 ms-1 col text-center"
                                style="font-size:8px; color: white;background-color: #FFCC00">
                                111 - 150</div>
                            <div class="p-1 ms-1 col text-center"
                                style="font-size:8px; color: white;background-color: #FF9800">
                                151 - 200</div>
                            <div class="p-1 ms-1 col text-center"
                                style="font-size:8px; color: white;background-color: #FF0000">
                                201 - 270</div>
                            <div class="p-1 ms-1 col text-center"
                                style="font-size:9px; color: white;background-color: #bf0000">
                                271 - 400</div>
                            <div class="p-1 ms-1 col text-center "
                                style="font-size:9px;  color: white;background-color: #800000">
                                > 400</div>
                        </div> --}}
                    </div>
                    <div id="piechart"
                        class="row p-4 m-0 col-3 d-flex align-items-start rounded shadow bg-white h-100 mb-4 justify-content-center ">
                        <div class="barchart-title col-12 p-0 text-uppercase text-start">
                            <h5 style="font-size:12px; color: gray" class="m-0 pb-2 ">medium index</h5>
                        </div>
                        <div id="pieContainer" style="border-radius: 50%; height: 80px; width:80px"
                            class="align-items-center d-flex flex-column justify-content-center p-1">
                            <p class="p-0 m-0 text-white-50" id="sum"></p>
                            <p class="p-0 m-0 text-white-50">AQI</p>
                        </div>
                    </div>

                </div>

                <div id="map-favorite-container"
                    class="map-favorite-container  p-0 row col-12 m-0 mt-4  justify-content-md-around flex-fill ">

                    <div class="poluttantsbtn-map-scale-container p-0 m-0 justify-content-md-center col-md-7">

                        <div class="map-scale-container rounded shadow bg-white mb-4 p-4 m-0 ">
                            <div class="map-title col-12 p-0 text-gray-100 text-uppercase text-start">
                                <h5 style="font-size:12px; color: gray" class="m-0 pb-2 ">stations  
                                    INDEX DISTRIBUTION
                                    MAP
                                </h5>
                            </div>
                            <div class="map-container p-0 m-0 row col-12" id="osm-map"></div>
                            <div class="scale-container p-0 m-0 row col-12">
                                <div class="p-1 col text-center rounded-start"
                                    style="font-size:9px; color: white; background-color: #4169E1">
                                    = 25</div>
                                <div class="p-1 col text-center"
                                    style="font-size:9px; color: white;background-color: #7a96ea">
                                    26 - 45</div>
                                <div class="p-1 col text-center"
                                    style="font-size:9px; color: white;background-color: #b3c3f3">
                                    46 - 60</div>
                                <div class="p-1 col text-center"
                                    style="font-size:9px; color: white;background-color: #d9e1f9">
                                    61 - 80</div>
                                <div class="p-1 col text-center"
                                    style="font-size:9px; color: white;background-color: #FFFF66">
                                    81 - 110</div>
                                <div class="p-1 col text-center"
                                    style="font-size:9px; color: white;background-color: #FFCC00">
                                    111 - 150</div>
                                <div class="p-1 col text-center"
                                    style="font-size:9px; color: white;background-color: #FF9800">
                                    151 - 200</div>
                                <div class="p-1 col text-center"
                                    style="font-size:9px; color: white;background-color: #FF0000">
                                    201 - 270</div>
                                <div class="p-1 col text-center"
                                    style="font-size:9px; color: white;background-color: #bf0000">
                                    271 - 400</div>
                                <div class="p-1 col text-center rounded-end"
                                    style="font-size:9px;  color: white;background-color: #800000">
                                    > 400</div>
                            </div>

                        </div>
                    </div>


                    <div class="favorite-container col rounded shadow bg-white mb-4 p-4 pb-0 col-12 col-md-4"
                        style="height: 590px">
                        <div class="favorite-title col-12 p-0 text-gray-100 text-uppercase text-start">
                            <h5 style="font-size:12px; color: gray" class="m-0 pb-2 ">Favorite Places</h5>
                        </div>
                        <div class="show-favorites-container border border-2 rounded h-50 p-0 overflow-auto  m-0 ">
                            {{-- SHOW FAVORITES --}}
                            <div id="all-favorites" class="container mb-4 p-0 bg-white justify-content-center h-100">

                                @if (count($array[0]) >= 1)
                                    @foreach ($array[0] as $favorite)
                                        <div class="row m-0 align-items-center">
                                            <div class="col col-1 mx-1">
                                                @if ($favorite->category == 'park')
                                                    <i class="bi bi-tree-fill fs-3" style="color: #4FA64F"></i>
                                                @elseif ($favorite->category == 'city')
                                                    <i class="bi bi-building fs-3" style="color: #bf0000"></i>
                                                @else
                                                    <i class="bi bi-bicycle fs-3" style="color: #FFCC00"></i>
                                                @endif
                                            </div>
                                            <div class="col ps-1 m-1">
                                                <p class="ms-2 mb-0 p-0" style="font-size:12px"><strong>
                                                        {{ $favorite->name }}
                                                    </strong>
                                                </p>
                                                <p class="ms-2 mb-0 mt-0 p-0 text-capitalize"
                                                    style="font-size:12px; color: gray">
                                                    {{ $favorite->category }} </p>
                                            </div>
                                            <div class="col col-1 m-2">
                                                <a style="font-size:14px"
                                                    href="{{ route('favorites.delete', [$favorite->id]) }}">
                                                    <div>
                                                        <i class="bi bi-x-circle"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <hr class="m-0">
                                        </div>
                                    @endforeach


                                @else
                                    <p>You don't have favorite places saved yet.</p>
                                @endif
                            </div>
                        </div>




                        <div class="add-favorite-container col col-12 align-items-center p-0 m-0">
                            <div class="add-section-button row m-0 p-0">
                                <div class="col m-0 p-0 w-75">
                                    <button class="btn btn-primary w-100 mt-2 mb-2 m-0" style="font-size:14px"
                                        type="button" name="add-favorite" id="addFavoriteSection">Add a new favorite
                                        place</button>
                                </div>
                            </div>
                            <div class="invisible add-favorite-container d-flex border border-2 rounded p-2 m-0 bg-white justify-content-center"
                                id="favorite-form-container">
                                <div>
                                    <form action="" id="favoriteForm" method="POST">
                                        @csrf
                                        <div class="col w-100 ">
                                            <input type="hidden" name="id">
                                            <input class="w-100 p-1 mb-1" type="text" name="name"
                                                placeholder="Name of your place">
                                            <select class="w-100 p-1 mb-1" name="category">
                                                <option value="">Category</option>
                                                <option value="park">Park</option>
                                                <option value="city">City</option>
                                                <option value="sport place">Sport place</option>
                                            </select>
                                            <i class="bi bi-geo-alt-fill col-1 text-secondary w-auto m-2 bs-0 "
                                                style="font-size:14px; "></i>
                                            <input type="text" class="text-secondary flex-wrap  w-50 me-2 pe-2"
                                                style="border: 0;  font-size:12px" name="coordinates" id="coordinates">
                                            <input class="btn btn-primary flex-fill col-2 mt-1 p-1 w-auto"
                                                style="font-size:14px" type="submit" name="addFavoriteBtn"
                                                id="addFavoriteBtn" value="Save place">
                                            <input type="hidden" name="user_id" placeholder="user_id hidden"><br>

                                        </div>

                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="alert alert-danger print-error-msg p-0 m-0" style="display:none">

                            <ul class="fs-6"></ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- FORECAST --}}
        {{-- @include('forecast') --}}

        {{-- <form method="post">
    @csrf
    <div class="container">
        <input name="date" class="date form-control" type="text">
        <input type="submit" id='submitBtn' value="Submit">
    </div>
</form>
<div id="chartContainer1" style="height: 370px; width: 100%;"></div>
<div id="chartContainer2" style="height: 370px; width: 100%;"></div>
<div id="chartContainer3" style="height: 370px; width: 100%;"></div> --}}

    </div>
    {{-- footer --}}
    <footer class="footer pb-5 pt-0 bg-info mt-0 position-relative">
        <div class="position-relative w-100 z-index-0 top-0 mt-0">
            <svg width="100%" viewBox="0 1 1920 157" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>wave-down</title>
                <g stroke="none" stroke-width="0" fill="none" fill-rule="evenodd">
                    <g fill="#e9ecef" fill-rule="nonzero">
                        <g id="wave-down">
                            <path
                                d="M0,60.8320331 C299.333333,115.127115 618.333333,111.165365 959,47.8320321 C1299.66667,-15.5013009 1620.66667,-15.2062179 1920,47.8320331 L1920,156.389409 L0,156.389409 L0,60.8320331 Z"
                                id="Path-Copy-2"
                                transform="translate(960.000000, 78.416017) rotate(180.000000) translate(-960.000000, -78.416017) ">
                            </path>
                        </g>
                    </g>
                </g>
            </svg>
        </div>
        <div class="container-lg" style="padding-top: 0px">

        </div>
        <div class="text-center column">
            <div class="ms-auto text-lg-center text-center">
                <ul class="nav flex-row align-items-center mb-2 mt-sm-0 justify-content-center">
                    <li class="nav-item">
                        <a class="order-sm-0 nav-link p-2 text-primary " href="{{ url('/') }}">Home</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="order-sm-0 nav-link p-2 text-primary " href="{{ url('/team') }}">Team</a>
                    </li>
                    </li>
                    <li>
                        <a class="order-sm-2 nav-link p-2 text-primary" href="{{ url('/map') }}">Map</a>
                    </li>
                </ul>
                <p class="mb-0 text-white">
                    &copy; NumericALL final project
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                </p>
            </div>

        </div>
    </footer>
    {{-- </footer> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <!--  Script for the Map -->
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <script>
        var pollutant = {!! json_encode($array[1]) !!}
        var favorites = {!! json_encode($array[0]) !!}
        var user = {!! json_encode($array[2]) !!}
        console.log(user)
    </script>
    <script type="text/javascript" src="/js/leaflet-gplaces-autocomplete.js"></script>
    <script type="text/javascript" src="/js/map.js"></script>



    <script>
        var map = L.map('map').setView([51.505, -0.09], 13);
        var tiles = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        });
        map.addLayer(tiles);
    </script>




    <!--  AJAX call -->

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

                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
    {{-- Bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    {{-- FORECAST --}}


    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>



</body>

</html>
