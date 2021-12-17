

<div class="top-navbar row g-3">
<nav class="navbar justify-content-end bg-dark" >
    <a class="nav-link border rounded  p-2 " style="color:#2ec4b6ff"  href="{{ url('/login') }}">Login</a>
    <a class="nav-link border rounded  p-2" style="color:#2ec4b6ff" href="{{ url('/register') }}">Register</a>
    <a class="nav-link disabled p-2" style="color:#2ec4b6ff" href="{{ url('/dashboard') }}">Dashboard</a>
    <a class="nav-link border rounded  p-2" style="color:#2ec4b6ff" href="{{ url('/favorites') }}">favorites</a>
    <a class="nav-link border rounded  p-2" style="color:#2ec4b6ff" href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
</nav>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
