@extends('layouts.admin')
@section('title', 'Manage Users')
@section('content')
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">Manage Account</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('roles.index')}}">Manage Roles</a></li>
            <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Manage Permissions</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Users</li>
          </ol>
        </nav>
      </div>
      <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                        <div class="text-center mt-4">
                            @can('permission-create')
                            <a class="btn btn-secondary" href="{{ route('users.create') }}"><i class="bi bi-plus-circle"></i>Create New User</a>
                            @endcan
                        </div>
                </div>
            </div>
            
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Users Management</h4>
              {{-- <p class="card-description"> Add class <code>.table</code>
              </p> --}}
              <div class="table-responsive text-center">
                <table class="table mb-4">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Supplier Name</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Roles</th>
                            <th>Membership Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                    <label class="badge badge-warning" style="font-size: 75%;line-height: 1;padding: 0.2em 0.4em;">{{ $v }}</label>
                                @endforeach
                                @endif
                            </td>
                            <td>
                                @if($user->mstatus =='Active')
                                <span class="badge badge-success" style="font-size: 75%;line-height: 1;padding: 0.2em 0.4em;">{{$user->mstatus}}</span>
                                @else
                                 <span class="badge badge-danger" style="font-size: 75%;line-height: 1;padding: 0.2em 0.4em;">{{$user->mstatus}}</span>
                                @endif
                            </td>
                            <td>
                                <!-- Edit button -->
                                <a class="btn btn-success mb-1" href="{{ route('users.edit', $user->id) }}" style="width: 90px;">
                                    <i class="bi bi-pencil-square"></i>Edit</a>
                            <br>
                                <!-- Delete button -->
                                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>Delete
                                </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-footer">
                    {{-- <div class="pagination justify-content-end"> --}}
                        <div class="pagination">
                        {{ $data->links() }}
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>


    </div>
@endsection