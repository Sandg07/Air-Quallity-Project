@extends('template')

@section('title', 'Dashboard')

@section('css')
@endsection


@section('content')

    

    {{-- DIVIDER SECTION --}}
    <div class="b-example-divider"></div>

    {{-- MAIN CONTENT --}}
    <main class="container-lg flex-column justify-content-around">

               {{-- shadow rounded container --}}
        <div class="features-homepage-container rounded bg-light shadow" style="margin-bottom:50px">
                @include('map');
        </div>


        



        {{-- MAP FEATURE --}}
        {{-- <div class="map-homepage-container border rounded bg-light-600">
            <div class="bg-light p-2 d-flex flex-column justify-content-center align-items-center">
                <p class="text-secondary text-sm">OpenStreetMap</p>
                <h2 class="h2-info">Air Quality in Luxembourg</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam nisi veritatis harum rem obcaecati,
                    sunt
                    corrupti quis impedit autem laboriosam et earum officiis, dolorem eius accusamus assumenda, nihil
                    dolorum
                    iure.</p>
               
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ URL::to('/assets/OpenStreetMap-1.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ URL::to('/assets/raw.jpg') }}" class="d-block w-100" alt="...">
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        </div>
        </div> --}}



    </main>


@endsection
