@extends('template')

@section('title', 'New favorite')


@section('content')

<h2>My Favorites</h2>

<div class="myFavoritesPlaces">
</div>

<div class="favoriteForm">
    <form action="" method="get">
        @csrf
        <input type="text" name="name" placeholder="Name of place">
        <select name="category">
            <option value="park">Park</option>
            <option value="city">City</option>
            <option value="running path">Running</option>
        </select>
        <input type="number" name="author_id" placeholder="author_id">

        <button type="submit" name="submitBtn" id="submitBtn">Add</button>
        <!-- <button type="submit" name="clearBtn" id="clearBtn">Clear selected marker</button> -->
    </form>
</div>

@endsection