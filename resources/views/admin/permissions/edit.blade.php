@extends('layouts.admin')
@section('title', 'Edit Permission')
@section('content')
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
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit Permission</h4>
            {!! Form::model($permissions, ['method' => 'PATCH','route' => ['permissions.update', $permissions->id]]) !!}
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="permission_name">Name</label>
                  {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('permissions.index') }}" class="btn btn-danger">Back</a>
              </div>
            </div>
            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
