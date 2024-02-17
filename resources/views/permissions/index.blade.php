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
    <div class="card">
        <div class="card-header">
            <div class="pull-left">
                <h2>Permission Management</h2>
            </div>
            <div class="pull-right">
            @can('permission-create')
                <a class="btn btn-success" href="{{ route('permissions.create') }}"> Create Permission</a>
            @endcan
            </div>
                <form action="{{ route('permissions.index') }}" method="GET" role="search">
                    <div class="">
                        <input type="text" class="form-control mr-2" name="term" placeholder="Search permissions" id="term">
                         <span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info" type="submit" title="Search Permissions">
                                <span class="fa fa-search-plus"></span>
                            </button>
                        </span>
                        <a href="{{ route('permissions.index') }}" class=" mt-1">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Refresh page">
                                    <span class="fa fa-undo"></span>
                                </button>
                            </span>
                        </a>
                    </div>
                </form>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover table-condense table-striped">
                <tr>
                    <thead class="thead-dark">
                        <th width="280px">No</th>
                        <th width="280px">Permission</th>
                        <th width="280px">Guard Name</th>
                        <th width="280px">Action</th>
                    </thead>
                </tr>
                @foreach ($permissions as $key => $permission)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->guard_name }}</td>
                    <td>
                        <!-- <a class="btn btn-info" href="{{ route('permissions.show',$permission->id) }}">Show</a> -->
                        @can('permission-edit')
                        <a class="btn btn-primary" href="{{ route('permissions.edit',$permission->id) }}">Edit</a>
                        @endcan
                        @can('permission-destroy')
                            {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                @endforeach
            </table>
            {!! $permissions->render() !!}
        </div>
    </div>
</div>







@endsection