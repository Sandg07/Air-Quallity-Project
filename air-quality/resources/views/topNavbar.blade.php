<nav class="navbar navbar-expand-lg d-flex flex-row-lg-fluid  bg-info p-4 px-5">
    {{-- <span class="logo-nav navbar-brand mb-0 h1 shadow" style="color: white">Lëtz Breathe</span> --}}
    <span>
        <img src="/assets/logo_letzbreathe_whitecyan.svg" width="120px" alt="Letz Breathe logo">
    </span>

    {{-- burger menu --}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" id="burgerMenu"
                class="bi bi-list text-primary fw-normal" viewBox="0 0 20 18">
                <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg>
        </span>
    </button>
    {{-- dynamic navbar --}}
    <div class="collapse navbar-collapse justify-content-end px-9" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="order-sm-0 nav-link p-2 " href="{{ url('/') }}">Home
                </a>
            </li>
            <li class="nav-item active">
                <a class="order-sm-0 nav-link p-2 " href="{{ url('/team') }}">Team</a>
            </li>
            <li>
                <a class="order-sm-2 nav-link p-2" href="{{ url('/map') }}">Map</a>
            </li>
            <li class="nav-item active">
                <a class="order-sm-0 nav-link p-2 " href="{{ url('/login') }}">Login</a>
            </li>
            <li>
                <a class="order-sm-1 nav-link p-2" href="{{ url('/register') }}">Register</a>
            </li>
            <li> <a class="order-sm-3 nav-link border rounded p-2" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            </li>
        </ul>
    </div>
    {{-- </div> --}}
</nav>

{{-- logout --}}
</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
