@extends('layouts.admin')
@section('title', 'Create New Permission')
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
            <h4 class="card-title">Create New Permission</h4>
            {!! Form::open(array('route' => 'permissions.store','method'=>'POST')) !!}
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="permission_name">Type new permission:</label>
                  {!! Form::text('name', null, array('id' => 'permission_name', 'placeholder' => 'Enter Permission Name','class' => 'form-control')) !!}
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
