@extends('template')

@section('title', 'Homepage Air Quality')

@section('css')
@endsection


@section('content')

    {{-- <header class="my-header container col-xxl-8 px-4 py-5 "> --}}
    <header class="my-header container">
        <div class=" column ">
            <div class="">
                <div class="d-grid gap-2 d-md-flex flex-column justify-content-md-end" style="position: relative">
                    <h1 class="right-hero hero-h1-title text-info display-5 fw-bold lh-1 mb-3">Air Quality app</h1>
                    <p class="lead text-end">I'm baby letterpress DIY leggings occupy copper mug, kogi affogato pabst
                        vaporware
                        selvage forage VHS fixie synth. </p>
                </div>
                {{-- </div> --}}
                <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="position: relative; bottom:0">
                    <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Login</button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">Register</button>
                </div>
            </div>
        </div>

        {{-- <div class="row flex-lg-row-reverse align-items-center gx-5 py-5"> --}}
        {{-- <div class="row flex-lg-row-reverse justify-content-end gx-5 py-5"> --}}
        {{-- <div class="col-lg-3"> --}}
        {{-- <div> --}}
        {{-- <div class="lead align-items-end col-4"> --}}
        {{-- <div class="col-10 col-sm-8 col-lg-8"> --}}
        {{-- <img src="{{ URL::to('/assets/large_logo_letzbreathe.svg') }}" class="d-block mx-lg-auto img-fluid" --}}
        {{-- width="800" height="700" loading="lazy" alt="..."> --}}
        {{-- </div> --}}
        {{-- <div class="col-lg-4 text-end"> --}}
        {{-- <div class="d-grid gap-2 d-md-flex flex-column justify-content-md-end" style="position: relative">
                <h1 class="lead hero-h1-title text-info display-5 fw-bold lh-1 mb-3">Air Quality app</h1>
                <p class="lead">I'm baby letterpress DIY leggings occupy copper mug, kogi affogato pabst
                    vaporware
                    selvage forage VHS fixie synth. </p>
            </div> --}}
        {{-- </div> --}}
        {{-- <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="position: relative; bottom:0">
                <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Login</button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4">Register</button>
            </div> --}}
        </div>
    </header>
    {{-- {{-- <header class="my-header container col-xxl-8 px-4 py-5 ">
    <header class="my-header container col-xxl-8 px-4 py-5 ">
        {{-- <div class="row flex-lg-row-reverse align-items-center gx-5 py-5"> --}}
    {{-- <div class="row flex-lg-row-reverse align-items-center gx-5 py-5"> --}}
    {{-- <div class="col-lg-3"> --}}
    {{-- <div class="col">
                <h1 class="hero-h1-title display-5 fw-bold lh-1 mb-3">Air Quality app</h1>
                <p class="lead">I'm baby letterpress DIY leggings occupy copper mug, kogi affogato pabst vaporware
                    selvage forage VHS fixie synth. </p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Login</button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">Register</button>
                </div>
            </div>
            <div class="col"> --}}
    {{-- <div class="col-10 col-sm-8 col-lg-8"> --}}
    {{-- <img src="{{ URL::to('/assets/large_logo_letzbreathe.svg') }}" class="d-block mx-lg-auto img-fluid" --}}
    {{-- width="800" height="700" loading="lazy" alt="..."> --}}
    {{-- </div>
        </div>
    </header> --}}


    {{-- MAIN CONTENT --}}
    <main class="container-lg flex-column justify-content-around">

        {{-- MAIN FEATURES --}}
        <br>
        <br>
        <div class="p-6 d-flex flex-column justify-content-center align-items-center" style="padding:20px">
            <p class="text-secondary text-sm m-0">Features</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-dash-lg"
                viewBox="0 0 20 16">
                <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z" />
            </svg>
            <h2>App main features</h2>
            <p>Discover the full features when registering on the app!</p>
        </div>
        {{-- shadow rounded container --}}
        <div class="features-homepage-container rounded-lg bg-light shadow" style="margin-bottom:50px">
            <div class="list-features" style="padding:30px">
                @include('features');
            </div>
        </div>


        {{-- FAQ SECTION --}}

        <div class="features-homepage-container rounded-lg" style="margin-bottom:20px">
            <div class="p-2 d-flex flex-column justify-content-center align-items-center" style="padding:20px">
                <p class="text-secondary text-sm m-0">Questions-Answers</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-dash-lg"
                    viewBox="0 0 20 16">
                    <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z" />
                </svg>
                <h2>Questions about Air Quality</h2>
            </div>
        </div>
        {{-- shadow rounded container --}}
        <div class="features-homepage-container rounded bg-light rounded shadow" style="margin-bottom:50px">
            <div class="list-features bg-success" style="padding:30px">
                FAQ

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis numquam maxime, reiciendis labore
                    pariatur sapiente. Ad incidunt minus odit reprehenderit accusantium. Animi, nostrum sit quos ratione
                    quas suscipit similique odit!</p>
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
