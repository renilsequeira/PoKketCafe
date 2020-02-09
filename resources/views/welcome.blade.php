@extends('layouts.app')

@section('content')
    <div class="pt-1 row container-fluid m-auto">
    @foreach($products as $key=>$product)
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card" style="">
                <div class="card-content d-flex p-1">
                    <img class="card-img-top img-fluid" style="height: 100px; width: auto;"src="{{ asset($product['image']) }}" alt="{{ $product['name']}}">
                    <div class="card-body" style="padding: 6px;">
                        <h4 class="card-title">{{ $product['name']}}</h4>
                        <p class="card-text">
                            {{ $product['desc']}}
                        </p>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    @if($product['type'])
                        <span class="float-left d-flex align-items-center"><i class="ft-stop-circle text-success" style="margin-right: 5px;"></i> Veg</span>
                    @else
                        <span class="float-left d-flex align-items-center"><i class="ft-stop-circle text-danger" style="margin-right: 5px;"></i> Non Veg</span>
                    @endif
                    <span class="float-right d-flex align-items-center"> {{$product['quantityLeft']}} Remaining <i class="ml-1 la ft-more-horizontal"></i></span>
                </div>
                <div class="card-footer text-muted">
                    <span class="float-left">$ {{ $product['price'] }}</span>
                    @if(!$product['cart'])
                        <a class="float-right" href="/add-to-cart/{{ $product['id']}}">Add To Cart <i class="la la-cart-plus"></i></a>
                    @else
                        <a class="float-right" href="/cart">View Cart <i class="ft ft-shopping-cart"></i></a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection