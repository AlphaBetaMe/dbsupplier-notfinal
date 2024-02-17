@extends('layouts.frontend')
@section('title', 'Supplier List')
@section('content')
<style>
    /* /* .btn.btn-secondary{
        background-color: #343a40;
    } */
            
    /* .btn-secondary:hover{
        background-color: #ffffff !important; 
        color: #000 !important; 
    } */
        
    /* .btn.btn-outline-secondary:hover {
        background-color: #343a40;
    } */
    
    /* .btn.btn-outline-secondary {
        color: #000 !important; 
            
    } */ 
     
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
        color: #000 !important; 
        background-color: #fff;
    }

    .explore-btn:hover {
        color: #fff !important;
        background-color: #343a40;
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
    <div class="card border-light">
        <div class="container-fluid d-block py-4">
            <nav class="navbar navbar-dark custom" style="background-color: #343a40; padding: 12px 12px;">
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
    <div class="container mt-5">
        <h1 class="text-center mt-4 mb-4"><strong>Supplier</strong></h1>
        <div class="row">
            <div class="col">
                <form method="GET" action="{{ route('frontend.supplierFilter') }}">
                    <div class="input-group">
                        <div class="input-group mb-3">
                            <input type="text" name="city" class="form-control form-control-md" placeholder="Filter by Location/Address" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append mb-3">
                                <button class="btn btn-secondary" type="submit" id="button-addon2">Filter</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- <hr class="mb-5"> --}}
        <div class="row">
            @foreach($suppliers as $data)
            <div class="card mt-4 shadow-sm supplier-card">
                <div class="card-body">
                    <img src="{{ asset('assets/uploads/profile/'.$data->image) }}" class="rounded-circle img-fluid supplier-image" alt="{{ $data->supplierName }}">
                    <div class="supplier-details">
                        <h4>{{ $data->supplierName }}</h4>
                        <h6><i class="bi bi-geo-alt-fill">{{ $data->address1 }} {{ $data->address2 }},{{ $data->city }},{{ $data->state }}</i></h6>
                    </div>
                    <a href="{{ route('frontend.supplier', $data->id) }}" class="btn btn-outline-secondary explore-btn">Explore</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


<script>
$('.fproducts-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    dots: true,
    items: 10, // Change the number of items to 10
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 5    
        } // Set the number of items to 10 for screens wider than 1000 pixels
    }
})
</script>
<!-- Add the following JavaScript code inside the head section or before the closing body tag -->
<script>
    function toggleNavbar() {
      var navbar = document.getElementById("navbarNav");
      navbar.classList.toggle("show");
  
      // Add the following lines to toggle the class for the "Become a Supplier" button
      var supplierButton = document.getElementById("becomeSupplierBtn");
      supplierButton.classList.toggle("full-width", navbar.classList.contains("show"));
    }
  </script>
  
@endsection