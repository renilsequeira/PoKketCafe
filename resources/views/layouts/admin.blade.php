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
        <div class="nav-header d-flex align-items-center" style="height: 60px !important;">
            <div class="brand-logo">
                <h5 class="text-white ml-5">Admin Dashboard</h5>
            </div>
            <div class="p-0 m-0 nav-control d-flex align-items-center">
                <div class="hamburger">
                    <span class="line"></span>  
                    <span class="line"></span>  
                    <span class="line"></span>
                </div>
            </div>
        </div> 
        <div class="header">    
            <div class="header-content">
                <div class="header-left">
                    <ul>
                        <li class="icons position-relative"><a href="javascript:void(0)"><i class="icon-magnifier f-s-16"></i></a>
                            <div class="drop-down animated bounceInDown">
                                <div class="dropdown-content-body">
                                    <div class="header-search" id="header-search">
                                        <form action="#">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search">
                                                <div class="input-group-append"><span class="input-group-text"><i class="icon-magnifier"></i></span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="header-right">
                    <ul>
                        <li class="icons">
                            <a href="javascript:void(0)">
                                <i class="mdi mdi-comment"></i>
                                <div class="pulse-css"></div>
                            </a>
                            <div class="drop-down animated bounceInDown">
                                <div class="dropdown-content-heading">
                                    <span class="pull-left">Messages</span>  
                                    <a href="javascript:void()" class="pull-right text-white">View All</a>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="pull-left mr-3 avatar-img" src="../../assets/images/avatar/1.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Druid Wensleydale</div>
                                                    <div class="notification-text">A wonderful serenit has take possession</div><small class="notification-timestamp">08 Hours ago</small>
                                                </div>
                                            </a><span class="notify-close"><i class="ti-close"></i></span>
                                        </li> 
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="icons">
                            <a href="javascript:void(0)">
                                <i class="mdi mdi-bell"></i>
                                <div class="pulse-css"></div>
                            </a>
                            <div class="drop-down animated bounceInDown dropdown-notfication">
                                <div class="dropdown-content-body">
                                    <ul>
                                        No Messages Yet   
                                        <li class="text-left"><a href="javascript:void()" class="more-link">Show All Notifications</a>  <span class="pull-right"><i class="fa fa-angle-right"></i></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="icons">
                            <a href="javascript:void(0)" class="log-user">
                                <img src="../../assets/images/avatar/1.jpg" alt=""> <span>Admin</span>  <i class="fa fa-caret-down f-s-14" aria-hidden="true"></i>
                            </a>
                            <div class="drop-down dropdown-profile animated bounceInDown">
                                <div class="dropdown-content-body">
                                    <ul> 
                                        <li>
                                            <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="icon-power"></i> <span>{{ __('Logout') }}</span></a>
                                        </li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div> 
        <div class="nk-sidebar">           
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div class="nk-nav-scroll active" style="overflow: hidden; width: auto; height: 100%;">
                <ul class="metismenu in" id="menu"> 
                    <li class="mega-menu mega-menu-lg">
                        <a class="has-arrow" href="/admin/dashboard" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard"></i><span class="nav-text">Dashboard</span>
                        </a> 
                    </li>
                    <li class="mega-menu mega-menu-lg">
                        <a class="has-arrow" href="/admin/add-product" aria-expanded="false">
                            <i class="mdi mdi-plus"></i><span class="nav-text">Add Product</span>
                        </a> 
                    </li>
                    <li class="mega-menu mega-menu-lg">
                        <a class="has-arrow" href="/admin/view-product" aria-expanded="false">
                            <i class="mdi mdi-teamviewer"></i><span class="nav-text">View Product</span>
                        </a> 
                    </li>
                    <li class="mega-menu mega-menu-lg">
                        <a class="has-arrow" href="/admin/view-orders" aria-expanded="false">
                            <i class="mdi mdi-home-map-marker"></i><span class="nav-text">View Orders</span>
                        </a> 
                    </li>
                    <li class="mega-menu mega-menu-lg">
                        <a class="has-arrow" href="/admin/view-reviews" aria-expanded="false">
                            <i class="mdi mdi-keyboard-variant"></i><span class="nav-text">View Reviews</span>
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
