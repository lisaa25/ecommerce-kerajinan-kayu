<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/navbar.css') }}">
    <!--icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="admin-dashboard">
        <div class="sidebar">
            @include('admin.sidebar')
        </div>
        <div class="main-content">
            <div class="navbar">
                <div class="logo">
                    <h1>Admin Dashboard</h1>
                </div>
                <div class="user-info">
                    @if(Auth::guard('admin')->check())
                        <span>Welcome, {{ Auth::guard('admin')->user()->nama }}</span>
                        <a href="#" 
                           onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <span>Please log in</span>
                    @endif
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</body>
</html>
