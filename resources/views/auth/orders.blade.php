@extends('layouts.login')

@section('content')
<div class="container"> 
    @if(count($orders) == 0)
        <p><i class="ft-alert-triangle"></i> No Orders Yet..</p>
    @else
        @foreach($orders as $key=>$order)
        <div class="flex-h w-100" style="align-items: center;justify-content: space-between;">
            <div class="flex-v">
                <p>Address : {{ $order->address }}</p>
                <p>Tel:  +{{ $order->phoneNumber }}</p>
                <p>Total:  ${{ $order->total }}</p>
                <p>Order Date: {{ $order->created_at }}</p>
            </div>
            <div>

            </div>
            <div>
                @if($order->status == 'pending')
                    <div class="badge badge-warning mr-1">Pending</div>
                @elseif($order->status == 'approved')
                    <div class="badge badge-success mr-1">Approved</div>
                @else
                    <div class="badge badge-danger mr-1">{{ $order->status }}</div>
                @endif
                @if($order->status == 'approved')
                    <a href="/profile/invoice/{{$order->id}}" class="disabled">View Details</a>
                @else
                    <a href="/profile/cancel-order/{{$order->id}}">Cancel Order</a>
                @endif
            </div>
        </div>
        <hr>
        @endforeach
    @endif 
</div>
@endsection
