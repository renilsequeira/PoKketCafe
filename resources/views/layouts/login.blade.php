<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Excel Bakers') }}</title>

    <!-- Scripts -->
   
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    @yield('css')
</head>
<body>
<div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
    </a>
    <ul class="navbar-nav flex-row d-flex align-items-center shadow p-2" style="justify-content: flex-end;">
        @guest
            <li class="nav-item mr-1">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="mr-2">
                <a class="ml-2" href="/cart"><i class="ft-shopping-cart"></i>Cart</a>
            </li>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                <a href="#">User Dashboard</a>
                <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="sidebar-header">
                <div class="user-pic">
                <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                    alt="User picture">
                </div>
                <div class="user-info">
                    <span class="user-name"> {{ Auth::user()->name }} 
                </span> 
                <span class="user-status">
                    <i class="fa fa-circle"></i>
                    <span>Online</span>
                </span>
                </div>
            </div> 
            <div class="sidebar-menu">
                <ul>
                    <li class="sidebar-dropdown">
                        <a href="/">
                            <i class="fa fa-tachometer-alt"></i>
                            <span>Home</span> 
                        </a> 
                    </li>  
                    <li class="sidebar-dropdown">
                        <a href="/profile">
                            <i class="fa fa-tachometer-alt"></i>
                            <span>Profile</span> 
                        </a> 
                    </li> 
                    <li class="sidebar-dropdown">
                        <a href="/edit-profile">
                            <i class="fa fa-tachometer-alt"></i>
                            <span>Edit Profile</span> 
                        </a> 
                    </li> 
                    <li class="sidebar-dropdown">
                        <a href="/add-address">
                            <i class="fa fa-tachometer-alt"></i>
                            <span>Add Address</span> 
                        </a> 
                    </li> 
                    <li class="sidebar-dropdown">
                        <a href="/orders">
                            <i class="fa fa-tachometer-alt"></i>
                            <span>Your Orders</span> 
                        </a> 
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="/review">
                            <i class="fa fa-tachometer-alt"></i>
                            <span>Add Review</span> 
                        </a> 
                    </li> 
                </ul>
            </div> 
        </div> 
    </nav> 
    <main class="page-content"> 
        @yield('content') 
    </main> 
</div> 
    
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    @yield('js')
</body>
</html>
