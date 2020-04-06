@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
@endsection
@section('content')
<div class="card container mt-1">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Something went wrong<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Something went wrong<br>
            <ul>
                <li>{{ Session::get('error') }}</li>
            </ul>
        </div>
    @endif
    <div class="card-header d-flex" style="justify-content: space-between;">
        <h4 class="card-title">Cart Items</h4>
        <a class="card-title" href="/cart/clear-all">Clear Cart</a>
    </div>
    <hr>
    <div class="card-body"> 
            @foreach($products as $product)
                @if($product['cart'])
                    <div class="row d-flex w-100 mx-2 cart">
                        <div class="d-flex flex-h row">
                            <img src="{{ asset($product['image']) }}" width=50 class="cart-image">
                            <div class="flex-v">
                                <h5>{{ $product['name']}}</h5>
                                <p class="list-group-item-text mb-0"> 
                                    @if($product['type'])
                                        <span class="badge badge-success">Veg</span>
                                    @else
                                        <span class="badge badge-danger">non Veg</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="flex-h cart-right row">
                            <div class="flex-h mx-5 qty">
                                <a class="ft-plus br p" href="/cart/increment/{{$product['id']}}">+</a>
                                <span style="padding: 0px 6px;">{{ $product['cartQuantity']}}</span>
                                <a class="ft-minus bl p" href="/cart/decrement/{{$product['id']}}">-</a>
                            </div>
                            <h5 class="m-0 mr-3">₹ {{ $product['cartQuantity'] * $product['price']}}</h5>
                            <a class="hover flex-h" href="/cart/remove/{{ $product['id'] }}"><span style="font-size: 18px;">X</span> </a>
                        </div>
                    </div> 
                    <span class="border-span"></span>
                @endif 
            @endforeach
            <div class="flex-h w-100 p-2" style="justify-content: space-between;">
                <h3>Total</h3>
                <h3>₹ {{ $total }}</h3>
            </div>
            <button type="button" class="btn btn-outline-success mb-1" data-toggle="modal" data-target="#xlarge">
                Proceed to Payment
            </button>
        </div>
        <div class="modal fade text-left" id="xlarge" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel16">Payment Gateway</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> Something went wrong<br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <form method="POST" class="flex-v" action="/payment">
                            @csrf
                            <div class="flex-v text-dark">
                                <label for="">Select An Address</label>
                                <div class="flex-v">
                                    @foreach($address as $adr) 
                                        <div class="flex-h align-items-center"> 
                                            <div>
                                                <input name="address" type="radio" class="filled-in chk-col-primary" value="{{ $adr->id}}" id="md_checkbox_25" checked>
                                                <label for="md_checkbox_25">
                                                    <p class="p-0 m-0">{{ $adr->address }}</p>
                                                    <p>{{ $adr->phoneNumber }}</p>
                                                </label>
                                            </div> 
                                        </div>  
                                        <span class="border-span"></span>
                                    @endforeach
                                </div>
                                <a href="/add-address">Add a Address</a>
                                <div class="mt-1">
                                    @foreach($products as $prd) 
                                        @if($prd['cart'])
                                        <div class="flex-h" style="justify-content: space-between;">
                                            <h6>{{ $prd['name'] }}</h6>
                                            <div class="flex-h">
                                            <span class="text-muted">${{ $prd['price'] }} x</span>
                                                <span class="text-muted">{{ $prd['cartQuantity'] }}  =</span>
                                                <span class="text-muted">${{ $prd['cartQuantity'] * $prd['price']}}</span>
                                            </div>
                                        </div>
                                        <span class="border-span"></span>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="flex-h" style="justify-content: space-between;">
                                    <span>Total</span>
                                    <span>${{ $total }}</span>
                                </div>
                                <button type="submit" class="btn btn-block btn-success">Place Order</button>
                            </div>
                        <form>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection