@extends('layouts.frontend')
@section('title')   
{{$category->name}}
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col">
                     <h2 class="float-start">{{$category->name}}</h2>
                     <a href="{{ url()->previous() }}" class="float-end">&#8592; Back</a>

            </div>
         
            
            <hr>
            @foreach($products as $item)
                <div class="col-md-3 mb-3 mt-3">
                    <div class="card product-card shadow-sm">
                        <a href="{{url('/category/'.$category->slug.'/'.$item->slug)}}" class="custom">
                        <img src ="{{asset('assets/uploads/services/'.$item->image)}}" alt="product image" width="300px" height="250px"  class="p-2 mx-auto">
                        <div class="card-body">
                            <h5 class="fw-bold">{{$item->name}}</h5>
                            <span class="float-start mb-3">Php {{number_format($item->selling_price,2)}}</span>
                            <!-- <span class="float-end"><s>{{$item->orig_price}}</s></span> -->
                        </div>
                        </a>
                    </div>
                </div>
            @endforeach
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

    .navbar-toggler {
        transition: background-color 0.3s ease;
    }

    .navbar-toggler:hover {
        background-color: #555555;
    }

    .card:hover, .card-body:hover{
        color: #343a40;
    }

    .product-card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transform: scale(1.02);
        transition: box-shadow 0.3s ease, transform 0.3s ease;
        color: #343a40;
    }

    .custom:hover {
        color: #343a40;
    }
</style>
