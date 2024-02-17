@extends('layouts.admin')
@section('title', 'Create Categories')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Manage Categories</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Manage Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Category</h4>
                        <form action="{{ route('category.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name">Name<code>*</code></label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="slug">Slug<code>*</code></label>
                                        <input type="text" name="slug" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="description">Description<code>*</code></label>
                                        <textarea name="description" id="description" cols="30" rows="5" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="status" name="status">
                                            <label class="form-check-label" for="status">Status (Hide category)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="popular" name="popular">
                                            <label class="form-check-label" for="popular">Popular</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="image">Category Image<code>*</code></label>
                                        <input type="file" class="form-control" name="image" required>
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
