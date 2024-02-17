@extends('layouts.admin')
@section('title', 'Create New User')
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
            {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
            
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Create New User</h4>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="fw-bold">Name</label>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="fw-bold">Email</label>
                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="fw-bold">Password</label>
                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="fw-bold">Confirm Password:</label>
                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="fw-bold">Role</label>
                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="fw-bold">Membership Status:</label>
                        <select name="mstatus" class="form-control">
                            <option value="Active">
                                Active
                            </option>
                            <option value="Inactive">
                                Inactive
                            </option>
                        </select>
                    </div>
                </div>
                  
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
                {!! Form::close() !!}           
            </div>
          </div>
        </div>
    </div>
</div>


    </div>
@endsection