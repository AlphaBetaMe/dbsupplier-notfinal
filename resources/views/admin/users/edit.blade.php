@extends('layouts.admin')
@section('title', 'Edit User Details')
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
            {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
            @csrf
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Edit User Details</h4>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="fw-bold">First Name</label>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="fw-bold">Last Name</label>
                        {!! Form::text('lname', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
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
                        <label class="fw-bold">Phone Number</label>
                        {!! Form::text('phone', null, array('placeholder' => 'Phone Number','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="fw-bold">Role</label>
                        {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="fw-bold">Role As</label>
                        <select class="form-control" name="role_as">
                            <option>{{$user->role_as}}</option>
                            <option value="1">1-Admin</option>
                            <option value="0">0-User</option>
                            <option value="4">4-Supplier</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="fw-bold">Membership Status:</label>
                        <select name="mstatus" class="form-control">
                            <option value="{{$user->mstatus}}">{{$user->mstatus}}</option>
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
                    <a href="{{ route('users.index') }}" class="btn btn-danger">Back</a>
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