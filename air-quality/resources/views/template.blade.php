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

    <div class="content">
        @yield('content')
    </div>


    {{-- footer --}}

    {{-- wave design --}}
    <footer class="footer pb-5 pt-10 bg-light mt-n8 position-relative">
        <div class="position-relative w-100 z-index-1 top-0 mt-n3">
            <svg width="100%" viewBox="0 1 1920 157" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>wave-down</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g fill="#fff" fill-rule="nonzero">
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
        {{-- container section --}}
        <div class="container-lg" style="padding-top: 20px">
            <div class="row">
                <div class="col-lg-4">
                    <img src="/assets/logo_letzbreathe_1.svg" class="img-fluid mb-lg-4 mb-3" width="200" height="100"
                        alt="">
                </div>
                <div class="col-lg-8 text-end ">
                    <div class="column flex-wrap text-center">

                        <a href="https://www.linkedin.com/in/catiana-meyer-miranda/" class="text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor"
                                class="bi bi-linkedin" viewBox="0 0 20 16">
                                <path
                                    d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                            </svg>
                        </a>
                        <span class="me-4">Catiana Meyer Miranda</span>

                        <a href="https://www.linkedin.com/in/paullallemand/" class="text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-linkedin" viewBox="0 0 20 16">
                                <path
                                    d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                            </svg>
                        </a>
                        <span class="me-4">Paul Lallemand</span>

                        <a href="https://www.linkedin.com/in/sandrine-gardini-viger/" class="text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-linkedin" viewBox="0 0 20 16">
                                <path
                                    d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                            </svg>
                        </a>
                        <span>Sandrine Gardini-Viger</span>
                    </div>
                    <hr class="horizontal dark col-lg-6 mt-5">
                </div>

            </div>
        </div>
        <div class="text-center column">
            <div class="ms-auto text-lg-center text-center">
                <ul class="nav flex-row align-items-center mb-2 mt-sm-0 justify-content-center">
                    <li class="nav-item">
                        <a class="order-sm-0 nav-link p-2 text-primary " href="{{ url('/') }}">Home</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="order-sm-0 nav-link p-2 text-primary " href="{{ url('/team') }}">Team</a>
                    </li>
                    </li>
                    <li>
                        <a class="order-sm-2 nav-link p-2 text-primary" href="{{ url('/map') }}">Dashboard</a>
                    </li>
                </ul>
                <p class="mb-0">
                    &copy; NumericALL final project
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                </p>
            </div>

        </div>
    </footer>
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
