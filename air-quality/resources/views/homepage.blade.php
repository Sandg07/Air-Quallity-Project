@extends('template')

@section('title', 'Homepage Air Quality')

@section('css')
    {{-- link for the map --}}
    <link href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" rel="stylesheet" />
@endsection


@section('content')

    <header>
        <h1>Air Quality app</h1>
        <h3>Some text about app</h3>
    </header>

    <main>
        <div>
            <h2>Section 2 Title</h2>
            <div>@include('searchbox')
            </div>
        </div>


        <div>
            <h2>Section 3 Features</h2>
            <div>
                features
            </div>
        </div>
    </main>


@endsection
