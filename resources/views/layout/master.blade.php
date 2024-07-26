<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WOODCRAFT | Toko Kerajinan Kayu</title>
    <!-- style-->
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
    <!--ikon-->
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://kit.fontawesome.com/4a3b1f73a2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <!--font-->
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
</head>

<body>
    @include('kerangka.navbar')

    <section id="slider">
        @yield('slider')
    </section>

    <section id="about">
        @yield('about')
    </section>

    <section id="produk">
        @yield('produk')
    </section>

    <section id="kontak">
        @yield('kontak')
    </section>

    <section id="register">
        @yield('register')
    </section>

    <section id="login">
        @yield('login')
    </section>

    <section id="detailProduk">
        @yield('detailProduk')
    </section>

    <section id="user-information">
        @yield('user-information')
    </section>

    <section id="cart">
        @yield('cart')
    </section>

    <section id="search">
        @yield('search')
    </section>

    <section id="checkout">
        @yield('checkout')
    </section>

    @include('kerangka.footer')

    <!-- feather ikon -->
    <script>
        feather.replace();
    </script>
    <!-- script -->
    <script src="{{ asset('js/slider.js') }}"></script>
    <script src="{{ asset('js/cart.js') }}"></script>
    <script>
        feather.replace();
        // Toggle menu script
        document.addEventListener('DOMContentLoaded', function() {
            var menuToggle = document.querySelector('.menu-toggle');
            var navbarNav = document.getElementById('navbar-nav');
            menuToggle.addEventListener('click', function() {
                navbarNav.classList.toggle('show');
            });
        });
    </script>
    @yield('scripts')
</body>

</html>
