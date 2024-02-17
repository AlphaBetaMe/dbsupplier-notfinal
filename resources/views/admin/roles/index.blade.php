@extends('layouts.admin')
@section('title', 'Manage Roles')
@section('content')
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">Manage Account</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Manage Roles</li>
            <li class="breadcrumb-item"><a href="{{ route('permissions.index')}}">Manage Permissions</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index')}}">Manage Users</a></li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="text-center mt-2">
                @can('role-create')
                <a class="btn btn-secondary" href="{{ route('roles.create') }}"><i class="bi bi-plus-circle"></i>Create</a>
                @endcan   
              </div>
              <h4 class="card-title">Accounts Data Table</h4>
              <div class="table-responsive">
                <table class="table text-center">
                  <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td>

                            <a class="btn btn-primary" href="{{ route('roles.show',$role->id) }}" style="width: 90px;"><i class="bi bi-eye"></i>View</a>
                            @can('role-edit')
                                <a class="btn btn-success" href="{{ route('roles.edit',$role->id) }}" style="width: 90px;"><i class="bi bi-pencil-square"></i>Edit</a>
                            @endcan
                            @can('role-delete')
                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                {!! Form::button('<i class="bi bi-trash"></i>Delete', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                          @endcan
                        </td>                     
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {!! $roles->render() !!}
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
