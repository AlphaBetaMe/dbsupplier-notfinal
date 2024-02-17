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
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="py-12 mx-3 m-4">
    <div class ="card">
        <div class="card-header">
            <div class="pull-left">
                <h2>Role Management</h2>
            </div>
            <div class="pull-right">
                @can('role-create')
                <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover table-condensed table-striped">
                <tr>
                    <thead class="thead-dark">
                    <th>No</th>
                    <th>Name</th>
                    <th width="280px">Action</th>
                    </thead>
                </tr>
                @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                        @can('role-edit')
                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                        @endcan
                        @can('role-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                @endforeach
            </table>
            {!! $roles->render() !!}
        </div>
    </div>
</div>


<!--Start of Modal-->



@endsection