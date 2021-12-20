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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!--  Script for the SearchBox -->
    <link href="css/leaflet-gplaces-autocomplete.css" rel="stylesheet" />
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGPahFxTIjD23cemDxCcXJTeUmRblqRfs&libraries=places">
    </script>
    <title>MAP</title>
</head>

<body class="bg-light">
    @include('userTopNavbar')

    <div class="container d-flex align-items-end ">
        <div class="max-w-7xl row mx-auto sm:px-6 lg:px-8 ">
            <div class="p-6 align-self-end border-b border-gray-200">
                <h3 class=""> Welcome user!</h3>
            </div>
        </div>
    </div>


    <div class="charts-map-favorite-container container col-12 ">
        <div class="poluttantsbtn-container row p-0 m-4 col-12  flex-fill">
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
        
        <div class="chart-container row p-0 justify-content-around m-0" style="height: 150px">
            <div class="row p-4 m-0 col-8 d-flex rounded shadow bg-white h-100">
                <div class="barchart-title col-12 p-0 text-uppercase text-start">
                    <h5 style="font-size:12px; color: gray" class="m-0 pb-2 ">POLLUNTANT sum </h5>
                </div>
                <div id="chartContainer1" class="justify-content-center p-0 m-0 h-75"></div>
            </div>
            <div id="piechart" 
                class="row p-4 m-0 col-3 d-flex align-items-center rounded shadow bg-white h-100 mb-4 justify-content-center ">
                <div class="barchart-title col-12 p-0 text-uppercase text-start">
                    <h5 style="font-size:12px; color: gray" class="m-0 pb-2 ">POLLUNTANT medium </h5>
                </div>
                <div id="pieContainer" style="border-radius: 50%; height: 80px; width:80px"
                    class="align-items-center d-flex flex-column justify-content-center p-1">
                    <p class="p-0 m-0 text-white-50" id="sum"></p>
                    <p class="p-0 m-0 text-white-50">AQI</p>
                </div>
            </div>

        </div>

        <div id="map-favorite-container" class="map-favorite-container  container p-0 m-0 mt-4 row justify-content-md-around "  >

            <div class="poluttantsbtn-map-scale-container p-0 m-0 justify-content-md-center col-md-7">

                <div class="map-scale-container rounded shadow bg-white mb-4 p-4 m-0 ">
                    <div class="map-title col-12 p-0 text-gray-100 text-uppercase text-start">
                        <h5 style="font-size:12px; color: gray" class="m-0 pb-2 ">POLLUNTANT DISTRIBUTION INDEX MAP</h5>
                    </div>
                    <div class="map-container p-0 m-0 row col-12" id="osm-map"></div>
                    <div class="scale-container p-0 m-0 row col-12" >
                        <div class="p-1 col text-center rounded-start"
                            style="font-size:9px; color: white; background-color: #4169E1">
                            = 25</div>
                        <div class="p-1 col text-center" style="font-size:9px; color: white;background-color: #7a96ea">
                            26 - 45</div>
                        <div class="p-1 col text-center" style="font-size:9px; color: white;background-color: #b3c3f3">
                            46 - 60</div>
                        <div class="p-1 col text-center" style="font-size:9px; color: white;background-color: #d9e1f9">
                            61 - 80</div>
                        <div class="p-1 col text-center" style="font-size:9px; color: white;background-color: #FFFF66">
                            81 - 110</div>
                        <div class="p-1 col text-center" style="font-size:9px; color: white;background-color: #FFCC00">
                            111 - 150</div>
                        <div class="p-1 col text-center" style="font-size:9px; color: white;background-color: #FF9800">
                            151 - 200</div>
                        <div class="p-1 col text-center" style="font-size:9px; color: white;background-color: #FF0000">
                            201 - 270</div>
                        <div class="p-1 col text-center" style="font-size:9px; color: white;background-color: #bf0000">
                            271 - 400</div>
                        <div class="p-1 col text-center rounded-end"
                            style="font-size:9px;  color: white;background-color: #800000">
                            > 400</div>
                    </div>

                </div>
            </div>


            <div class="favorite-container col rounded shadow bg-white mb-4 p-4 pb-0 col-12 col-md-4" style="height: 590px">
                <div class="favorite-title col-12 p-0 text-gray-100 text-uppercase text-start">
                    <h5 style="font-size:12px; color: gray" class="m-0 pb-2 ">Favorite Places</h5>
                </div>
                <div class="show-favorites-container border border-2 rounded h-50 p-0 overflow-auto  m-0 ">
                    {{-- SHOW FAVORITES --}}
                    <div id="all-favorites"
                        class="container mb-4 p-0 bg-white justify-content-center h-100">

                        @if (count($array[0]) >= 1)
                            @foreach ($array[0] as $favorite)
                                <div class="row m-0 align-items-center">
                                    <div class="col col-1 mx-1">
                                        @if ($favorite->category == 'Park')
                                            <i class="bi bi-tree-fill fs-3" style="color: #88bb11"></i>
                                        @elseif ($favorite->category == 'City')
                                            <i class="bi bi-building fs-3" style="color: gray"></i>
                                        @else
                                            <i class="bi bi-bicycle fs-3" style="color: #bf0000"></i>
                                        @endif
                                    </div>
                                    <div class="col ps-1 m-1">
                                        <p class="ms-2 mb-0 p-0" style="font-size:12px"><strong>
                                                {{ $favorite->name }}
                                            </strong>
                                        </p>
                                        <p class="ms-2 mb-0 mt-0 p-0" style="font-size:12px; color: gray">
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
                            <button class="btn btn-primary w-100 mt-2 mb-2 m-0" style="font-size:14px" type="button"
                                name="add-favorite" id="addFavoriteSection">Add a new favorite place</button>
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
                                        <option value="Park">Park</option>
                                        <option value="City">City</option>
                                        <option value="Running place">Running place</option>
                                    </select>
                                    <i class="bi bi-geo-alt-fill col-1 text-secondary w-auto m-2 bs-0 " style="font-size:14px; "></i>
                                    <input type="text" class="text-secondary flex-wrap  w-50 me-2 pe-2"
                                        style="border: 0;  font-size:12px" name="coordinates" id="coordinates">
                                    <input class="btn btn-primary flex-fill col-2 mt-1 p-1 w-auto" style="font-size:14px"
                                        type="submit" name="addFavoriteBtn" id="addFavoriteBtn" value="Save place">
                                    <input type="hidden" name="user_id" placeholder="user_id hidden"><br>

                                </div>

                            </form>
                        </div>
                    </div>

                </div>
                <div class="alert alert-danger print-error-msg p-0 m-0" style="display:none">

                    <ul class="fs-6" ></ul>

                </div>
            </div>
        </div>
    </div>

    <footer class="bg-light">
        <div class="d-flex flex-row justify-content-around align-items-center mt-50">
            <p class="text-info"><i> Copyright Air Quality Project 2021</i></p>
        </div>



    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <!--  Script for the Map -->
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <script>
        var pollutant = {!! json_encode($array[1]) !!}
        var favorites = {!! json_encode($array[0]) !!}
        console.log(favorites)
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
</body>

</html>
