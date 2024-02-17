@extends('layouts.frontend2')
@section('title', 'Homepage')
@section('content')
    <div class="container-fluid">
        <div class="card border-light">
            <div class="container-fluid d-block py-4">
                <nav class="navbar navbar-dark bg-dark">
                    <a class="navbar-brand" href="#">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{url('category')}}" class="text-white">
                                    Shop
                                </a>
                                &nbsp &nbsp
                            </div>
                            &nbsp &nbsp
                            <a href="{{url('cart')}}" class="position-relative me-1">
                                <i class="text-white bi bi-cart3" style="font-size: 25px;">
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-danger" style="font-size: 10px; margin-top: 10px;">{{$cart}}</span>
                                </i>
                            </a>
                        </div>
                    </a>    
                </nav>
            </div>
        </div>
    </div>

    @include('layouts.inc.slider')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2 style="font-weight: bold; color: #000000;">Promo Packages</h2>
                <hr>
                <div class="owl-carousel fproducts-carousel owl-theme"> 
                    @foreach($promos as $data)
                        <div class="item">
                            <div class="card product-card shadow-sm ms-4">
                                <img src="{{asset('assets/uploads/services/'.$data->image)}}" width="300px" height="250px" alt="product image" class="py-2 m-auto">
                                <div class="card-body">
                                    <h5><strong>{{$data->name}}</strong></h5>
                                    <span class="float-start">Category : {{$data->category->name}}</span>
                                    <span class="float-end">Php {{number_format($data->selling_price,2)}}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2 style="font-weight: bold; color: #000000;">Services</h2>
                <hr >
                <div class="owl-carousel fproducts-carousel owl-theme">
                    @foreach($fproducts as $item)
                        <div class="item">
                            <div class="card product-card shadow-sm ms-4">
                                <img src="{{asset('assets/uploads/services/'.$item->image)}}" width="300px" height="250px" alt="product image" class="py-2 m-auto">
                                <div class="card-body">
                                    <h5><strong>{{$item->name}}</strong></h5>
                                    <span class="float-start">Category : {{$item->category->name}}</span>
                                    <span class="float-end">Php {{number_format($item->selling_price,2)}}</span>
                                    <br>
                                    @if($item->count() < 0 )
                                        <label for="" class="text-primary">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $item->users->rating)
                                                    <i class="fas fa-star"></i>
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                            @endfor
                                        </label>
                                    @else
                                        no reviews
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2 style="font-weight: bold; color: #000000;">Categories</h2>
                <hr>
                <div class="owl-carousel fproducts-carousel owl-theme">
                    @foreach($cat as $item)
                        <div class="item">
                            <a href="{{url('view-category/'.$item->slug)}}">
                                <div class="card product-card ms-4">
                                    <img src="{{asset('assets/uploads/category/'.$item->image)}}" width="300px" height="250px" alt="product image" class="py-2 m-auto">
                                    <div class="card-body" style="color: #000000;">
                                        <h5><strong>{{$item->name}}</strong></h5>
                                        <p>{{$item->description}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
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
            dots: false, // Set dots to false to hide pagination
            items: 10,
            autoplay: true,
            autoplayTimeout: 1500,
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