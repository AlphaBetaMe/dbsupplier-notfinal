@extends('layouts.frontend')
@section('title', $products->name)   
@section('content')

<!-- <div class="py-4 mb-4 shadow-sm bg-successborder-top" style="100px;">
    <div class="container">
        <h6>Collections / {{$products->category->name }} / {{$products->name}}</h6>
    </div>
</div> -->

<div class="container mt-5">
    <div class="card shadow productData">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{asset('assets/uploads/services/'.$products->image)}}" class="w-100" alt="">
                </div>
                <div class="col-md-8">
                    <h1 class="fw-bold mt-3">
                        {{$products->name}}
                        <!--@if($products->trending =='1')-->
                        <!--<label style="font-size: 16px;" class="float-end badge bg-danger trending_tag">Trending</label>-->
                        <!--@endif-->
                    </h1>
                    <hr>
                    <!--<label class="me-3">Original Price: <s>Php {{$products->orig_price}}</s></label>-->
                    <label class="fw-bold">Selling Price: &#8369; {{$products->selling_price}}</label>
                    <p>
                        {!! $products->description !!}
                    </p>
                    <hr>
                 
                            <!-- <label class="badge bg-info">In Stock:</label> <span class="">{{$products->quantity}}</span> -->
                
             
                    <div class="row mt-3">
                        <div class="col-md-3">
                        <input type="hidden" value="{{$products->id}}" class="prod_id">
                            <!-- <label>Quantity</label>
                            <div class="input-group text-center mt-3">
                                <button class="input-group-text decrement-button">-</button>
                                <input type="text" name="quantity " value="1" class="form-control input-qty"/>
                                <button class="input-group-text increment-button">+</button>
                            </div> -->
                        <!--<input type="date" name="dateofevent" id="" class="form-control date">   -->
                        </div>
                       
                        <div class="col-md-9" >
  
                     
                            <label class="badge bg-warning"></label>
                            <button type="button" class="btn btn-success float-end addtoCart" id="addtoCart"><i class="fas fa-shopping-cart me-2"></i>Add to Cart</button>
                        
                            <a href ="{{ url('/add-review/'.$products->slug.'/userreview')}}" class="btn btn-primary float-end me-2"><i class="far fa-edit me-2"></i>Write a review</a>
                            <!-- <button type="button" class="btn btn-success me-3 float-start ">Add to Wishlist</button> -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mt-4 mb-3">
        <div class="card-header">
        Service Reviews
        </div>
        
        <div class="card-body">
        @foreach($reviews as $review)
        <div class="user-review">
            <label for="user_name">{{$review->user->name}}</label>
              <p>
                {{-- <label for="" class="text-primary">Rating: {{$review->rating}}</label> --}}
                <label for="" class="text-warning small">Rating: </label>
                <label for="" class="text-warning small">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $review->rating)
                            <i class="fas fa-star"></i>
                        @else
                            <i class="far fa-star"></i>
                        @endif
                    @endfor
                </label>
                <label class="small ms-5 text-muted">{{$review->created_at}}</label>
            </p>
            <p class="mb-5">
                {{$review->user_review}}
            </p>
            {{-- <hr> --}}
        </div>
        @endforeach
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
