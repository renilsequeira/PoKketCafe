@extends('layouts.admin') 

@section('content')
<div class="row gap-y">
<div class="row w-100" id="dragdrop">
  <div class="col-md-3 col-sm-12">
      <div class="card">
          <div class="card-body">
              <div class="stat-widget-two">
                  <div class="media">
                      <div class="media-body">
                          <h2 class="mt-0 mb-1 text-info">{{ $count_users }}</h2><span class="">Total Users</span>
                      </div>
                      <img class="ml-3" src="{{ asset('assets/images/icons/1.png') }}" alt="">
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="col-md-3 col-sm-12">
      <div class="card">
          <div class="card-body">
              <div class="stat-widget-two">
                  <div class="media">
                      <div class="media-body">
                          <h2 class="mt-0 mb-1 text-danger">{{ $count_products }}</h2><span class="">Total Products</span>
                      </div>
                      <img class="ml-3" src="{{ asset('assets/images/icons/6.png') }}" alt="">
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="col-md-3 col-sm-12">
      <div class="card">
          <div class="card-body">
              <div class="stat-widget-two">
                  <div class="media">
                      <div class="media-body">
                          <h2 class="mt-0 mb-1 text-warning">{{ $amount }}</h2><span class="">Total Amount</span>
                      </div>
                      <img class="ml-3" src="{{ asset('assets/images/icons/3.png') }}" alt="">
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="col-md-3 col-sm-12">
      <div class="card">
          <div class="card-body">
              <div class="stat-widget-two">
                  <div class="media">
                      <div class="media-body">
                          <h2 class="mt-0 mb-1 text-success">{{ $count_orders }}</h2><span class="">Total Orders</span>
                      </div>
                      <img class="ml-3" src="{{ asset('assets/images/icons/5.png') }}" alt="">
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
  <div class="card transparent-card">
      <div class="card-header pb-0">
          <h4 class="card-title mt-2"> Recent Orders List</h4>
      </div>
      <div class="card-body p-0">
          <div class="table-responsive">
              <table class="table table-padded recent-order-list-table table-responsive-fix-big">
                  <thead>
                      <tr>
                          <th>#No</th>
                          <th>Customer Name</th>
                          <th>Delivery Date &amp; Time</th>
                          <th>Location</th>
                          <th>Amount</th>
                          <th>Status</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($order as $key=>$o)
                      <tr>
                          <td>{{ $key + 1}}</td>
                          <td>
                            <a href="javascript:void()" class="mr-2 bg-primary rounded-circle text-center text-uppercase d-inline-block">{{ substr($o->name,0,2) }}</a> 
                            <span class="text-pale-sky">{{ $o->name }}</span>
                          </td>
                          <td class="text-muted">{{ $o->created_at }}</td>
                          <td><a href="javascript:void()" class="text-primary">{{ substr($o->address,0,30) }}</a></td>
                          <td><span class="text-pale-sky">₹ {{ $o->total }}</span></td>
                          @if($o->status == "approved")
                            <td><span class="label label-xl label-rounded label-success">{{ $o->status }}</span>
                          @elseif($o->status == "cancelled")
                            <td><span class="label label-xl label-rounded label-danger">{{ $o->status }}</span>
                          @else
                            <td><span class="label label-xl label-rounded label-warning">{{ $o->status }}</span>
                          @endif
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div> 
      </div>
  </div>
</div>

</div>
@endsection 