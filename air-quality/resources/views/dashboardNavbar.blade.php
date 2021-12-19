<nav class="navbar navbar-expand-md justify-content-md-between bg-info p-4">

    {{-- logo section --}}
    <span class="logo-nav navbar-brand mb-0 h1" style="color: white">Lëtz Breathe
    </span>

    {{-- navbar button --}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" id="burgerMenu"
                class="bi bi-list text-primary" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg>
        </span>
    </button>
    {{-- dynamic navbar --}}
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="order-sm-0 nav-link p-2 " href="{{ url('/homepage') }}">Login</a>
            </li>
            <li>
                <a class="order-sm-1 nav-link p-2" href="{{ url('/team') }}">Register</a>
            </li>
            <li>
                <a class="order-sm-2 nav-link disabled p-2" href="{{ url('/about') }}">Dashboard</a>
            </li>
            <li> <a class="order-sm-3 nav-link border rounded  p-2" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            </li>
        </ul>

</nav>

</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
