@extends('layouts.admin')
@section('title', 'Manage Users')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">My Profile</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('users.updatemyProfile', Auth::id()) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Update Profile Picture</h4>
                                    <div class="avatar mx-auto">
                                        {{-- <img src="{{ asset('assets/uploads/profile/'.$user->image) }}" class="rounded-circle img-fluid" width="300px" /> --}}
                                        <img class="rounded-circle img-fluid " src="{{ asset('assets/uploads/profile/' . auth()->user()->image) }}" width="300px" alt="User Image">
                                    </div>
                                    <div class="card-body">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Update Profile Details</h4>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="text" class="form-control" value="{{ $user->email }}" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label>Supplier Name:</label>
                                        <input type="text" class="form-control" value="{{ $user->supplierName }}" name="supplierName">
                                    </div>
                                    <div class="form-group">
                                        <label>First Name:</label>
                                        <input type="text" class="form-control" value="{{ $user->name }}" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name:</label>
                                        <input type="text" class="form-control" value="{{ $user->lname }}" name="lname">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number:</label>
                                        <input type="text" class="form-control" value="{{ $user->phone }}" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label>Address 1:</label>
                                        <input type="text" class="form-control" value="{{ $user->address1 }}" name="address1">
                                    </div>
                                    <div class="form-group">
                                        <label>Address 2:</label>
                                        <input type="text" class="form-control" value="{{ $user->address2 }}" name="address2">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City:</label>
                                                <input type="text" class="form-control" value="{{ $user->city }}" name="city">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>State:</label>
                                                <input type="text" class="form-control" value="{{ $user->state }}" name="state">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Zip Code:</label>
                                                <input type="text" class="form-control" value="{{ $user->pincode }}" name="pincode">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success"><i class="bi bi-pencil-square"></i> Update</button>
                                        <a class="btn btn-primary" href="{{ route('update-password.edit', auth()->user()->id) }}"><i class="bi bi-lock"></i> Change Password</a>
                                    </div>
                                </div>
                            
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
