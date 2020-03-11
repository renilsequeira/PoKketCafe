@extends("layouts.login")

@section("content")
<div class="container">
    @if(count($products) == 0)
        No Products Available
    @endif
    @foreach($products as $product)
        <div class="row"> 
            <div class="col-md-2">
                <img src="{{ asset($product->image) }}" class="img-fluid">
            </div>
            <div class="col-md-3">
                <h6>{{ $product->name }}</h6>
                <p>{{ $product->desc }}</p>
                <p>₹{{ $product->price }}</p>
            </div>
            <div class="col-md-7">
                <form action="/user/review" method="POST"> 
                    @csrf
                    <input type="hidden" name="prdId" value="{{ $product->id }}">
                    <div class="form-group">
                        Rating:
                        <select name="rate">
                            <option>1</option>
                            <option>2</option>
                            <option >3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea class="form-control" name="desc" id="" cols="30" rows="2"></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary btn-sm">
                </form>
            </div>
        </div>
        <hr>
    @endforeach
</div>
@endsection 