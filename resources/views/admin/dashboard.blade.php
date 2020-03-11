@extends('layouts.admin')

@section('content')
@extends('layouts.admin')
@section("css")

<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/cryptocoins/cryptocoins.css') }}">
@endsection
@section("js")
pt>
  <script src="{{ asset('app-assets/vendors/js/charts/raphael-min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/charts/morris.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/charts/jquery.sparkline.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/scripts/cards/card-statistics.js') }}" type="text/javascript"></script>
@endsection

@section('content')
<div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body"> 
        <div class="row">
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info">{{ $count_users }}</h3>
                      <h6>Users</h6>
                    </div>
                    <div>
                      <i class="icon-user info font-large-2 float-right"></i>
                    </div>
                  </div> 
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="warning">{{ $count_products }}</h3>
                      <h6>Products</h6>
                    </div>
                    <div>
                      <i class="ft-codepen warning font-large-2 float-right"></i>
                    </div>
                  </div> 
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="success">{{ $count_reviews }}</h3>
                      <h6>Customer Reviews</h6>
                    </div>
                    <div>
                      <i class="icon-heart success font-large-2 float-right"></i>
                    </div>
                  </div> 
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="danger">{{ $count_order_products }}</h3>
                      <h6>Products Ordered</h6>
                    </div>
                    <div>
                      <i class="ft-align-justify success font-large-2 float-right"></i>
                    </div>
                  </div> 
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="danger">{{ $count_orders }}</h3>
                      <h6>Orders</h6>
                    </div>
                    <div>
                      <i class="ft-shopping-cart danger font-large-2 float-right"></i>
                    </div>
                  </div> 
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="danger">{{ $count_pending }}</h3>
                      <h6>Orderes Pending</h6>
                    </div>
                    <div>
                      <i class="ft-more-horizontal warning font-large-2 float-right"></i>
                    </div>
                  </div> 
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="danger">{{ $count_approved }}</h3>
                      <h6>Orderes Approved</h6>
                    </div>
                    <div>
                      <i class="ft-shopping-cart info font-large-2 float-right"></i>
                    </div>
                  </div> 
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="danger">{{ $count_rejected }}</h3>
                      <h6>Orders Rejected</h6>
                    </div>
                    <div>
                      <i class="ft-slash primary font-large-2 float-right"></i>
                    </div>
                  </div> 
                </div>
              </div>
            </div>
          </div>
        </div>  
@endsection
@endsection