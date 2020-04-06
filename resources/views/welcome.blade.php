
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>PoKKet Cafe</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <!--=============== css  ===============-->	
        <link type="text/css" rel="stylesheet" href="{{ asset('home/css/reset.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('home/css/plugins.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('home/css/style.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('home/css/color.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="images/favicon.ico">
        <style>
            a {
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif !important;
            }
        </style>
    </head>
    <body>
        <div class="loader"><img src="images/loader.png" alt=""></div> 
        <div id="main">  
            <header>
                <div class="header-inner">
                    <div class="container"> 
                        <div class="nav-social">
                            <ul>
                                <li><a href="#" target="_blank" ><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank" ><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#" target="_blank" ><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#" target="_blank" ><i class="fa fa-tumblr"></i></a></li>
                            </ul>
                        </div>
                        <!--logo-->             
                        <div class="logo-holder">
                            <a href="index.html">
                                <p style="color: white;">PoKKet Cafe</p>
                            </a>
                        </div> 
                        <div class="nav-holder">
                            <nav>
                                <ul>
                                    <li><a href="/">Home</a></li>
                                    <li><a href="#menu">Menu</a></li>  
                                    @guest  
                                        <li><a href="/login">Login</a></li>
                                        <li><a href="/register">Register</a></li>
                                    @else
                                        <li><a href="profile">Profile</a></li>
                                        <li><a href="/cart">Cart</a></li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
            <!--header end-->
            <!--=============== wrapper ===============-->	
            <div id="wrapper">
                <div class="content">
                    <section class="parallax-section header-section">
                        <div class="bg bg-parallax" style="background-image:url( {{asset('home/img/1.jpg')}} )" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);"></div>
                        <div class="overlay"></div>
                        <div class="container">
                            <h2>Pokket Cafe</h2>
                            <h3>Order online is easy</h3>
                        </div>
                    </section>
                    <section>
                    	<div class="triangle-decor"></div>
                        <div class="container" id="menu">
                            <div class="section-title">
                                <h4>Cafe Products</h4>
                            </div> 
                            <ul class="products">
                                @foreach($products as $key=>$product) 
                                    <li class="product-cat-mains">
                                        <a href="product/{{$product['id']}}">
                                            <img src="{{ $product->image }}" alt="" class="respimg" style="width: 200px !important;">
                                        </a>
                                        <h4 class="product-title"><a href="product/{{$product['id']}}">{{ $product->name }}</a></h4>
                                        <ul class="product-cats">
                                            @if($product['type'])
                                                <li><a href="#">Veg</a></li>
                                            @else
                                                <li><a href="#">Non Veg</a></li>
                                            @endif
                                        </ul>
                                        <div class="product-price">
                                            <span>₹ {{ $product->price }}</span>
                                            @if(!$product['cart'])
                                                <a class="text-primary" href="/add-to-cart/{{ $product['id']}}"><i class="mdi mdi-cart-plus"></i> Add To Cart </a>
                                            @else
                                                <a class="text-primary" href="/cart"><i class="mdi mdi-cart"></i> View Cart</a>
                                            @endif
                                        </div>
                                    </li> 
                                @endforeach
                            </ul> 
                        </div>
                    </section>
                </div>
                <!--=============== footer ===============-->
                <footer>
                    <div class="footer-inner">
                        <div class="container">
                            <h3 style="color: white;">PoKKet Cafe</h3>
                            <div class="bold-separator">
                                <span></span>
                            </div>
                            <!--footer contacts links -->
                            <ul class="footer-contacts">
                                <li><a href="#">+7(111)123456789</a></li>
                                <li><a href="#">27th Brooklyn New York, NY 10065</a></li>
                                <li><a href="#">yourmail@domain.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--to top / privacy policy-->
                    <div class="to-top-holder">
                        <div class="container">
                            <p> <span> &#169; Pokket Cafe . </span> All rights reserved.</p>
                            <div class="to-top"><span>Back To Top </span><i class="fa fa-angle-double-up"></i></div>
                        </div>
                    </div>
                </footer>
                <!--footer end --> 
            </div>
            <!-- wrapper end -->
        </div>
        <!-- Main end -->
        <!--=============== google map ===============-->
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>  
        <!--=============== scripts  ===============-->
        <script type="text/javascript" src="{{ asset('home/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('home/js/plugins.js') }}"></script>
        <script type="text/javascript" src="{{ asset('home/js/scripts.js') }}"></script>
    </body>
</html>