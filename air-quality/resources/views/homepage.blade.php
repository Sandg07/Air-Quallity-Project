@extends('template')

@section('title', 'Homepage Air Quality')

@section('css')
@endsection


@section('content')

    {{-- HEADER --}}
    <header class="my-header container-fluid-lg mb-1">
        <div class="column-fluid me-lg-5">
            <div
                class="d-grid gap-2 d-md-flex flex-column justify-content-md-end align-items-md-end position-relative me-4 ms-4">
                <h1 class="right-hero hero-h1-title text-info display-5 fw-bold lh-1 mb-3">Air Quality app</h1>
                <p class="lead text-end">All the air quality information you want, in one place</p>
                <div class="button-header">
                    <a class="btn btn-primary btn-lg px-4 me-md-2 " href="{{ url('/login') }}">Login</a>
                    <a class="btn btn-outline-secondary btn-lg px-4" href="{{ url('/register') }}">Register</a>
                </div>
            </div>
        </div>

    </header>


    {{-- MAIN CONTENT --}}
    <main class="container-lg flex-column justify-content-around mt-3">

        {{-- MAIN FEATURES --}}
        <br>
        <br>
        <div class="p-6 d-flex flex-column justify-content-center align-items-center" style="padding:20px">
            <p class="text-secondary text-sm m-0">Features</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-dash-lg"
                viewBox="0 0 20 16">
                <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z" />
            </svg>
            <h2>Better plan your day and protect your health</h2>
            <p>What if you could check your personal exposure to air
                pollution?</p>
        </div>
        {{-- shadow rounded container --}}
        <div class="features-homepage-container rounded-lg bg-light shadow" style="margin-bottom:50px">
            <div class="list-features" style="padding:30px">
                @include('features')
            </div>
        </div>


        {{-- FAQ SECTION --}}

        <div class="features-homepage-container rounded-lg" style="margin-bottom:20px">
            <div class="p-2 d-flex flex-column justify-content-center align-items-center" style="padding:20px">
                <p class="text-secondary text-sm m-0">General information</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-dash-lg"
                    viewBox="0 0 20 16">
                    <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z" />
                </svg>
                <h2>About Air Quality</h2>
            </div>
        </div>
        {{-- shadow rounded container --}}
        <div class="features-homepage-container rounded bg-light rounded shadow" style="margin-bottom:50px">
            <div class="list-features bg-success" style="padding:30px">
                <h5> FAQ</h5>

                <p>ABOUT POLLUANTS - TYPES OF POLLUANTS</p>
                <p>Add text here</p>

                <hr class="col-4">

                <h5>Article</h5>
                <p>"Outdoor air pollution is a mix of chemicals, particulate matter, and biological materials that react
                    with each other to form tiny hazardous particles. It contributes to breathing problems, chronic
                    diseases, increased hospitalization, and premature mortality.</p>
                <p class="text-secondary text-sm m-0">About PM10 and PM2.5</p>
                <p>The concentration of particulate matter (PM) is a key air quality indicator since it is the most common
                    air pollutant that affects short term and long term health. Two sizes of particulate matter are used to
                    analyze air quality; fine particles with a diameter of less than 2.5 µm or PM2.5 and coarse particles
                    with a diameter of less than 10 µm or PM10. PM2.5 particles are more concerning because their small size
                    allows them to travel deeper into the cardiopulmonary system.</p>

                <p>The World Health Organization’s air quality guidelines recommend that the annual mean concentrations of
                    PM2.5 should not exceed 10 µg/m3 and 20 µg/m3 for PM10."</p>
                <p class="text-secondary text-sm m-0">About NO2</p>
                <a href="https://www.iamat.org/country/luxembourg/risk/air-pollution">Read more</a>
            </div>
        </div>



    </main>


@endsection
