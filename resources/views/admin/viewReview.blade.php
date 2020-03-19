@extends('layouts.admin')
@section('css') 
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables/css/jquery.dataTables.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('assets/plugins/datatables/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/plugins-init/datatables.init.js') }}" type="text/javascript"></script>
@endsection
@section('content')
<div class="card"> 
    <div class="card-header">
        <h4>View Review</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="display text-dark" style="min-width: 845px">
                <thead>
                    <tr> 
                        <th>Name</th>
                        <th>Image</th>
                        <th>Rating</th>
                        <th>Description</th>
                        <th>User</th>
                        <th>Action</th>
                    </tr>
                </thead> 
                <tbody>
                    @foreach($products as $key=>$product)
                        <tr> 
                            <td>{{ $product->name }}</td>
                            <td><img src="{{ asset($product->image) }}" style="height: 50px;"/></td>
                            <td>{{ $product->rate }}</td> 
                            <td>{{ $product->desc }}</td>
                            <td>{{ $product->email }}</td>
                            <td><a href="/admin/delete-review/{{$product->id}}">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> 
</div>
@endsection