@extends('layouts.sample')
@section('title', 'Edit Products')
@section('content')
<div class="main-panel">        
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Products</h4>
                        <form action ="{{ route('products.update', $products->id)}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="cate_id" class="form-control text-dark" required>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Name</label>
                                    <input type="text" name = "name" class="form-control" value="{{$products->name}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Slug</label>
                                        <input type="text" name ="slug" class="form-control"  value="{{$products->slug}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="number" name ="selling_price" class="form-control" value="{{$products->selling_price}}">          
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Discount(%)</label>
                                        <input type="number" name ="discount" class="form-control" value="{{$products->discount}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <div class="form-check ml-5">
                                            <input type ="checkbox"class="" name="status" {{ $products->status == "1" ? 'checked':'' }}>
                                            <span class="text-small">(undisplay the services)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="image">
                                        <img src ="assets/uploads/services/{{$products->image}}" width="250px">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" id="" cols="30" rows="5" class="form-control">{{$products->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            {{-- <button class="btn btn-light">Cancel</button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>
<!-- main-panel ends -->
@endsection
