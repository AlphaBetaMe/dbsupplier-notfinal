@extends('layouts.sample')
@section('content')
<style>
       .table-striped tbody tr:nth-of-type(odd) {
        background-color: #D2E0FB;
    }
    .btn-primary,
    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary:focus,
    a.btn-primary,
    a.btn-primary:hover,
    a.btn-primary:active,
    a.btn-primary:focus {
        background-color: #000000;
        border-color: #000000;
        color: #fff; /* Set text color to white or any other color that contrasts well with the background */
    }

    .btn-danger,
    .btn-danger:hover,
    .btn-danger:active,
    .btn-danger:focus,
    .a.btn-danger,
    .a.btn-danger:hover,
    .a.btn-danger:active,
    .a.btn-danger:focus {
       background-color: #000000;
        border-color: #000000;
        color: #fff;  /* Set text color to white or any other color that contrasts well with the background */
    }
    
     .btn-success,
    .btn-success:hover,
    .btn-success:active,
    .btn-success:focus,
    .a.btn-success,
    .a.btn-success:hover,
    .a.btn-success:active,
    .a.btn-success:focus {
       background-color: #000000;
        border-color: #000000;
        color: #fff;  /* Set text color to white or any other color that contrasts well with the background */
    }
    
    .btn-info,
    .btn-info:hover,
    .btn-info:active,
    .btn-info:focus,
    .a.btn-info,
    .a.btn-info:hover,
    .a.btn-info:active,
    .a.btn-info:focus {
       background-color: #000000;
        border-color: #000000;
        color: #fff;  /* Set text color to white or any other color that contrasts well with the background */
    }
    .btn-danger,
.btn-danger:hover,
.btn-danger:active,
.btn-danger:focus {
    background-color: #000000;
        border-color: #0000000;
        color: #fff; 
}
</style>
<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            <h4 class="">Supplier List</h4>
        </div>
        <div class="card-body">
        <div class="table table-responsive">
            <table class="table table-condense table-bordered text-center table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Membership</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suppliers as $key => $supplier)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$supplier->users->name}}</td>
                        <td>{{$supplier->users->email}}</td>
                        <td>
                            @if($supplier->users->mstatus == 'Active')
                            <span class="badge badge-success">{{$supplier->users->mstatus}}</span>
                            @else
                            <span class="badge badge-danger">{{$supplier->users->mstatus}}</span>
                            @endif
                        </td>
                        <td>{{$supplier->payment}}</td>
                        <td>{{$supplier->status}}</td>
                        <td>
                            <a href="{{route('suppliers.edit', $supplier->id)}}" class="btn btn-info"> View</a>
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