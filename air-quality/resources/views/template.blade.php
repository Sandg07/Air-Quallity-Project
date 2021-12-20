<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Responsive meta from Bootstrap --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- link to Bootstrap CSS --}}
    <link rel="stylesheet" href="/css/style.css">

    <!-- Custom styles for this template -->
    <link href="/css/global.css" rel="stylesheet">

    @yield('meta')
    @yield('css')


    <title>@yield('title')</title>
</head>

<body>
    @include('topNavbar');
    {{-- <div class="container-fluid">
        <nav class="navbar-expand-lg">
            <ul class="nav nav-pills justify-content-center align-content-center flex-wrap ">
                <li class="order-sm-0 nav-item rounded"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                <li class="order-sm-1 nav-item rounded"> <a class="nav-link" href="{{ url('/team') }}">Our
                        team</a></li>
                <li class="order-sm-2 nav-item rounded"><a class="nav-link disabled" href="{{ url('/about') }}">About
                        FAQ</a></li>
                <li class="nav-item rounded"><a class="nav-link" href="{{ url('/map') }}">Map component</a></li>
            </ul>
        </nav>
    </div> --}}



    <div class="content">
        @yield('content')


    </div>


    {{-- footer --}}

    {{-- <footer class="bg-light">
        <div class="d-flex flex-row justify-content-around align-items-center mt-50">
            <p class="text-info"><i> Copyright Air Quality Project 2021</i></p>
        </div> --}}

    <!-- -------- START FOOTER 5 w/ DARK BACKGROUND ------- -->

    <footer class="footer pb-5 pt-10 bg-light mt-n8 position-relative">
        <div class="position-relative w-100 z-index-1 top-0 mt-n3">
            <svg width="100%" viewBox="0 -2 1920 157" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>wave-down</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g fill="#FFFFFF" fill-rule="nonzero">
                        <g id="wave-down">
                            <path
                                d="M0,60.8320331 C299.333333,115.127115 618.333333,111.165365 959,47.8320321 C1299.66667,-15.5013009 1620.66667,-15.2062179 1920,47.8320331 L1920,156.389409 L0,156.389409 L0,60.8320331 Z"
                                id="Path-Copy-2"
                                transform="translate(960.000000, 78.416017) rotate(180.000000) translate(-960.000000, -78.416017) ">
                            </path>
                        </g>
                    </g>
                </g>
            </svg>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <h6 class="font-weight-bolder mb-lg-4 mb-3">Soft UI Design</h6>
                </div>
                <div class="col-lg-6 text-center">
                    <ul class="nav flex-row align-items-center mb-5 mt-sm-0 justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.creative-tim.com" target="_blank">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.creative-tim.com/presentation" target="_blank">
                                About
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="https://www.creative-tim.com/blog" target="_blank">
                                Blog
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.creative-tim.com" target="_blank">
                                Services
                            </a>
                        </li>
                    </ul>
                    <p class="mb-0">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> Copyright Air Quality Project
                    </p>
                </div>
                <div class="col-lg-3 text-end">

                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            <path fill-rule="evenodd"
                                d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                            <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                        </svg>
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                        {{-- <span class="fab fa-pinterest text-lg"> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-github" viewBox="0 0 16 16">
                            <path
                                d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                        </svg>
                    </a>

                </div>
            </div>
        </div>
    </footer>
    <!-- -------- END FOOTER 5 w/ DARK BACKGROUND ------- -->

    {{-- </footer> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    {{-- Bootstrap Bundle with Popper --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    {{-- Bootstrap script js --}}
    <script src="/js/app.js" type="text/javascript"></script>


    @yield('script')

</body>

</html>
