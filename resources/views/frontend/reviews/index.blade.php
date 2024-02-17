@extends('layouts.frontend')
@section('title',"Write a review")   
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card py-4 px-4 shadow-sm">
                <div class="card-body">
                    @if($verified_purchase->count() > 0)
                        <h4 class="mb-4">You are writing a review for {{$product->name}}</h4>
                        <form action="{{ url('add-review')}}" method="POST">
                        @csrf    
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="mb-4">
                                <label for="user_review" class="form-label">Review</label>
                                <textarea class="form-control" rows="5" name="user_review" placeholder="Write a review"></textarea>
                            </div>

                            {{-- <div class="row">
                                <div class="col">
                                    <div class="mb-4">
                                        <label for="rating">Rating for Services</label>
                                        <input type="number" name="rating" id="rating" class="form-control" oninput="validateRating(this)" min="1" max="5" step="1" pattern="[1-5]">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-4">
                                        <label for="rating">Rating for the Event Supplier</label>
                                        <input type="number" name="rating" id="rating" class="form-control" oninput="validateRating(this)" min="1" max="5" step="1" pattern="[1-5]">
                                    </div>
        
                                </div>
                            </div> --}}
                            <div class="mb-4">
                                <label for="rating">Rating for Services</label>
                                <input type="number" name="rating" id="rating" class="form-control" oninput="validateRating(this)" min="1" max="5" step="1" pattern="[1-5]">

                            </div>
                            <div class="mb-4">
                                <label for="rating">Rating for the Event Supplier</label>
                                <input type="number" name="rating" id="rating" class="form-control" oninput="validateRating(this)" min="1" max="5" step="1" pattern="[1-5]">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit Review</button>
                        </form>
                    @else
                        <div class="alert alert-danger">
                            <h4>You are not capable to review this event and supplier!</h4>
                            <p>

                            </p>
                            <a href="{{url('/')}}" class="btn btn-primary mt-3">Go to home page</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
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