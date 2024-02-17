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


<div class ="py-12 mx-3 m-4">
    <div class="card">
        <div class ="card-header">
            <div class="pull-left">
                <h4>Users Management</h4>
            </div>
                <div class="pull-right">
                    <a class="btn btn-success btn-sm" href="{{ route('users.create') }}"> Create New User</a>
                </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover table-condense table-striped text-center">
                <tr>
                    <thead class="thead-dark text-center">
                        <th width="280px">No</th>
                        <th width="280px">Supplier Name</th>
                        <th width="280px">Name</th>
                        <th width="280px">Email</th>
                        <th width="280px">Mobile Number</th>
                        <th width="280px">Roles</th>
                        <th width="280px">Membership Status</th>
                        <th width="280px">Action</th>
                    </thead>
                </tr>
                @foreach ($data as $key => $user)
                    <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{$user->supplierName}}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{$user->phone}}</td>
                    <td>
                        @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-warning">{{ $v }}</label>
                        @endforeach
                        @endif
                    </td>
                    <td>
                        @if($user->mstatus =='Active')
                        <span class="badge badge-success">{{$user->mstatus}}</span>
                        @else
                         <span class="badge badge-danger">{{$user->mstatus}}</span>
                        @endif
                    </td>
                 <td>
                    <!-- Edit button -->
                    <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}" style="width: 80px;">Edit</a>
                
                    <!-- Delete button -->
                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'style' => 'width: 80px;']) !!}
                    {!! Form::close() !!}
                </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="card-footer">
            <div class="pagination">
                {!! $data->links('') !!}
            </div>
        </div>
    </div>
</div>

@endsection
