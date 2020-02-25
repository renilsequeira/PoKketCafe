@extends('layouts.login')

@section('content')
    <div class="container">
        <h3 class="mb-1">Add Address</h3>
        <div class="row">
            <div class="col-md-8"> 
                <form action="{{ route('addAddress') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Enter Address</label>
                        <textarea name="address" value="{{ old('address') }}"
                        class="form-control @error('address') is-invalid @enderror" rows="4"></textarea>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Enter the PhoneNumber</label>
                        <input type="number" value="phoneNumber" name="phoneNumber" value="{{ old('phoneNumber') }}"
                        class="form-control @error('phoneNumber') is-invalid @enderror">
                        @error('phoneNumber')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Add Address</button>
                </form>
            </div>
        </div>
@endsection