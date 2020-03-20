@extends('layouts.login')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-1">Edit Address</h3>
            <a href="/profile" class="text-primary"><i class="mdi mdi-eye"></i> View Address</a>
        </div>
        <hr>
        <div class="card-body text-dark">    
            <div class="row">
                <div class="col-md-12"> 
                    <form action="/update-address/{{$data->id}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Enter Address</label>
                            <textarea name="address"
                            class="form-control @error('address') is-invalid @enderror" rows="4">{{ $data->address }}</textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Enter the PhoneNumber</label>
                            <input type="number" name="phoneNumber" value="{{ $data->phoneNumber }}"
                            class="form-control @error('phoneNumber') is-invalid @enderror">
                            @error('phoneNumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update Address</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection