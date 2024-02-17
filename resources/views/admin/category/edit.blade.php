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
<div class="mt-2 py-2">
    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif
</div>

<div class="container-fluid mt-2 py2">
    <div class="card">
        <div class="card-header">
            Manage Categories - Edit
        </div>
        <form action ="{{ route('category.update', $categories->id)}}" method="post" enctype="multipart/form-data">
            @csrf
           @method('PUT')
            <div class="card-body">
                <div class ="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Name</label>
                            <input type="text" name = "name" value="{{$categories->name}}"class="form-control">
                        </div>
                        <div class="col">
                            <label>Slug</label>
                            <input type="text" name ="slug" value="{{$categories->slug}}" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Description</label>
                            <textarea name="description" name="description" id="" cols="30" rows="5" class="form-control">{{$categories->description}}</textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <input type ="checkbox" name="status" {{ $categories->status == "1" ? 'checked':'' }}/>
                            <label for="">Status<i>(undisplay the category)</label>
                        </div>
                        <div class="col">
                            <input type ="checkbox" name="popular"  {{$categories->popular == "1" ? 'checked':''}}/>
                            <label for="">Popular</label>
                        </div>
                    </div>
                    <hr>
                    <!-- <div class="row">
                        <div class="col">
                            <label>Meta Title</label>
                            <textarea name="meta_title" id=""
                            
                            cols="30" rows="5"  class="form-control" >{{$categories->meta_title}}</textarea>
                        </div>
                        <div class="col">
                            <label>Meta Description</label>
                            <textarea name="meta_description" id="" cols="30" rows="5" class="form-control">{{$categories->meta_description}}</textarea>
                        </div>
                        <div class="col">
                            <label>Meta Keywords</label>
                            <textarea name="meta_keywords" id="" cols="30" rows="5" class="form-control">{{$categories->meta_keywords}}</textarea>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col">
                            <label for="">Category Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <br>
                    <img src ="{{asset('assets/uploads/category/'.$categories->image)}}" width="250px">
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
