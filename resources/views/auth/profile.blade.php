@extends('layouts.login')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="profile">
                <div class="profile-head">
                    <div class="photo-content">
                        <div class="cover-photo"></div>
                        <div class="profile-photo">
                            <img src="{{ $profile[0]->image }}" class="img-fluid rounded-circle" alt="">
                        </div>
                    </div>
                    <div class="profile-info">
                        <div class="row justify-content-center">
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-xl-3 col-sm-4 border-right-1 prf-col">
                                        <div class="profile-name">
                                            <h5 class="text-dark">{{ Auth::user()->name }}</h5>
                                            <p>Name</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                        <div class="profile-email">
                                            <h5 class="text-dark">{{ Auth::user()->email }}</h5>
                                            <p>Email</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-4 prf-col">
                                        <div class="profile-call">
                                            <h5 class="text-dark">+91  {{ $profile[0]->phoneNumber }}</h5>
                                            <p>Phone No.</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-sm-4 prf-col">
                                        <div class="profile-call">
                                            <a href="/edit-profile" class="text-primary"><i class="mdi mdi-pencil"></i> Edit Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <hr>
    <div class="row">
        @if(count($address) == 0)
        <div class="col-md-12 d-flex justify-content-between">
            <p>No Addres Found for this Account </p>
            <a href="add-address" class="text-primary"><i class="mdi mdi-plus"></i> Add a Address</a>
        </div> 
        @else
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex py-2" style="justify-content: space-between;">
                    <h5>Your Address</h5>
                    <a href="add-address" class="text-primary"><i class="mdi mdi-plus"></i> Add a Address</a>
                </div>
                <hr>
                <div class="row card-body d-flex">
                    @foreach($address as $adr) 
                        <div class="d-flex justify-content-between row">
                            <div class="col-md-9">
                                <span class="text-muted">Address</span>
                                <h6>{{ $adr->address }}</h6>
                                <span class="text-muted">Phone Number</span>
                                <h6>+91 {{ $adr->phoneNumber }}</h6>
                            </div>
                            <div class="col-md-2">
                                <a href="/del-address/{{$adr->id}}" class="text-danger text-right">X Remove Address</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div> 
        </div>
        @endif
    </div>
    <hr>

</div>
@endsection
