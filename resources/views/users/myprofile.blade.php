@extends('layouts.sample')

@section('content')

<style>
.table-striped tbody tr:nth-of-type(odd) {
        background-color: #f4decb;
    }
    .btn-primary,
    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary:focus,
    a.btn-primary,
    a.btn-primary:hover,
    a.btn-primary:active,
    a.btn-primary:focus {
        background-color: #000000;
        border-color: #000000;
        color: #fff; /* Set text color to white or any other color that contrasts well with the background */
    }

    .btn-success,
    .btn-success:hover,
    .btn-success:active,
    .btn-success:focus,
    a.btn-success,
    .a.btn-success:hover,
    .a.btn-success:active,
    .a.btn-success:focus {
        background-color: #000000;
        border-color: #000000;
        color: #fff; /* Set text color to white or any other color that contrasts well with the background */
    }
    .btn-warning,
    .btn-warning:hover,
    .btn-warning:active,
    .btn-warning:focus,
    a.btn-warning,
    .a.btn-warning:hover,
    .a.btn-warning:active,
    .a.btn-warning:focus {
        background-color: #000000;
        border-color: #000000;
        color: #fff; /* Set text color to white or any other color that contrasts well with the background */
    }
    .btn-info,
    .btn-info:hover,
    .btn-info:active,
    .btn-info:focus,
    a.btn-info,
    .a.btn-info:hover,
    .a.btn-info:active,
    .a.btn-info:focus {
        background-color: #000000;
        color: #fff; /* Set text color to white or any other color that contrasts well with the background */
    }
    .btn-danger,
    .btn-danger:hover,
    .btn-danger:active,
    .btn-danger:focus,
    a.btn-danger,
    .a.btn-danger:hover,
    .a.btn-danger:active,
    .a.btn-danger:focus {
000000        border-color: #000000;
        color: #fff; /* Set text color to white or any other color that contrasts well with the background */
    }
    .btn-secondary,
    .btn-secondary:hover,
    .btn-secondary:active,
    .btn-secondary:focus,
    a.btn-secondary,
    .a.btn-secondary:hover,
    .a.btn-secondary:active,
    .a.btn-secondary:focus {
        background-color: #000000;
        border-color: #000000;
        color: #fff; /* Set text color to white or any other color that contrasts well with the background */
    }
</style>
<div class="container-fluid">
<div class="row mt-5">

    <div class="col-md-4 mb-5 mb-md-0">
    <form action ="{{route('users.updatemyProfile', Auth::id())}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="card testimonial-card">
        <div class="card-up" style="background-color: #9d789b;"></div>
        <div class="avatar mx-auto bg-white">
          <img src="{{asset('public/assets/uploads/profile/'.$user->image)}}"
            class="rounded-circle img-fluid" width="300px"/>
        
        </div>
        <div class="card-body">
          <h4 class="mb-4">{{$user->name}}&nbsp{{$user->lname}}</h4>
          <hr />
          <p class="dark-grey-text mt-4">
            <!-- <i class="fas fa-quote-left pe-2"></i> -->
          </p>
          <input type="file" name="image" class="form-control">
        </div>
      </div>
    </div>
    <div class="col-md-8 mb-5 mb-md-0">
      <div class="card testimonial-card">
        <div class="card-up" style="background-color: #7a81a8;"></div>
        <div class="card-body">
            
                <div class="form-group">
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
                            <label>Supplier Name:</label>
                            <input type="text" class="form-control" value="{{$user->supplierName}}" name="supplierName">
                        </div>
                    </div>
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
                    <button type="submit" class="btn btn-dark" style="width: 200px;"><i class="bi bi-pencil-square"> Update</i></button>
                    &nbsp
                    <a class="btn btn-dark"style="width: 200px;" href="{{route('update-password.edit', auth()->user()->id)}}"><i class="bi bi-lock"> Change Password</i></a>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
