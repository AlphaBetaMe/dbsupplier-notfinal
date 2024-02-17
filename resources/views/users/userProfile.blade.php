@extends('layouts.frontend')

@section('content')
<div class="container-fluid">
    <div class="mt-2 py-4 px-5">
        <div class="card shadow">
            <div class="card-header">
                Profile Information 
            </div>
            <div class="card-body">
                <form action ="{{route('user.updateuserProfile', Auth::id())}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="row">
                            <strong>Full Name: {{$user->name}}&nbsp{{$user->lname}}</strong> 
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label>Email:</label>
                                <input type="text" class="form-control" value="{{$user->email}}" name="email">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <label for="">First Name:</label>
                                <input type="text" class="form-control" value="{{$user->name}}" name="name">
                            </div>
                            <div class="col">
                                <label>Last Name:</label>
                                <input type="text" class="form-control" value="{{$user->lname}}" name="lname">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Phone Number:</label>
                                <input type="text" class="form-control" value="{{$user->phone}}" name="phone">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Address 1:</label>
                                <input type="text" class="form-control" value="{{$user->address1}}" name="address1">
                            </div>
                            <div class="col">
                                <label for="">Address 2:</label>
                                <input type="text" class="form-control" value="{{$user->address2}}" name="address2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">City:</label>
                                <input type="text" class="form-control" value="{{$user->city}}" name="city">
                            </div>
                            <div class="col">
                                <label for="">State:</label>
                                <input type="text" class="form-control" value="{{$user->state}}"name="state">
                            </div>
                           
                            <div class="col">
                                <label for="">Zip Code:</label>
                                <input type="text" class="form-control" value="{{$user->pincode}}" name="pincode">
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn btn-info" href="{{route('users.userupdatePassword', auth()->user()->id)}}">Change Password</a>
                        &nbsp
                        <a class="btn btn-secondary" href="{{url('/')}}">Home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection