@extends("layouts.admin")

@section('content')
<div class="container card">
        <div class="card-header">
            <h4 class="modal-title">Edit Product</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('admin.updateProduct') }}" enctype="multipart/form-data"> 
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Product Name</label> 
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product[0]->name }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
                    </div>
                    <div class="form-group col-md-6">
                        <label>Product Price</label> 
                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{  $product[0]->price }}" required autocomplete="price" autofocus>

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-4">
                        @if($product[0]->type)
                            <label style="margin-right: 5px;">Veg</label>
                            <input type="radio" name="type" value="1" class="mr-2" checked>
                            <label style="margin-right: 5px;">Non Veg</label>
                            <input type="radio" name="type" value="0" class="">
                        @else
                            <label style="margin-right: 5px;">Veg</label>
                            <input type="radio" name="type" value="1" class="mr-2" >
                            <label style="margin-right: 5px;">Non Veg</label>
                            <input type="radio" name="type" value="0" class="" checked>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label>Product Image <span class="text-danger">Select image only if you have to change. else leave it empty</span></label> 
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="">

                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
                    </div>  
                    <div class="col-md-8">
                        <label for="">Enter the Description</label>
                        <textarea name="desc" id="" cols="30" rows="10" value="{{ $product[0]->desc }}" class="form-control @error('desc') is-invalid @enderror">{{ $product[0]->desc }}</textarea>

                        @error('desc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
                    </div>
                </div> 
                <input type="hidden" name="id" value="{{ $product[0]->id }}" />
                <hr />
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-primary">Save changes</button>
            </form>
        </div> 
    </div> 
@endsection