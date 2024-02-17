@extends('layouts.sample')

@section('content')
<style>
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #D2E0FB;
    }
    .btn-primary,
    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary:focus,
    a.btn-primary,
    a.btn-primary:hover,
    a.btn-primary:active,
    a.btn-primary:focus {
        background-color: #000000;
        border-color: #6D5B00000030000006;
        color: #fff; /* Set text color to white or any other color that contrasts well with the background */
    }

    .btn-success,
    .btn-success:hover,
    .btn-success:active,
    .btn-success:focus,
    a.btn-success,
    .a.btn-success:hover,
    .a.btn-success:active,
    .a.btn-success:focus {
        background-color: #000000;
        border-color: #000000;
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
        background-color: #000000;
        border-color: #000000;
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
        background-color: #000000;
        border-color: #000000;
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
        background-color: #000000;
        border-color: #000000;
        color: #fff; /* Set text color to white or any other color that contrasts well with the background */
    }
</style>
<div class="container-fluid">
<div class="mt-2 py-2">
    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif
</div>
</div>



<div class="container-fluid mt-2 py2">
    <div class="card">
        <div class="card-header">
            Manage My Services
           <a href="{{route('products.create')}}" class="btn btn-success float-end">Add Services</a>
        </div>
        <form method="GET">
            <div class="input-group py-2 px-2 mb-3">
                <input
                    type="text"
                    name="search"
                    value="{{ request()->get('search') }}"
                    class="form-control"
                    placeholder="Search..."
                    aria-label="Search"
                    aria-describedby="button-addon2">
                <button class="btn btn-success" type="submit" id="button-addon2">Search</button>
                <a href="{{ route('products.index')}}" class="btn btn-info">Refresh</a>
            </div>
        </form>
        <form action ="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <!--  -->
                <hr>
                <div class="table table-responsive text-center">
                    <table class="table table-hover table-bordered table-condensed">
                        <tr>
                            <thead>
                                
                               
                               
                                <th>Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Discount</th>
                              
                                <th>Status</th>
                                <th>Image</th>
                                <th width="200px">Action</th>
                            </thead>
                        </tr>
                        @foreach($services as $product)
                        <tr>
                         
                           
                            <td>{{$product->name}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->description}}</td>
                            <!--<td>{{ number_format($product->orig_price, 2, '.',',')}}</td>-->
                            <td>{{number_format($product->selling_price, 2, '.', ',')}}</td>
                           <td>{{$product->discount}}</td>
                           
                            <td>
                                @if($product->status == '0')
                                    <span class="badge badge-success">Publish</span>
                               @else
                                    <span class="badge badge-danger">Not Publish</span>
                               @endif
                              </td>
                            <td><img src= "{{asset('assets/uploads/services/'.$product->image)}}" width="200px"></td>
                             
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                
                                    <a href="{{ route('products.edit', $product->id)}}" class ="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ route('products.destroy', $product->id)}}" class = "btn btn-danger btn-sm">Delete</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </form>
        
    </div>
</div>
@endsection
