@extends('template')

@section('title', 'Homepage Air Quality')

@section('css')
@endsection


@section('content')

    {{-- HEADER --}}
    <header class="my-header container-fluid-lg mb-3">
        <div class="column-fluid me-lg-5 ">
            <div class="d-grid gap-2 d-md-flex flex-column justify-content-md-end align-items-md-end position-relative me-4">
                <h1 class="right-hero hero-h1-title text-info display-5 fw-bold lh-1 mb-3">Air Quality app</h1>
                <p class="lead text-end">All the air quality information you want, in one place</p>
            </div>

            <div class="d-grid d-md-flex justify-content-md-end position-absolute fixed-bottom me-4 me-lg-5 p-4">
                <a class="btn btn-primary btn-lg px-4 me-md-2" href="{{ url('/login') }}">Login</a>
                <a class="btn btn-outline-secondary btn-lg px-4" href="{{ url('/register') }}">Register</a>
                {{-- <button type="button" class="btn btn-outline-secondary btn-lg px-4 ">Register</button> --}}
            </div>
        </div>

    </header>

    {{-- <div style="margin:40px"></div> --}}
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
            <p>What if you could take proactive steps to reduce your personal exposure to air pollution, any time,
                anywhere?!</p>
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

                <p>The concentration of particulate matter (PM) is a key air quality indicator since it is the most common
                    air pollutant that affects short term and long term health. Two sizes of particulate matter are used to
                    analyze air quality; fine particles with a diameter of less than 2.5 µm or PM2.5 and coarse particles
                    with a diameter of less than 10 µm or PM10. PM2.5 particles are more concerning because their small size
                    allows them to travel deeper into the cardiopulmonary system.</p>

                <p>The World Health Organization’s air quality guidelines recommend that the annual mean concentrations of
                    PM2.5 should not exceed 10 µg/m3 and 20 µg/m3 for PM10."</p>
                <a href="https://www.iamat.org/country/luxembourg/risk/air-pollution">Read more</a>
            </div>
        </div>



    </main>


@endsection

{{-- <header class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center gx-5 py-5">
            <div class="col-lg-6">
                <h1 class="hero-h1-title display-5 fw-bold lh-1 mb-3">Air Quality app</h1>
                <p class="lead">I'm baby letterpress DIY leggings occupy copper mug, kogi affogato pabst vaporware
                    selvage forage VHS fixie synth. </p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Login</button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">Register</button>
                </div>
            </div>
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="{{ URL::to('/assets/testheader.svg') }}" class="d-block mx-lg-auto img-fluid" width="700"
                    height="500" loading="lazy" alt="...">
            </div>
        </div>
    </header> --}}
