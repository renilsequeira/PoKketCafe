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
        <h4>View Users</h4> 
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="display" style="min-width: 845px">
                <thead>
                    <tr role="row"> 
                        <th>Sl No</th>

                        <th>Profile</th>
                        
                        <th>Name</th>
                        
                        <th>Email</th>

                        <th>Phone Number</th>     
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection