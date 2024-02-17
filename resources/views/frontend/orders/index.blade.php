@extends('layouts.frontend')
@section('title', 'My Bookings')
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

    #button-addon2 {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
}

    .refresh-icon {
        font-size: 18px; 
    }

    .refresh-icon:hover {
        color: #555555;
    }
</style>
<h1 class="fw-bold text-center mt-5" style="color: #343a40">My Bookings</h1>
<div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row">
                <form method="GET">
                     @csrf
                    <div class="input-group dontPrint">
                        <input
                            type="text"
                            name="search"
                            value="{{ request()->get('search') }}"
                            class="form-control form-control-md"
                            placeholder="Search..."
                            aria-label="Search"
                            aria-describedby="button-addon2">
                        <button class="btn btn-outline-dark me-3" type="submit" id="button-addon2">Search</button>
                        <a href="{{url('myOrders')}}" class="mt-2">
                            <i class="bi bi-arrow-clockwise refresh-icon"></i>
                        </a>
                    </div>
                </form>
            </div>
            <div class="row mt-2">
                <div class="table-responsive">
                    <table class="table text-center mt-2">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Tracking Number</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td><h6 class="mt-3 mb-3">{{date('d-m-y', strtotime($order->created_at))}}</h6></td>
                                    <td><h6 class="mt-3 mb-3">{{$order->trackingNumber}}</h6></td>
                                    <td><h6 class="mt-3 mb-3">{{$order->total_price}}</h6></td>
                                    <td><h6 class="mt-3 mb-3">{{$order->status}}</h6></td>
                                    <td>
                                        <a href="{{url('viewOrder/'.$order->id)}}" class="btn btn-primary mt-2 mb-1">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
