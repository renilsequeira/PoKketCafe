@extends('layouts.app')
 
@section('content')
    <div class="card container mt-5">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="display-4">{{ $product->name}}</h2>
            <a href="/" class="text-primary">Go Back</a>
        </div>
        <hr>
        <div class="row card-body text-dark">
            <div class="col-md-3">
                <img src="{{ asset($product->image) }}" class="img-fluid">
            </div>
            <div class="col-md-9">
                <h5 class="text-dark">{{ $product->desc }}</h5>
                <div class="row">
                    <div class="col-md-6">
                        <p>Price:₹ {{ $product->price}}</p>
                    </div>
                    <div class="col-md-6">
                        @if($product['type'])
                            <h6 class="mb-5 text-success">Veg</h6>
                        @else
                            <h6 class="mb-5 text-danger">Non Veg</h6>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row text-dark">
            @foreach($reviews as $review)
                <div class="col-md-2 p-0 d-flex flex-column" style="align-items: center;">
                    <img src="{{ asset($review->image) }}" style="width: 50px; height: 50px; border-radius: 100px;">
                    <p>{{ $review->name }}</p>
                </div>
                <div class="col-md-4 p-0">
                    <p>{{$review->rate}} <i class="mdi mdi-star"></i></p>
                    <p>{{ $review->desc }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection