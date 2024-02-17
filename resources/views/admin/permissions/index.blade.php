@extends('layouts.admin')
@section('title', 'Manage Permissions')
@section('content')
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">Manage Account</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('roles.index')}}">Manage Roles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Permissions</li>
            <li class="breadcrumb-item"><a href="{{ route('users.index')}}">Manage Users</a></li>
          </ol>
        </nav>
      </div>
      <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('permissions.index') }}" method="GET" role="search">
                        <div class="form-group">
                            <label>Status</label>
                            <div class="input-group">
                                <input type="text" class="form-control mr-2" name="term" placeholder="Search permissions" id="term">
                                   <button class="btn btn-success" type="submit" title="Search Permissions">
                                       <span class="bi bi-search mr-2"></span>Search
                                   </button>
                                   <button class="btn btn-primary ml-2">
                                    <a href="#"><span class="bi bi-arrow-repeat text-light"></span></a>
                                   </button>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            @can('permission-create')
                            <a class="btn btn-secondary" href="{{ route('permissions.create') }}"><i class="bi bi-plus-circle"></i>Create Permission</a>
                            @endcan
                        </div>
                    </form>
                </div>
            </div>
            
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Permission Management</h4>
              {{-- <p class="card-description"> Add class <code>.table</code>
              </p> --}}
              <div class="table-responsive text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Permission</th>
                            <th>Guard Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $key => $permission)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->guard_name }}</td>
                            <td>
                                <!-- <a class="btn btn-info" href="{{ route('permissions.show',$permission->id) }}">Show</a> -->

                                @can('permission-edit')
                                <a class="btn btn-success" href="{{ route('permissions.edit', $permission->id) }}" style="width: 90px;">
                                    <i class="bi bi-pencil-square"></i>Edit
                                </a>
                                 @endcan
                            
                                @can('permission-destroy')
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id], 'style' => 'display:inline']) !!}
                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-trash"></i>Delete
                                        </button>
                                    {!! Form::close() !!}
                                @endcan                            
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $permissions->render() !!}
              </div>
            </div>
          </div>
        </div>
    </div>
</div>


    </div>
@endsection