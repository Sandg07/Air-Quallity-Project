<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    {{-- Responsive meta from Bootstrap --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    
    {{-- link to Bootstrap CSS     --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
           {{-- end Bootstrap --}}
    <link rel="stylesheet" href="global.css" >
@yield('meta')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('css')


    <style>
        .nav-link{
            color: #2ec4b6ff;
        }

        .nav-link:hover {
            color: #fff;
            background-color: #2ec4b6ff;
        }

      </style>
    <title>@yield('title')</title>
</head>

<body>
    @include('topNavbar');
    <div class="container-fluid">
        <nav class="navbar-expand-lg navbar-dark">
            <ul class="nav  nav-tabs justify-content-center ">
                <li class="nav-item rounded"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item rounded"> <a class="nav-link" href="{{ url('/team') }}">Our team</a></li>
                <li class="nav-item rounded"><a class="nav-link disabled" href="{{ url('/about') }}">About FAQ</a></li>
                <li class="nav-item rounded"><a class="nav-link" href="{{ url('/favorites') }}">Favorites</a></li>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @yield('script')

</body>

</html>
