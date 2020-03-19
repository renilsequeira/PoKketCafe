<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PoKKet Cafe</title> 
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    @yield('css') 
</head>
<body>

<div id="main-wrapper" class="show"> 
    <div class="header m-0 w-100" >    
        <div class="header-content d-flex justify-content-between w-100 align-items-center">  
            <div class="p-0 m-0 nav-control d-flex align-items-center text-danger">
                <div class="hamburger">
                    <span class="line"></span>  
                    <span class="line"></span>  
                    <span class="line"></span>
                </div>
            </div>
            <div class="brand-logo">
                <h3><a href="/"> PoKKet Cafe</a></h3>
            </div> 
            <div class="header-right">
                <ul>
                    @guest
                        <li class="icons">
                            <a href="/login">
                                Login
                                <i class="mdi mdi-login"></i> 
                            </a> 
                        </li>
                        @if (Route::has('register'))
                            <li class="icons">
                                <a href="/login">
                                    Register
                                    <i class="mdi mdi-login"></i> 
                                </a> 
                            </li>
                        @endif
                    @else
                    <li class="icons">
                        <a href="/cart">
                            Cart
                            <i class="mdi mdi-cart"></i>
                            <div class="pulse-css"></div>
                        </a> 
                    </li> 
                    <li class="icons">
                        <a href="/profile">
                            Profile
                            <i class="mdi mdi-face-profile"></i>
                            <div class="pulse-css"></div>
                        </a> 
                    </li> 
                    <li class="icons">
                        <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                        >
                            Logout
                            <i class="mdi mdi-power"></i> 
                        </a> 

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li> 
                    @endif
                </ul>
            </div> 
        </div>
    </div>  

    <div class="nk-sidebar">           
        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div class="nk-nav-scroll active" style="overflow: hidden; width: auto; height: 100%;">
            <ul class="metismenu in" id="menu"> 
                <li class="mega-menu mega-menu-lg">
                    <a class="has-arrow" href="/" aria-expanded="false">
                        <i class="mdi mdi-home"></i><span class="nav-text">Home</span>
                    </a> 
                </li>
                <li class="mega-menu mega-menu-lg">
                    <a class="has-arrow" href="/profile" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i><span class="nav-text">Profile</span>
                    </a> 
                </li>
                <li class="mega-menu mega-menu-lg">
                    <a class="has-arrow" href="/edit-profile" aria-expanded="false">
                        <i class="mdi mdi-pencil"></i><span class="nav-text">Edit Profile</span>
                    </a> 
                </li>
                <li class="mega-menu mega-menu-lg">
                    <a class="has-arrow" href="/add-address" aria-expanded="false">
                        <i class="mdi mdi-plus"></i><span class="nav-text">Add Address</span>
                    </a> 
                </li>
                <li class="mega-menu mega-menu-lg">
                    <a class="has-arrow" href="/orders" aria-expanded="false">
                        <i class="mdi mdi-shopping"></i><span class="nav-text">Your Orders</span>
                    </a> 
                </li>
                <li class="mega-menu mega-menu-lg">
                    <a class="has-arrow" href="/review" aria-expanded="false">
                        <i class="mdi mdi-keyboard-variant"></i><span class="nav-text">Review Product</span>
                    </a> 
                </li>
            </ul>
        </div><div class="slimScrollBar" style="background: rgb(198, 200, 201); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 54.6253px;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
    </div> 
    <div class="content-body" style="min-height: 633px;">
        <div class="container-fluid">
            @yield("content")
        </div> 
    </div>    
</div>
    
    <script src="{{ asset('assets/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.min') }}.js"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/gleek.js') }}"></script>
    <script src="{{ asset('assets/js/styleSwitcher.js') }}"></script>
    @yield('js')
</body>
</html>
