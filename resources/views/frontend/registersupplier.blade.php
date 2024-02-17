@extends('layouts.frontend')
@section('title', 'Supplier Registration')
@section('content')
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
</style>
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="card text-center">
              
               <div class="card-header" style="background-color:#343a40;">
                 <h3 class="text-white">BE A CERTIFIED SUPPLIER NOW!</h3>
               </div>
               <div class="card-body">
                    <div class="row mt-3">
                        <div class="col mb-2">
                            <img src="{{asset('assets/uploads/location.png')}}" width="50px"><br>
                            <p>Business address should be registered in Laguna</p>
                        </div>
                        <div class="col mb-2">
                            <img src="{{asset('assets/uploads/workflow.png')}}" width="50px"><br>
                            <p>Atleast three (3) years of continuous operations</p>
                        </div>
                        <div class="col mb-2">
                            <img src="{{asset('assets/uploads/badge.png')}}" width="50px"><br>
                            <p>Of good standing and reputation among vendors  and client communities</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col text-center">
                            <p>*Applicants below three (3) years in the industry must submit CERTIFICATE</p>
                            <p>OF ATTENDANCE of atleast three (3) business related seminars.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="{{asset('assets/uploads/form/MEMBERSHIP-APPLICATION-FORM.pdf')}}" class="btn btn-secondary mb-3"><span><i class="bi bi-download"></i>  Download</span></a> 
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col">
            <div class="card ">
               <div class="card-header text-center" style="background-color:#343a40;">
                 <h3 class="text-white">BE ONE OF THE SUPPLIER NOW</h3>
               </div>
               
               <form action="{{route('frontend.registersupplierStore')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <p><code>*Please complete the following details!</code></p>
                    <hr>
            
                    <!-- First Row -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name">Supplier Name<code>*</code></label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
            
                        <div class="col-md-6">
                            <label for="email">Email<code>*</code></label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
            
                    <!-- Second Row -->
                    <div class="row mb-0">
                        <div class="col-md-6">
                            <div class="form-outline mb-3">
                                <label for="password" class="">{{ __('Password') }}<code>*</code></label>
                                <input id="password" type="password" class="form-control form-control-md @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="col-md-6">
                            <div class="form-outline mb-3">
                                <label for="password-confirm" class="">{{ __('Confirm Password') }}<code>*</code></label>
                                <input id="password-confirm" type="password" class="form-control form-control-md" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                    </div>
            
                    <!-- Third Row -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Membership Fee<code>*</code></label>
                            <p>Upload your screenshot here</p>
                            <input type="file" class="form-control" name="payment" required>
                        </div>
                    </div>

                <hr>
                            
                    <!-- First Row -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="">Application form<code>*</code></label>
                            <input type="file" class="form-control mb-3" name="application">
                        </div>
            
                        <div class="col-md-6">
                            <label for="">Business Permit<code>*</code></label>
                            <input type="file" class="form-control mb-3" name="buspermit">
                        </div>

                        <div class="col-md-6">
                            <label for="">DTI Certificate<code>*</code></label>
                            <input type="file" class="form-control mb-3" name="dticert">
                        </div>

                        <div class="col-md-6">
                            <label for="">BIR Permit<code>*</code></label>
                            <input type="file" class="form-control mb-3" name="birpermit">
                        </div>

                        <div class="col-md-6">
                            <label for="">Mayors Permit<code>*</code></label>
                            <input type="file" class="form-control mb-3" name="mpermit">
                        </div>

                        <div class="col-md-6">
                            <label for="">Barangay Certificate<code>*</code></label>
                            <input type="file" class="form-control mb-3" name="bcert">
                        </div>

                        <div class="col-md-6">
                            <label for="">Supplier Valid ID<code>*</code></label>
                            <input type="file" class="form-control mb-3" name="valid">
                        </div>

                        <div class="col-md-6">
                            <label for="">2x2 Picture<code>*</code></label>
                            <input type="file" class="form-control mb-3" name="pic">
                        </div>
                    </div>
                  <hr>
               <div class="float-end mb-2 mt-2">
                    <button type="submit" class="btn btn-secondary">Send Request</button>
               </div>
               </form>
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

        h4 {
        margin-left: 0.5rem !important; 
        margin-top: 1px;
    }
  
    .navbar.navbar-expand-lg.navbar-dark{
        margin: 0;
        padding: 8px 20px;
    }
    /* .navbar-brand img {
      height: 75px;
      width: 150px;
      object-fit: contain;
    } */

    /* Add the following CSS for full width in active state */
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
</style>