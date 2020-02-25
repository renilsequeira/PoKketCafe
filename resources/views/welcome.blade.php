@extends('layouts.app')

@section('content')
    <div class="pt-1 row container-fluid m-auto">
    @foreach($products as $key=>$product)
        <div class="card" style="width: 18rem;">
            <img class="card-img-top img-fluid" style="height: 140px; width: auto;"src="{{ asset($product['image']) }}" alt="{{ $product['name']}}">
            <div class="card-body">
                <div class="d-flex" style="justify-content: space-between;">
                    <h5 class="card-title">{{ $product['name']}}</h5>
                    <span class="float-left">$ {{ $product['price'] }}</span>
                </div>
                <p class="card-text">{{ $product['desc']}}</p>
                @if(!$product['cart'])
                    <button class="btn btn-primary"><a class="float-right link" href="/add-to-cart/{{ $product['id']}}">Add To Cart <i class="la la-cart-plus"></i></a></button>
                @else
                    <button class="btn btn-primary"><a class="float-right link" href="/cart">View Cart <i class="ft ft-shopping-cart"></i></a></button>
                @endif
            </div>
        </div>
    @endforeach
    </div>
@endsection
