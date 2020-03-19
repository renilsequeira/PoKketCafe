@extends('layouts.login')

@section('content')
<div class="container mt-5"> 
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>Your Orders</h5>
            <a href="/" class="text-primary"><i class="mdi mdi-shopping"></i> Order Now</a>
        </div>
        <hr>
        <div class="card-body">
            @if(count($orders) == 0)
            <p><i class="ft-alert-triangle"></i> No Orders Yet..</p>
            @else
                @foreach($orders as $key=>$order)
                <div class="flex-h w-100 row" style="align-items: center;justify-content: space-between;">
                    <div class="flex-v col-md-10 text-dark">
                        <p>Address : {{ $order->address }}</p>
                        <p>Tel:  +{{ $order->phoneNumber }}</p>
                        <p>Total:  ${{ $order->total }}</p>
                        <p>Order Date: {{ $order->created_at }}</p>
                    </div> 
                    <div class="col-md-2 d-flex flex-column">
                        @if($order->status == 'pending')
                            <div class="badge badge-warning mr-1">Pending</div>
                        @elseif($order->status == 'approved')
                            <div class="badge badge-success mr-1">Approved</div>
                        @else
                            <div class="badge badge-danger mr-1">{{ $order->status }}</div>
                        @endif
                        @if($order->status == 'approved')
                            <a href="/profile/invoice/{{$order->id}}" class="text-primary mt-2">View Details</a>
                        @elseif($order->status == "pending")
                            <a href="/profile/cancel-order/{{$order->id}}" class="text-danger mt-2"><i class="mdi mdi-power"></i> Cancel Order</a>
                        @endif
                    </div>
                </div>
                <hr>
                @endforeach
            @endif 
        </div>
    </div>
</div>
@endsection
