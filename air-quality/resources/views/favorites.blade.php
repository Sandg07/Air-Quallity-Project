@extends('template')

@section('title', 'Favorite page')

@section('css')

    {{-- link for the map --}}
    <link href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    @endsection


@section('content')
{{-- BARCHART SECTION --}}
<div class="barchart-section">
    <h2>Barchart section</h2>

    <div id="map"></div>

</div>
<hr>

{{-- FAVORITE + MAP SECTION --}}
<div  class="map-section ">
    <div class="favorite-container d-flex flex-row justify-content-around align-items-center">
        <h2>My Favorites</h2>
        {{-- ERRORS HANDLING --}}
        @if ($message = Session::get('success'))
        <p style="color:green">{{ $message }}</p>
    @endif

    @if ($message = Session::get('error'))
        <p style="color:red">{{ $message }}</p>
    @endif

    {{-- SHOW FAVORITES --}}

    @if (!empty($favorites))
       @foreach ($favorites as $favorite)
        <div>
             <strong>ID: </strong>{{ $favorite->id }}<br>
             <strong>Name of place : </strong>{{ $favorite->name }}<br>
             <strong>Category: </strong>{{ $favorite->category }}<br>
             <strong>Coordinates_x: </strong>{{ $favorite->coordinates_x }}<br>
             <strong>Coordinates_y: </strong>{{ $favorite->coordinates_y }}<br>
             <strong>User_id: </strong>{{ $favorite->user_id }}<br>
                                   
             <a href="{{ route('favorites.delete', [$favorite->id]) }}">Delete</a>
             <hr>
         </div>
            @endforeach
     @else
         <p>No favorites in my DB.</p>
     @endif
    </div>
    {{-- <div class="edit-container">
        @include('edit-favorite');
    </div> --}}
</div>
    
    <br>
    <div class="map-marker-container d-flex flex-row justify-content-center">
        <div class="d-flex flex-column justify-content-center"> 
            <button id="done">Done moving current marker</button>
            <button type="submit" name="clearBtn" id="clearBtn">Clear marker</button>
            <div id="favoriteMap"  style="height: 300px; width= 400px"> </div>
           
        </div>
        <div class="favorite-form-container d-flex flex-column flex-fill justify-content-center align-items-center">
         @include('new-favorite');
    </div>
            </div>
    <div id="test">
        
        
    </form>
</div>



    <!--  Script for Map -->
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    {{-- <script src="/js/generalMap.js"></script> --}}
    <script type="text/javascript">
     var favorites = {!! json_encode($favorites) !!};
    </script>
    <script src="/js/Control.Coordinates.js"></script>
 
    @endsection
