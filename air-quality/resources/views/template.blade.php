<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    {{-- Responsive meta from Bootstrap --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    {{-- end Bootstrap --}}

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('css')
    <title>@yield('title')</title>
</head>

<body>
    <nav>
        <ul>
            <li>
                <a href="{{ url('/homepage') }}">Home</a>
            </li>
            <li>
                <a href="{{ url('/about') }}">About FQA</a>
            </li>
            <li>
                <a href="{{ url('/team') }}">Our team</a>
            </li>
            <li>
                <a href="{{ url('/login') }}">Login</a>
            </li>
            <li>
                <a href="{{ url('/register') }}">Register</a>
            </li>
            <li>
                <a href="{{ url('/account') }}">Contact</a>
            </li>
            <li>
                <a href="{{ url('/logout') }}">Log out</a>
            </li>
        </ul>
    </nav>

    <div class="content">
        @yield('content')
    </div>




    <footer>
        Footer
    </footer>

    {{-- Bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
