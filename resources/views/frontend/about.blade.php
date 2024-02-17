@extends('layouts.frontend2')
@section('title', 'About')
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

    .card-body {
        text-align: center;
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
<div class="about-section">
    <div class="container text-center">
        <div class="text-center">
            <h1 class="title">About</h1>
            <hr class="centered-hr mb-3">
        </div>
        <div class="row">
            <div class="col">
                <div class="mt-4">
                    <h2 class="text-uppercase text-dark font-weight-bold">Awesome Laguna Event Supplies</h2>
                    <p>
                        Providing inclusive event services and supplies in the province of Laguna, Philippines.
                    </p>
                    <p>
                        Established in 2023, ALIVE is managed by the admin, focusing on providing members with marketing resources, business development opportunities, and shared ethical values to inspire confidence in customers and clients. ALIVE is registered as a non-profit organization, promoting and educating our members.
                    </p>
                    <p>
                        Our mission is to provide industry-leading education, host inspirational networking events, and advance ethical standards in the events industry in Laguna.
                    </p>
                </div>
            </div>
        </div>
        <div class="row mt-2 mb-5">
            <h4 class="mb-4" style="text-align: left;">Developed by:</h4>
            <div class="col">
                <div class="card border-0 shadow mx-auto" style="max-width: 300px; transition: transform 0.2s;">
                    <div class="d-flex align-items-center justify-content-center" style="height: 150px;">
                        <img src="{{asset('assets/uploads/photo/1.jpg')}}" class="card-img-top rounded-circle" alt="Developer 1" style="width: 120px; height: 120px;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-dark">Name</h5>
                        <p class="card-text text-muted">Student | Developer</p>
                        <p class="card-text text-muted small"><i>"Quote"</i></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow mx-auto" style="max-width: 300px; transition: transform 0.2s;">
                    <div class="d-flex align-items-center justify-content-center" style="height: 150px;">
                        <img src="{{asset('assets/uploads/photo/2.jpg')}}" class="card-img-top rounded-circle" alt="Developer 2" style="width: 120px; height: 120px;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-dark">Name</h5>
                        <p class="card-text text-muted">Student | Developer</p>
                        <p class="card-text text-muted small"><i>"Quote"</i></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow mx-auto" style="max-width: 300px; transition: transform 0.2s;">
                    <div class="d-flex align-items-center justify-content-center" style="height: 150px;">
                        <img src="{{asset('assets/uploads/photo/3.jpeg')}}" class="card-img-top rounded-circle" alt="Developer 3" style="width: 120px; height: 120px;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-dark">Name</h5>
                        <p class="card-text text-muted">Student | Developer</p>
                        <p class="card-text text-muted small"><i>"Quote"</i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
    .card:hover {
        transform: scale(1.03);
    }
</style>
