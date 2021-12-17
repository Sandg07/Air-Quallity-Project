<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    {{-- Responsive meta from Bootstrap --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css"
        integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    {{-- end Bootstrap --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" rel="stylesheet" />
    <link href="css/placeAutocomplete.css" rel="stylesheet" />
    <title>MAP</title>
</head>

<body>
    <div class="container d-flex flex-row justify-content-around h-100 w-100 ">




        <div class="map-container .flex-column w-100 justify-content-around p-2 mb-2 mt-2 ">
            <div class="btn-group btn-group-toggle w-100 mb-2 mt-2" data-toggle="buttons">
                <label class="btn btn-primary active">
                    <input type="radio" name="options" id="pm10" autocomplete="off" checked> PM10
                </label>
                <label class="btn btn-primary">
                    <input type="radio" name="options" id="no2" autocomplete="off"> NO2
                </label>
                <label class="btn btn-primary">
                    <input type="radio" name="options" id="o3" autocomplete="off"> O3
                </label>
                <label class="btn btn-primary">
                    <input type="radio" name="options" id="pm25" autocomplete="off"> PM25
                </label>
            </div>


            <div class="w-100">
                <div id="osm-map"></div>
                <div class="scale .d-flex p-2 row ">
                    <div class="column flex-fill">
                        <div class="square  m-2 p-2  rounded" style="background-color: #800000;"></div>
                        <span class="p-2" style="font-size:10px"> > 400</span>
                    </div>
                    <div class="column flex-fill">
                        <div class="square  m-2 p-2  rounded" style="background-color: #bf0000;"></div>
                        <span class="p-2" style="font-size:10px"> 271 - 400</span>
                    </div>
                    <div class="column flex-fill">
                        <div class="square  m-2 p-2  rounded" style="background-color: #FF0000;"></div>
                        <span class="p-2" style="font-size:10px"> 201 - 270</span>
                    </div>
                    <div class="column flex-fill">
                        <div class="square  m-2 p-2  rounded" style="background-color: #FF9800;"></div>
                        <span class="p-2" style="font-size:10px"> 151 - 200</span>
                    </div>

                    <div class="column flex-fill">
                        <div class="square  m-2 p-2  rounded" style="background-color: #FFCC00;"></div>
                        <span class="p-2" style="font-size:10px"> 111 - 150</span>
                    </div>
                    <div class="column flex-fill">
                        <div class="square  m-2 p-2  rounded" style="background-color: #FFFF66;"></div>
                        <span class="p-2" style="font-size:10px"> 81 - 110</span>
                    </div>
                    <div class="column flex-fill">
                        <div class="square  m-2 p-2  rounded" style="background-color: #d9e1f9;"></div>
                        <span class="p-2" style="font-size:10px"> 61 - 80</span>
                    </div>
                    <div class="column flex-fill">
                        <div class="square  m-2 p-2  rounded" style="background-color: #b3c3f3;"></div>
                        <span class="p-2" style="font-size:10px"> 46 - 60</span>
                    </div>
                    <div class="column flex-fill">
                        <div class="square  m-2 p-2  rounded" style="background-color: #7a96ea;"></div>
                        <span class="p-2" style="font-size:10px"> 26 - 45</span>
                    </div>
                    <div class="column flex-fill">
                        <div class="square  m-2 p-2  rounded" style="background-color: #4169E1;"></div>
                        <span class="p-2" style="font-size:10px">
                            <= 25</span>
                    </div>

                </div>

            </div>
        </div>


        <div class="favorites-container .flex-column h-100 w-100 justify-content-around p-2 mb-2 mt-2 ">
            <h2>My Favorites</h2>
            {{-- SHOW FAVORITES --}}

            <div id="all-favorites" class="border mb-2 mt-2 " style="background-color: rgb(247, 245, 245)">

                {{-- @if (!empty($favorites))
                    @foreach ($favorites as $favorite)
                    <div>
                        <strong>ID: </strong>{{ $favorite->id }}<br>
                        <strong>Name of place : </strong>{{ $favorite->name }}<br>
                        <strong>Category: </strong>{{ $favorite->category }}<br>
                        <strong>Coordinates_x: </strong>{{ $favorite->coordinates_x }}<br>
                        <strong>Coordinates_y: </strong>{{ $favorite->coordinates_y }}<br>
                        <strong>User_id: </strong>{{ $favorite->user_id }}<br>
                        
                        
                        <hr>
                    </div>
                    @endforeach
                    @else
                    <p>No favorites in my DB.</p>
                    @endif --}}


            </div>
            <div class="favorite-form-container d-flex flex-column flex-fill justify-content-center align-items-center">
                @include('new-favorite')
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

            <div class="d-flex flex-row justify-content-center">
                <input class="btn-secondary rounded w-100 mb-2 mt-2" type="submit" id="done"
                    value="Done moving current marker">
                <input class="btn-secondary rounded w-100 mb-2 mt-2" type="submit" name="clearBtn" id="clearBtn"
                    value="Clear marker">


            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>





    <!--  Script for the Map -->
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>

    <script>
        var pollutant = {!! json_encode($array[1]) !!}

        var favorites = {!! json_encode($array[0]) !!}
        console.log(favorites)
    </script>



    <!--  Script for the SearchBox -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGPahFxTIjD23cemDxCcXJTeUmRblqRfs&libraries=places">
    </script>

    <script type="text/javascript" src="/js/placeAutocomplete.js"></script>
    <script type="text/javascript" src="/js/map.js"></script>

   

    <!--  Script for Favorite -->
    {{-- <script type="text/javascript">
          var favorites = {!! json_encode($favorites) !!};
    </script> --}}
    {{-- <script src="/js/Control.Coordinates.js"></script> --}}



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
