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
            <div class="nav-brand">
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
</div>
@yield("content")
    
    <script src="{{ asset('assets/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.min') }}.js"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/gleek.js') }}"></script>
    <script src="{{ asset('assets/js/styleSwitcher.js') }}"></script>
    @yield('js')
</body>
</html>
