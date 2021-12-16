


<nav class="navbar justify-content-end">
    <a class="nav-link" href="{{ url('/login') }}">Login</a>
    <a class="nav-link" href="{{ url('/register') }}">Register</a>
    <a class="nav-link disabled" href="{{ url('/dashboard') }}">Dashboard</a>
    <a class="nav-link" href="{{ url('/favorites') }}">favorites</a>
    <a class="nav-link" href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
</nav>
<hr>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
