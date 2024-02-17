@extends('layouts.frontend')
@section('title', 'Category')
@section('content')
<div class="container-fluid">
    <div class="card border-light">
        <div class="container-fluid d-block py-4">
            <nav class="navbar navbar-dark" style="background-color: #343a40; padding: 18px 12px;margin:0 6px;">
                <a class="navbar-brand">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{url('category')}}" class="text-white me-2" style="font-size: 14px;">
                                Shop
                            </a>
                            &nbsp &nbsp
                            <div>
                                <a href="{{ url('cart') }}" class="position-relative me-2">
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-danger" style="font-size: 10px; margin-top: -20%; padding: 3px 3.5px; font-style: italic;">{{ $cartShop }}</span>
                                    <i class="text-white bi bi-cart3" style="font-size: 25px;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </a>
            </nav>
        </div>
    </div> 
    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="mb-4 fw-bold">All Categories</h1>
                    <div class="d-flex justify-content-end mb-3">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle bg-dark text-light shadow" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories
                            </button>
                            <div class="dropdown-menu dropdown-menu-right mt-3" aria-labelledby="dropdownMenuButton">
                                @foreach($category as $item)
                                    <a class="dropdown-item" href="{{url('view-category/'.$item->slug)}}">{{$item->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($category as $cat)
                            <div class="col-md-4">
                                <a href="{{url('view-category/'.$cat->slug)}}" class="text-decoration-none">
                                    <div class="card mt-2 mb-3">
                                        <img src="{{asset('assets/uploads/category/'.$cat->image)}}" height="280" alt="product image">
                                        <div class="card-body">
                                            <h5 class="fw-bold">{{$cat->name}}</h5>
                                            <p class="small mb-2">
                                                {{$cat->description}}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
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


    .navbar-toggler {
        transition: background-color 0.3s ease;
    }

    .navbar-toggler:hover {
        background-color: #555555;
    }

    .card:hover {
        color: #343a40;
    }
</style>
