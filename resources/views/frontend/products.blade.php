@extends('layouts.frontend')
@section('title')   
@endsection

@section('content')
<div class="py-4 mb-4 shadow-sm bg-success border-top">
    <div class="container">
        <h6>Collections / {{$category->name }}
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>{{$category->name}}</h2>
            <hr>
            
            @foreach($products as $item)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <a href="{{url('category/'.$category->slug.'/'.$item->slug)}}">
                        <img src ="{{asset('assets/uploads/products/'.$item->image)}}" width="200px" height="250px" alt="product image" class="py-2 m-auto">
                        <div class="card-body">
                            <h3>{{$item->name}}</h3>
                            <span class="float-start">{{$item->selling_price}}</span>
                            <span class="float-end"><s>{{$item->orig_price}}</s></span>
                        </div>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
@endsection