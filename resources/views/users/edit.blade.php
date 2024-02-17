@extends('layouts.sample')


@section('content')

<div class ="py-12 mx-3 m-4">
    <div class ="card">
        <div class="card-header">
            <div class="pull-left">
                <h4>Edit User Details</h4>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
        <div class="body m-2">
        {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
        @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>First Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Last Name:</strong>
                        {!! Form::text('lname', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Phone Number:</strong>
                        {!! Form::text('phone', null, array('placeholder' => 'Phone Number','class' => 'form-control')) !!}
                    </div>
                </div>
                <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Password:</strong>
                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Confirm Password:</strong>
                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                    </div>
                </div> -->
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Role:</strong>
                        {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Role As</strong>
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
                        <strong>Membership Status:</strong>
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
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                     <!--<button type="submit" class="btn btn-primary">Submit</button> -->

                    <form onSubmit="if(!confirm('Are you sure you want to save it?')){return false;}">
                        <input type="submit" />
                        </form>
                </div>
            </div>
        {!! Form::close() !!}
        </div>
    </div>
</div>






@endsection