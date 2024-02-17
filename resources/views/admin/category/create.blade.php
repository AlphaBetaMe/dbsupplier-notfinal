@extends('layouts.sample')

@section('content')
<style>
     .btn-success,
    .btn-success:hover,
    .btn-success:active,
    .btn-success:focus,
    .a.btn-success,
    .a.btn-success:hover,
    .a.btn-success:active,
    .a.btn-success:focus {
       background-color: #000000;
        border-color: #000000;
        color: #fff;  /* Set text color to white or any other color that contrasts well with the background */
    }
</style>

<div class="container-fluid mt-2 py2">
    <div class="card">
        <div class="card-header">
            Manage Categories
        </div>
        <form action ="{{ route('category.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class ="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Name<code>*</code></label>
                            <input type="text" name = "name" class="form-control" required>
                        </div>
                        <div class="col">
                            <label>Slug<code>*</code></label>
                            <input type="text" name ="slug" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Description<code>*</code></label>
                            <textarea name="description" name="description" id="" cols="30" rows="5" class="form-control" required></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <input type ="checkbox"class="" name="status">
                            <label for="">Status<i>(undisplay the category)</i></label>
                        </div>
                        <div class="col">
                            <input type ="checkbox"class="" name="popular ">
                            <label for="">Popular</label>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <label for="">Category Image<code>*</code></label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </form>
    </div>
</div>
@endsection
