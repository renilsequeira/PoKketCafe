@extends('layouts.admin')
@section('css') 
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/scripts/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>
@endsection

@section('content')
<div class="card m-1 p-1">
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">  
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-striped table-bordered zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead>
                        <tr role="row"> 
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
                                aria-label="Start date: activate to sort column ascending" style="width: 30px;">Sl No</th>

                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
                                aria-label="Position: activate to sort column ascending" style="width: 50px;">Profile</th>
                            
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
                                aria-label="Office: activate to sort column ascending" style="width: 60px;">Name</th>
                            
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
                                aria-label="Age: activate to sort column ascending" style="width: 80px;">Email</th>

                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
                                aria-label="Age: activate to sort column ascending" style="width: 26px;">Phone Number</th>
                            
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
                                aria-label="Start date: activate to sort column ascending" style="width: 30px;">Action</th>     
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach($users as $key=>$user)
                            <tr>
                                <td>{{ $key + 1}}</td>
                                <td><img src="{{ asset($user->image) }}" style="width: 50px;" /></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phoneNumber }}</td>
                                <td class="d-flex" style="align-items: center;"> 
                                    <span class="dropdown">
                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="ft ft-settings"></i></button>
                                        <span aria-labelledby="btnSearchDrop10" class="dropdown-menu mt-1 dropdown-menu-right">
                                            <a href="#" data-toggle="modal" class="dropdown-item"><i class="ft-edit-2"></i> Edit</a>
                                            <a href="#" class="dropdown-item"><i class="ft-x"></i> Delete</a> 
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
</div>
@endsection