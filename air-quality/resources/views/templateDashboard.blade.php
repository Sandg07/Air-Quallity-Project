<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="en">

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
    <title>template dashboard</title>
</head>

<body>

    @include('dashboardNavbar');

    <div class="content">
        @yield('content')
    </div>




    {{-- <footer class="d-flex flex-row justify-content-around align-items-center">
       Copyright Air Quality Project 2021
    </footer> --}}



    @yield('script')


</body>

</html>
