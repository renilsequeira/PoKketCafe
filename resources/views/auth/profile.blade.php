@extends('layouts.login')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <img src="{{ asset($profile[0]->image) }}" class="img-fluid">
        </div>
        <div class="col-md-8">
            <h5 class="card-title">Name: <a href="#">{{ Auth::user()->name}}</a> </h5>
            <p class="card-title">Email: <a href="#">{{ Auth::user()->email}}</a> </p>
            <p class="card-title">PhoneNumber: <a href="#">{{ $profile[0]->phoneNumber }}</a> </p> 
        </div>
        <div class="col-md-2">  
            <button class="btn btn-primary"><a href="/edit-profile" class="link">Edit Profile</a></button>
        </div>
    </div>
    <hr>
    <div class="row">
        @if(count($address) == 0)
        <div class="col-md-12">
            <p>No Addres Found for this Account </p>
            <button class="btn btn-primary"><a href="add-address" class="link">Add a Address</a></button>
        </div> 
        @else
        <div class="col-md-12">
            <div class="d-flex py-2" style="justify-content: space-between;">
                <h5>Your Address</h5>
                <button class="btn btn-primary"><a href="add-address" class="link">Add a Address</a></button>
            </div>
            <div class="row">
                @foreach($address as $adr)
                    <div class="col-md-1 pr-0">
                        <input type="radio" name="radio" checked>
                    </div>
                    <div class="col-md-8">
                        <h6>{{ $adr->address }}</h6>
                        <p>{{ $adr->phoneNumber }}</p>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-danger"><a href="/del-address/{{$adr->id}}" class="ft ft-x link">Remove Address</a></button>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
    <hr>

</div>
@endsection
