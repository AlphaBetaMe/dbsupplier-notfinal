@extends('layouts.admin')
@section('title', 'Edit Categories')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Manage Categories</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Edit Manage Categories</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Categories</h4>
                        <form action="{{ route('category.update', $categories->id)}}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{$categories->name}}"
                                            class="form-control" placeholder="Enter category name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Slug</label>
                                        <input type="text" name="slug" value="{{$categories->slug}}"
                                            class="form-control" placeholder="Enter category slug">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control"
                                            placeholder="Enter category description"
                                            rows="5">{{$categories->description}}</textarea>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="status"
                                                    {{$categories->status == "1" ? 'checked':''}}>
                                                Status (undisplay the category)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="popular"
                                                    {{$categories->popular == "1" ? 'checked':''}}>
                                                Popular
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6" style="margin-top:70px;">
                                        <label for="">Category Image</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <img src="{{asset('assets/uploads/category/'.$categories->image)}}"  style="width: 300px; height: 250px;">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
