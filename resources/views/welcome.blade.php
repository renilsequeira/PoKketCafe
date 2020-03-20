@extends('layouts.app')

@section('content')
<div style="position: relative;">
    <div class="bootstrap-carousel" style="height: calc(100vh - 60px) !important;">
        <div data-ride="carousel" class="carousel slide h-100" id="carouselExampleCaptions">
            <ol class="carousel-indicators">
                <li class="active" data-slide-to="0" data-target="#carouselExampleCaptions"></li>
                <li data-slide-to="1" data-target="#carouselExampleCaptions" class=""></li>
                <li data-slide-to="2" data-target="#carouselExampleCaptions" class=""></li>
            </ol>
            <div class="carousel-inner h-100" >
                <div class="carousel-item active" style="background-color: #333;">
                    <img class="d-block w-100 h-100" src="{{ asset('images/slider/prg4.jpg') }}" alt=""> 
                </div>
                <div class="carousel-item">
                    <img alt="" class="d-block w-100" src="{{ asset('images/slider/prg2.jpg') }}"> 
                </div>
                <div class="carousel-item">
                    <img alt="" class="d-block w-100" src="{{ asset('images/slider/prg5.jpg') }}"> 
                </div>
            </div><a data-slide="prev" style="z-index: 10;" href="#carouselExampleCaptions" class="carousel-control-prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span>
            </a><a data-slide="next" style="z-index: 10;" href="#carouselExampleCaptions" class="carousel-control-next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center flex-column" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); background-color: #333333a6; width: 100%; height: 100%;">
        <h1 class="text-white text-center">Pokket Cafe</h1>
        <p class="text-white text-center" style="font-size: 20px; width: 60%;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa explicabo laborum incidunt consectetur a dolor eligendi et cumque, sint illum!</p>
    </div>
</div>  

<h4 class="text-center py-5">Products</h4>
<div class="pt-5 row container-fluid m-auto d-flex flex-wrap justify-content-between" id="product">
@foreach($products as $key=>$product) 
<div class="col-sm-3">
    <div class="card chartjs-stat-card-1">
        <div class="card-body">
            <h4 class="card-title mb-4 text-dark"><a href="/product/{{$product['id']}}">{{ $product['name'] }}</a></h4>
            <div class="row">
                <div class="col-xl-5 pr-0">
                    <h4 class="mt-0 mb-3 text-warning">₹  {{$product['price'] }}</h4>
                    @if($product['type'])
                        <h6 class="mb-5 text-success">Veg</h6>
                    @else
                        <h6 class="mb-5 text-danger">Non Veg</h6>
                    @endif
                    <p class="mt-4">{{ substr($product['desc'],0,30) }}</p>
                    @if(!$product['cart'])
                        <a class="text-primary" href="/add-to-cart/{{ $product['id']}}"><i class="mdi mdi-cart-plus"></i> Add To Cart </a>
                    @else
                        <a class="text-primary" href="/cart"><i class="mdi mdi-cart"></i> View Cart</a>
                    @endif
                </div>

                <div class="col-xl-7 pl-0">
                    <img src="{{ asset($product['image']) }}" alt="{{ $product['name']}}" width="160">
                </div>
            </div>
        </div>
    </div>
</div> 
@endforeach
</div>
@endsection
