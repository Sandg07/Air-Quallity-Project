

<div class="top-navbar row g-3">
<nav class="navbar justify-content-end bg-info gx-2" >
    <a class="order-sm-0 nav-link p-2 "  href="{{ url('/login') }}">Login</a>
    <a class="order-sm-1 nav-link p-2" href="{{ url('/register') }}">Register</a>  
    <a class="order-sm-2 nav-link disabled p-2" href="{{ url('/dashboard') }}">Dashboard</a>
        <a class="order-sm-3 nav-link border rounded  p-2"  href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
</nav>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
