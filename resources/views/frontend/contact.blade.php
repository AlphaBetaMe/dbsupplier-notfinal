@extends('layouts.frontend2')
@section('title', 'Contact')
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
    <div class="container-fluid">
        <div class="text-center">
            <h1 class="title">Contact</h1>
            <hr class="centered-hr">
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="text-content">
                    <h1 class=""><strong>Contact Details</strong></h1>
                    <h4 class="mb-3">Awesome Laguna Inclusive Event Supplier</h4>
                    <p>We love hearing from our readers! Fill out this contact form to send us an email. We'll try our
                        best to respond to you as soon. If you're a brand interested in collaborating with us, you can click the link for options.</p>
                    <p>Thanks!!</p>
                    <strong class="mb-5">LET US KNOW HOW WE CAN HELP</strong>
                    <p class="mt-3 mb-2">For more info:</p>
                    <div class="social-icons">
                        <a href="#" class="icon-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="icon-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="icon-link"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <form action="{{route('contact.store')}}" method="post" class="form-container mr-4">
                    @csrf
                    <div class="container text-dark mt-5 mb-5">
                        <div class="card">
                            <div class="card-body">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control mb-3">
                                <label for="">Email Address</label>
                                <input type="text" name="email" class="form-control mb-3">
                                <label for="">Mobile Number</label>
                                <input type="text" name="number" class="form-control mb-3">
                                <label for="">Message</label>
                                <textarea name="message" cols="30" rows="2" class="form-control mb-3"></textarea>
                                <div class="mt-3 form-btn-container">
                                    <button type="submit" class="btn btn-secondary btn-block" onclick="showConfirmation()">SEND</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection