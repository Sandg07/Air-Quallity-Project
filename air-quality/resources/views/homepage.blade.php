@extends('template')

@section('title', 'Homepage Air Quality')

@section('css')
@endsection


@section('content')

    <header class="my-header container col-xxl-8 px-4 py-5 ">
        <div class="row flex-lg-row-reverse align-items-center gx-5 py-5">
            <div class="col-lg-4">
                <h1 class="hero-h1-title display-5 fw-bold lh-1 mb-3">Air Quality app</h1>
                <p class="lead">I'm baby letterpress DIY leggings occupy copper mug, kogi affogato pabst vaporware
                    selvage forage VHS fixie synth. </p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Login</button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">Register</button>
                </div>
            </div>
            {{-- <div class="col-10 col-sm-8 col-lg-7">
                <img src="{{ URL::to('/assets/testheader.svg') }}" class="d-block mx-lg-auto img-fluid" width="800"
                    height="700" loading="lazy" alt="...">
            </div> --}}
        </div>
    </header>
    <hr>
    <br>
    <br>
    {{-- DIVIDER SECTION --}}
    <div class="b-example-divider"></div>

    {{-- MAIN CONTENT --}}
    <main class="container-fluid ">

        {{-- MAP FEATURE --}}
        <div class="map-homepage-container border rounded bg-light-600">
            <div class="bg-light p-2 d-flex flex-column justify-content-center align-items-center">
                <p>OpenStreetMap</p>
                <h2 class="h2-info">Air Quality in Luxembourg</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam nisi veritatis harum rem obcaecati,
                    sunt
                    corrupti quis impedit autem laboriosam et earum officiis, dolorem eius accusamus assumenda, nihil
                    dolorum
                    iure.</p>
                {{-- <div>@include('searchbox')</div> --}}
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
        </div>


        {{-- MAIN FEATURES --}}
        <br>
        <br>
        <div class="features-homepage-container border rounded bg-light-600">
            <div class="p-2 d-flex flex-column justify-content-center align-items-center">
                <p>Features</p>
                <h2>App main features</h2>
                <div>
                    features
                </div>
            </div>
        </div>
    </main>


@endsection
