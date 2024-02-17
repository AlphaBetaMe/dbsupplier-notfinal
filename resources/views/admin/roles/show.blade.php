@extends('layouts.admin')
@section('title', 'Show Role')
@section('content')
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
            <h4 class="card-title">Show Role</h4>
            <div class="form-group">
              <label for="name" style="font-size:15px; fony-weight: bold;">Name</label>
              <p class="ml-3">{{ $role->name }}</p>
            </div>
            <div class="form-group">
              <label for="permissions" style="font-size:15px; fony-weight: bold;">Permissions</label><br>
              @if(!empty($rolePermissions))
              @foreach($rolePermissions as $v)
              <span class="badge badge-success ml-3" style="font-size: 75%;line-height: 1;padding: 0.2em 0.4em;">{{ $v->name }}</span>
              @endforeach
              @endif
            </div>
            <a href="{{ route('roles.index') }}" class="btn btn-danger mt-2">Back</a>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
