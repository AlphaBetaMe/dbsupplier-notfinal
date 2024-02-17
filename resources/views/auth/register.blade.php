@extends('layouts.frontend')
@section('title', 'Register')
@section('content')
<section class="mt-5">
    <div class="container py-3 mt-0 mb-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-8">
            <div class="card shadow" style="border-radius: 1rem;">
            <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="{{asset('images/logo.png')}}" alt="signup form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;  margin: 140px 15px;" />
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-dark">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h4 class="fw-bold mb-3 pb-3 text-center">Register</h4>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label for="supplierName">{{ __('Username') }}<code>*</code></label>
                                <input id="supplierName" type="text" placeholder="Enter your username" class="form-control form-control-md @error('supplierName') is-invalid @enderror" name="supplierName" value="{{ old('supplierName') }}" required autocomplete="supplierName" autofocus>
                                @error('supplierName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label for="lname">{{ __('Last Name') }} <code>*</code></label>
                                <input id="lname" type="text" placeholder="Enter your last name" class="form-control form-control-md @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname">
                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label for="name">{{ __('First Name') }}<code>*</code></label>
                                <input id="name" type="text" placeholder="Enter your first name" class="form-control form-control-md @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline">
                                <label for="dob">{{ __('Date of Birth') }}<code>*</code></label>
                                <input type="date" name="dob" class="text-muted form-control form-control-md @error('dob') is-invalid @enderror">
                                <!--@error('dob')-->
                                <!--    <span class="invalid-feedback" role="alert">-->
                                <!--        <strong>{{ $message }}</strong>-->
                                <!--    </span>-->
                                <!--@enderror-->
                            </div>
                        </div>
                    </div>
                    <div class="form-outline mb-3">
                        <!-- <input type="password" id="form2Example27" class="form-control form-control-lg" /> -->
                        <label for="email" class="">{{ __('Email Address') }}<code>*</code></label>
                        <input id="email" type="email" placeholder="Enter your email address" class="form-control  form-control-md @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-outline mb-3">
                        <!-- <input type="password" id="form2Example27" class="form-control form-control-lg" /> -->
                        <label for="password" class="">{{ __('Password') }}<code>*</code></label>
                        <input id="password" type="password" placeholder="Enter your password" class="form-control  form-control-md @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    
                    <div class="form-outline mb-3">
                        <label for="password-confirm" class="">{{ __('Confirm Password') }}<code>*</code></label>
                        <input id="password-confirm" type="password" placeholder="Enter your confirm password" class="form-control form-control-md" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="form-outline">
                        <input type ="checkbox" class="mb-2" name="terms" required>
                        <button type="button" class="btn btn-sm btn-outline-dark mb-2 ms-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Data Privacy
                        </button>
                        <button class="btn btn-dark btn-md btn-block float-end mt-2" type="submit">Register</button>
                    </div>
                    <!-- <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!" style="color: #393f81;">Register here</a></p>
                    <a href="#!" class="small text-muted">Terms of use.</a>
                    <a href="#!" class="small text-muted">Privacy policy</a> -->
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Privacy</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Event Supplier Laguna collects and maintains personal data as part of its records management process in accordance with Republic Act 10173, or the Data Privacy Act (DPA) of 2012.
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
@endsection
<style>
    .btn.btn-secondary{
        background-color: #343a40;
    }
            
    .btn-secondary:hover{
        background-color: #ffffff !important; 
        color: #000 !important; 
    }
        
    .btn.btn-outline-secondary:hover {
        background-color: #343a40;
    }
    
    .btn.btn-outline-secondary {
        color: #000 !important; 
            
    }
     
    .table-striped tbody tr:nth-of-type(odd) {
        color: #000 !important; 
    }

    .supplier-card {
        width: 100%;
        max-width: 400px; 
        margin: 0 auto;
    }

    .supplier-image {
        width: 150px; 
        height: 150px; 
        object-fit: cover;
        border-radius: 50%; 
        margin-bottom: 1rem;
    }

    .supplier-details {
            text-align: left;
    }

    h4 {
            margin-top: 0;
    }

    .explore-btn {
        width: 100%;
        color: #000; 
    }

    .explore-btn:hover {
        color: #fff !important;
    }

    .navbar {
        margin: 0;
        padding: 8px 20px;    
    }

    .rounded-btn.full-width {
        width: 100%;
        display: block;
    }

    .navbar-nav {
        margin: 0;
    }

    .nav-link {
        text-decoration: none !important;
        color: #FFFFFF !important;
        transition: background-color 0.3s ease;
        font-size: 14px;
        padding: 10px;
    }

    #navbarNav {
        margin: 0;
    }

    #aliveLogo {
        margin-bottom: 0;
        margin-top: 0;
        margin-left: 3px;
        margin-right: 0;
    }

    #alive {
        margin-top: 1px;
    }

    .nav-link:hover {
      background-color: #555555;
      border-radius: 5px;
    }

    .rounded-btn {
      border-radius: 5px;
      display: inline-block;
      text-align: center;
      text-decoration: none;
      cursor: pointer;
      background-color: #ffffff;
      color: #000000 !important;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .rounded-btn:hover {
        background-color: grey;
        color: #ffffff !important;
    }

    .square-image {
        width: 100px;
        height: 100px;
        object-fit: cover; 
    }

    .custom {
        margin-left: 6px;
        margin-right: 6px;
    }

    .navbar-toggler {
        transition: background-color 0.3s ease;
    }

    .navbar-toggler:hover {
        background-color: #555555;
    }

    .container {
       margin-top: 10px;
   }

   .btn-dark.btn-md:hover {
       background-color: #ffffff !important;
       color: #000 !important; 
   }

   .text-custom:hover {
       color: #000;
      
   }
   .text-custom{
       color: #6c757d;
   }
</style>