@extends('template')

@section('title', 'Favorite page')

@section('css')

    {{-- link for the map --}}
    <link href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" rel="stylesheet" />

    <link rel="stylesheet" href="style.css">
    @endsection


@section('content')
<div  class="favorite-section d-flex flex-row justify-content-around align-items-center">
    <div class="favorite-container">
        <h2>My Favorites</h2>

        {{-- ERRORS HANDLING --}}
        @if ($message = Session::get('success'))
        <p style="color:green">{{ $message }}</p>
    @endif

    @if ($message = Session::get('error'))
        <p style="color:red">{{ $message }}</p>
    @endif

    {{-- FORM --}}

         @if (!empty($favorites))
         @foreach ($favorites as $favorite)
            <strong>Name of place : </strong>{{ $favorite->name }}<br>
            <strong>Category: </strong>{{ $favorite->category }}<br>
            <strong>User_id: </strong>{{ $favorite->user_id }}<br>
            <strong>Coordinates_x: </strong>{{ $favorite->coordinates_x }}<br>
            <strong>Coordinates_y: </strong>{{ $favorite->coordinates_y }}<br>
           
            <button type="submit" name="submitBtn" id="submitBtn">Edit</button>
            {{-- <a href="{{ route('favorites.details', [$favorite->id]) }}">Detail page</a><br>
            <a href="{{ route('favorites.edit', [$favorite->id]) }}">Edit</a><br>
            <a href="{{ route('favorites.delete', [$favorite->id]) }}">Delete</a> --}}
            <hr>
            @endforeach
     @else
         <p>No favorites in my DB.</p>
     @endif
    </div>
    <div class="edit-container">
        @include('edit-favorite');
    </div>
</div>
    
    <br>
    <div class="map-form-container d-flex flex-row justify-content-center">
        <div id="test"></div>
        <div id="favoriteMap"></div>
        <div class="favorite-form-container d-flex flex-column flex-fill justify-content-center align-items-center">
         @include('new-favorite');
        </div>
    </div>
    
    <!--  Script for Map -->
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    {{-- <script src="/js/generalMap.js"></script> --}}
    <script src="/js/Control.Coordinates.js"></script>

   

    @endsection
