<!-- navbar.blade.php -->
<nav id="navbar">
    <div id="nama-toko">
        <a href="{{ url('#') }}"><b>DC WOODCRAFT</b></a>
    </div>
    <div id="navbar-nav">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('viewproduk') }}">Product</a>
        <a href="{{ route('kontak') }}">Contact</a>
    </div>
    <!-- search -->
    <div id="search">
        <form action="{{ route('search') }}" method="GET">
            <i class="fas fa-search search"></i>
            <input type="text" id="input" name="query" placeholder="Search your product here" />
        </form>
    </div>
    <!-- Cart dan User Icons -->
    <div class="icons">
        <a href="{{ route('cart.show') }}"><i data-feather="shopping-cart"></i><span class="shopping-cart-badge">0</span></a>
        @auth
        <!-- menampilkan ikon user setelah login-->
            <a href="{{ route('user.show') }}"><i data-feather="user"></i></a> 
        @endauth
    </div>
    <!-- Dropdown -->
    <div class="dropdown">
        @guest
        <!--jika belum login,menampilkan login di dropdown-->
            <button class="dropbtn">Login
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="{{ route('registrationPost') }}">User</a>
                <a href="{{ route('loginAdmin') }}">Admin</a>
            </div>
        @endguest
        @auth
            <button class="dropbtn">{{ Auth::user()->nama }}
                <i class="fa fa-caret-down"></i> 
            </button>
            <div class="dropdown-content">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <!--logout-->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        @endauth
    </div>
</nav>

<!-- memanggil css navbar -->
<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
