<nav class="navbar navbar-expand-lg d-flex flex-row-lg-fluid  bg-info p-2 px-5">
    {{-- <span class="logo-nav navbar-brand mb-0 h1 shadow" style="color: white">Lëtz Breathe</span> --}}
    <span>
        <img src="/assets/logo_letzbreathe_whitecyan.svg" width="120px" height="50px" alt="Letz Breathe logo">
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
                <a class="order-sm-1 nav-link p-2" href="{{ url('/dashboard') }}"><svg
                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#2EC4B6"
                        class="bi bi-person-workspace" viewBox="0 0 20 18">
                        <path
                            d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                        <path
                            d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" />
                    </svg>Dashboard</a>
            </li>
        </ul>
    </div>
</nav>

{{-- logout --}}
</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
