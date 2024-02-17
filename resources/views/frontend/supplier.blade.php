@extends('layouts.frontend')
@section('title', 'Supplier Details')
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
</style>
<style>
    /* .swal-button {
    background-color: #343a40;
    color: #fff;
    border: none;
    box-shadow: none;
    border-radius: 5px;
    font-weight: 600;
    font-size: 14px;
    padding: 10px 24px;
    margin: 0;
    align-items: center;
    } */

@media (min-width: 576px) {
  .rounded-nav {
    border-radius: 50rem !important;
  }
}

@media (min-width: 576px) {
  .rounded-nav .nav-link {
    border-radius: 50rem !important;
  }
}
body {
    background: #f9f9f9;
    font-family: "roboto", sans-serif;
}

.main-content {
    padding-top: 100px;
    padding-bottom: 100px;
}

a {
    text-decoration: none;
}

.food-card {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 20px;
    -webkit-box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
    -webkit-transition: 0.1s;
    transition: 0.1s;
}

.food-card:hover {
    -webkit-box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}

.food-card .food-card_img {
    display: block;
    position: relative;
}

.food-card .food-card_img img {
    width: 100%;
    height: 200px;
    -o-object-fit: cover;
    object-fit: cover;
}

.food-card .food-card_img i {
    position: absolute;
    top: 20px;
    right: 30px;
    color: #fff;
    font-size: 25px;
    -webkit-transition: all 0.1s;
    transition: all 0.1s;
}

.food-card .food-card_img i:hover {
    top: 18px;
    right: 28px;
    font-size: 29px;
}

.food-card .food-card_content {
    padding: 15px;
}

.food-card .food-card_content .food-card_title-section {
    height: 100px;
    overflow: hidden;
}

.food-card .food-card_content .food-card_title-section .food-card_title {
    color: #343a40;
    font-weight: bold;
    display: block;
    line-height: 1.3;
    margin-bottom: 8px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

.food-card .food-card_content .food-card_title-section .food-card_author {
    font-size: 14px;
    display: block;
}

.food-card .food-card_content .food-card_bottom-section .space-between {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
}

.food-card .food-card_content .food-card_bottom-section .food-card_subscribers {
    margin-left: 17px;
}

.food-card .food-card_content .food-card_bottom-section .food-card_subscribers img,
.food-card .food-card_content .food-card_bottom-section .food-card_subscribers .food-card_subscribers-count {
    height: 45px;
    width: 45px;
    border-radius: 45px;
    border: 3px solid #fff;
    margin-left: -17px;
    float: left;
    background: #f5f5f5;
}

.food-card .food-card_content .food-card_bottom-section .food-card_subscribers .food-card_subscribers-count {
    position: relative;
}

.food-card .food-card_content .food-card_bottom-section .food-card_subscribers .food-card_subscribers-count span {
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    font-size: 13px;
}

.food-card .food-card_content .food-card_bottom-section .food-card_price {
    font-size: 20px;
    font-weight: bold;
    color: #343a40;
}

.food-card .food-card_content .food-card_bottom-section .food-card_order-count {
    width: 100px;
}

.food-card .food-card_content .food-card_bottom-section .food-card_order-count input {
    background: #f5f5f5;
    border-color: #f5f5f5;
    -webkit-box-shadow: none;
    box-shadow: none;
    text-align: center;
}

.food-card .food-card_content .food-card_bottom-section .food-card_order-count button {
    border-color: #f5f5f5;
    border-width: 3px;
    -webkit-box-shadow: none;
    box-shadow: none;
}

@media (min-width: 992px) {
    .food-card--vertical {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        position: relative;
        height: 235px;
    }

    .food-card--vertical .food-card_img img {
        width: 200px;
        height: 100%;
        -o-object-fit: cover;
        object-fit: cover;
    }
}

/* With arrow tabs */

.with-arrow .nav-link.active {
  position: relative;
}

.with-arrow .nav-link.active::after {
  content: '';
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  border-top: 6px solid #2b90d9;
  position: absolute;
  bottom: -6px;
  left: 50%;
  transform: translateX(-50%);
  display: block;
}

/* lined tabs */

.lined .nav-link {
  border: none;
  border-bottom: 3px solid transparent;
}

.lined .nav-link:hover {
  border: none;
  border-bottom: 3px solid transparent;
}

.lined .nav-link.active {
  background: #FFFFFF;
  color: #343a40;
  border-color: #2b90d9;
}

body {
  /* background: #304352; */
  /* background: -webkit-linear-gradient(to right, #304352, #d7d2cc);
  background: linear-gradient(to right, #304352, #d7d2cc); */
  min-height: 100vh;
}

.nav-pills .nav-link {
    background-color: #343a40;
}
.text-uppercase {
  letter-spacing: 0.1em;
}

.image-container {
    position: relative;
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    text-align: center;
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.image-container:hover .overlay {
    opacity: 1;
}


    .btn-primary,
    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary:focus,
    a.btn-primary,
    a.btn-primary:hover,
    a.btn-primary:active,
    a.btn-primary:focus {
        background-color: #ffffff;
        border-color: #ffffff;
        color: #0000; 
    }

    .btn-success,
    .btn-success:hover,
    .btn-success:active,
    .btn-success:focus,
    a.btn-success,
    .a.btn-success:hover,
    .a.btn-success:active,
    .a.btn-success:focus {
        background-color: #6D5B36;
        border-color: #6D5B36;
        color: #fff; /* Set text color to white or any other color that contrasts well with the background */
    }
    .btn-warning,
    .btn-warning:hover,
    .btn-warning:active,
    .btn-warning:focus,
    a.btn-warning,
    .a.btn-warning:hover,
    .a.btn-warning:active,
    .a.btn-warning:focus {
        background-color: #343a40;
        border-color: #6D5B36;
        color: #fff; /* Set text color to white or any other color that contrasts well with the background */
    }
    .btn-info,
    .btn-info:hover,
    .btn-info:active,
    .btn-info:focus,
    a.btn-info,
    .a.btn-info:hover,
    .a.btn-info:active,
    .a.btn-info:focus {
        background-color: #343a40;
        border-color: #6D5B36;
        color: #fff; /* Set text color to white or any other color that contrasts well with the background */
    }
    .btn-danger,
    .btn-danger:hover,
    .btn-danger:active,
    .btn-danger:focus,
    a.btn-danger,
    .a.btn-danger:hover,
    .a.btn-danger:active,
    .a.btn-danger:focus {
        background-color: #FFFFFF;
        border-color: #343a40;
        color: #fff; /* Set text color to white or any other color that contrasts well with the background */
    }
    .btn-secondary,
    .btn-secondary:active,
    .btn-secondary:focus,   
    .a.btn-secondary:focus {
        background-color: #343a40;
        color: #fff; 
    }


    .btn-secondary:hover, .a.btn-secondary:active {
        background-color: #fff;
        color: #000;
    }


    .nav-tabs .nav-item.flex-sm-fill .nav-link {
    background-color: #797878;
    border-color: #797878;
    color: #fff; /* Set text color to white or any other color that contrasts well with the background */
}

.nav-tabs .nav-item.flex-sm-fill .nav-link.active {
    background-color: #343a40;
    color: #fff; /* Set text color to white or any other color that contrasts well with the background */
}
</style>

<div class="container-fluid">
    <div class="card border-light">
        <div class="container-fluid d-block py-4">
            <nav class="navbar navbar-dark custom" style="background-color: #343a40; padding: 12px 12px; margin: 0 6px;">
                <a class="navbar-brand">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-between align-items-center">
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
<div class="row me-3 ms-2">
    <div class="col-md-4">
        <div class="container-fluid">
            <div class="container mt-4">
                <div class="card bg-white rounded shadow p-2">
                    <div class="card-body">
                        <div>
                            <div class="row">
                                <div class="col text-center mb-2">
                                    <img src="{{asset('assets/uploads/profile/'.$supplier->image)}}" class="rounded-circle img-fluid img-center mb-2" width="130"/>
                                    <h3 class=" mb-4"><strong>{{$supplier->supplierName}}</strong></h3>
                                </div>
                            </div>
                           
                            <div class="row">
                                <label for="" class="mb-2">
                                    <h6><strong>SUPPLIER DETAILS</strong></h6>
                                </label>
                            </div>
                            <div class="row  mb-3">
                                <div class="col-sm-3">
                                <h6 class="mb-0">Mobile</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$supplier->phone}}
                                </div>
                            </div>
                            <div class="row  mb-3">
                                <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$supplier->email}}
                                </div>
                            </div>
                            <div class="row  mb-3">
                                <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$supplier->address1}}, {{$supplier->address1}}, {{$supplier->city}},  {{$supplier->state}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
    <div>
    <div class="container py-4">
        <div class="p-5 bg-white rounded shadow mb-5">
            
            <!-- Rounded tabs -->
            <ul id="myTab" role="tablist" class="nav nav-tabs nav-pills flex-column flex-sm-row text-center bg-light border-0 rounded-nav">
                <li class="nav-item flex-sm-fill">
                    <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" class="nav-link border-0 text-uppercase font-weight-bold active me-2 ms-4">Timeline</a>
                </li>
                <li class="nav-item flex-sm-fill">
                    <a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold me-4 ms-2">Services</a>
                </li>
            </ul>


            <div id="myTabContent" class="tab-content">
                <div id="home" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-2 show active">
                    @if($timelines->count() > 0)
                        @foreach($timelines as $data)
                            <div class="card mb-4 mt-4 shadow-sm">
                                <div class="card-body m-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>{{$data->users->name}}</strong></p>
                                        </div>
                                        <div class="col-md-6 text-md-right">
                                            <i class="small text-muted">Posted: {{$data->created_at}}</i>
                                        </div>
                                    </div>
                                    <p class="text-muted mt-2">What's on your mind?</p>
                                    <p><textarea name="" id="" cols="30" rows="2" class="form-control">{{$data->description}}</textarea></p>
                                    <div class="images text-center">
                                        <div class="row">
                                            <div class="col">
                                                <img src="{{asset('assets/uploads/timelines/'.$data->image_1)}}" width="200px" class="img-fluid rounded mt-2">
                                            </div>
                                            <div class="col">
                                                <img src="{{asset('assets/uploads/timelines/'.$data->image_2)}}" width="200px" class="img-fluid rounded mt-2">
                                            </div>
                                            <div class="col">
                                                <img src="{{asset('assets/uploads/timelines/'.$data->image_3)}}" width="200px" class="img-fluid rounded mt-2">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="comments">
                                    <form action="{{ route('comments.store', ['timeline' => $data->id]) }}" method="post">
                                        @csrf
                                        <label>Comment</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mt-2 mb-2">
                                                    <textarea class="form-control" name="comments" id="comments" placeholder="Leave a comment here" style="height: 100px;"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <button type="submit" class="btn btn-secondary float-md-right">Post Comment</button>
                                            </div>
                                        </div>
                                    </form>
                                    <hr class="mt-3 mb-4">
                                    <p class="mb-3">Comments</p>
                                <div class="bg-light mt-2 p-3 rounded">
                               
                                    @foreach($data->comments as $comment)
                                        <div class="form-floating mt-2">
                                            <textarea class="form-control" name="comments" id="comments" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px; border: none; background-color: #f8f9fa;" readonly>{{ $comment->comments }}</textarea>
                                            <label for="floatingTextarea2" class="d-block "><strong>{{ $comment->user->name }}</strong></label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center mt-4">No timeline post yet</p>
                    @endif
                </div>

                {{-- Promo Packages --}}
                <div id="profile" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade">
                    <div class="container">
                        <div class="row mt-5 me-2 ms-3">
                            <h2 style="
                                font-weight:bold;
                                color:rgb(99, 98, 98)" class="">Promo Packages</h2>
                           <hr class="me-2" style="height: 2px; border-width: 0; background-color: #343a40; width: 93%; margin: 0 auto; margin-bottom: 20px;">

                            <div class="owl-carousel fproducts-carousel owl-theme">
                                @if($promos->count() > 0)
                                @foreach($promos as $data)
                                <div class="item">
                                    <div class="productData ms-2" id="productData">
                                        {{-- <div class=""> --}}
                                            <div class="food-card">
                                                <div class="food-card_img">
                                                <img src="{{asset('assets/uploads/services/'.$data->image)}}" alt="product image" class="py-1 m-auto">
                                                    <!-- <a href="#!"><i class="far fa-heart"></i></a> -->
                                                </div>
                                                <div class="food-card_content">
                                                    <div class="food-card_title-section">
                                                        <h5 class="food-card_title">{{$data->name}}</h5>
                                                        <p class="food-card_author">{{$data->category->name}}</p>
                                                    </div>
                                                    <div class="food-card_bottom-section">
                                                        <hr style="margin-top: -20px;">
                                                        <div class="space-between">
                                                            <div class="food-card_price">
                                                                <span>&#8369; {{number_format($data->selling_price,2)}}</span>
                                                            </div>
                                                           <button type="button" class="btn btn-sm text-dark addtoCart" id="addtoCart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            {{-- </div>   --}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <p class="text-center mt-4">No promo yet</p>
                                @endif
                            </div>
                        </div>

                        
                 <div class="py-3">
                        <div class="container">
                            <div class="row">
                                <h2 style="
                                    font-weight:bold;
                                    color:rgb(99, 98, 98)" class="">Services</h2>
                           <hr class="me-2" style="height: 2px; border-width: 0; background-color: #343a40; width: 93%; margin: 0 auto; margin-bottom: 20px;">
                                <div class="owl-carousel fproducts-carousel owl-theme">
                                    @if($products->count() > 0)
                                        @foreach($products as $item)
                                        <div class="item">
                                        <div class="food-card productData ms-2" id="productData">
                                                <input type="hidden" value="{{$item->id}}" class="prod_id">
                                                <input type="hidden" value="1" name="input_qty" class="input_qty">
                                                <div class="food-card_img">
                                                <img src="{{asset('assets/uploads/services/'.$item->image)}}" alt="product image" class="py-1 m-auto">
                                                    <!-- <a href="#!"><i class="far fa-heart"></i></a> -->
                                                </div>
                                                <div class="food-card_content">
                                                    <div class="food-card_title-section">
                                                        <p class="food-card_title">{{$item->name}}</p>
                                                        <p class="food-card_author"> {{$item->category->name}}</p>
                                                    </div>
                                                    <div class="food-card_bottom-section">
                                                        <hr style="margin-top: -20px;">
                                                        <div class="space-between">
                                                            <div class="food-card_price">
                                                                <span>&#8369; {{number_format($item->selling_price,2)}}</span>
                                                            </div>
                                                            <div class="pull-right">
                                                                <button type="button" class="btn btn-sm text-dark addtoCart" id="addtoCart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                        @endforeach
                                    @else
                                    <p class="text-center mt-4">No services yet</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>

@endsection
@section('scripts')                                                                                                     
    <script>
        $('.fproducts-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            items: 6,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3  
                }
            },
            navText: ["<i class='bi bi-chevron-left' style='font-size: 2rem;'></i>", "<i class='bi bi-chevron-right' style='font-size: 2rem'></i>"]
        });
    </script>
@endsection

