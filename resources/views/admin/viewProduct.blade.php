@extends('layouts.admin')
@section('css') 
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables/css/jquery.dataTables.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('assets/plugins/datatables/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/plugins-init/datatables.init.js') }}" type="text/javascript"></script>
@endsection

@section('content')
<div class="card m-1 p-1">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>View Product</h4>
        <a href="/admin/add-product" class="btn btn-primary">Add Product</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="display" style="min-width: 845px">
                <thead>
                    <tr> 
                        <th>Product Image</th>

                        <th>Product Name</th>
                        
                        <th>Price</th>
                        
                        <th>Type</th>

                        <th>Action</th>     
                    </tr>
                </thead> 
                <tbody>
                    @foreach($products as $key=>$product)
                        <tr class="text-dark"> 
                            <td><img src="{{ asset($product['image']) }}" style="height: 50px;"/></td>
                            <td>{{ $product['name'] }}</td> 
                            <td>{{ $product['price'] }}</td> 
                            <td>
                                @if($product['type'])
                                    <span class="d-flex align-items-center"><i class="ft-stop-circle text-success mr-1"></i> Veg</span>
                                @else
                                    <span class="d-flex align-items-center"><i class="ft-stop-circle text-danger mr-1"></i> Non Veg</span>
                                @endif
                            </td> 
                            <td class="d-flex" style="align-items: center;"> 
                                <span class="dropdown">
                                    <button id="{{ $product->id }}" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="ft ft-settings"></i></button>
                                    <span aria-labelledby="btnSearchDrop10" class="dropdown-menu mt-1 dropdown-menu-right">
                                        <a href="/admin/edit-product/{{ $product->id }}" class="dropdown-item"><i class="ft-edit-2"></i> Edit</a>
                                        <a href="/admin/delete-product/{{ $product->id }}" class="dropdown-item"><i class="ft-x"></i> Delete</a> 
                                    </span>
                                </span>
                            </td> 
                        </tr>
                    @endforeach
                </tbody>
            </table>  
        </div>   
    </div>
</div>
@endsection