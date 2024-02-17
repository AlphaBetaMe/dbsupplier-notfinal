@extends('layouts.admin')
@section('title', 'Create Role')
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
                <h4 class="card-title">Create Role</h4>
                {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                @csrf
                  <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                  </div>
                  <div class="form-group">
                    <label for="permissions">Permissions</label><br>
                    @foreach($permission as $value)
                   
                        <div class="form-check">
                            {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'form-check-input')) }}
                            <label class="form-check-label">{{ $value->name }}</label>
                        </div>
                    @endforeach
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  <a href="{{ route('roles.index') }}" class="btn btn-danger">Back</a>
                  {!! Form::close() !!}
               </div>
           
        </div>
      </div>
    </div>
@endsection
@if(session('success'))
<script>
    swal("Success!", "{{ session('success') }}", "success");
</script>
@endif