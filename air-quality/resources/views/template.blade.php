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
    <div class="container-fluid">
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
    </div>



    <div class="content">
        @yield('content')
    </div>




    {{-- <footer class="d-flex flex-row justify-content-around align-items-center">
       Copyright Air Quality Project 2021
    </footer> --}}
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
