@extends('layouts.sample')
@section('title', 'Timeline')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title">My Timeline</h4>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Post</button>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach($timelines as $data)
                        <div class="card shadow-sm mb-5">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">Description</h5>
                                    <p class="text-muted">{{$data->created_at}}</p>
                                </div>
                                <p class="description">{{$data->description}}</p>
                                <h5 class="card-title mt-5">Images</h5>
                                <div class="images mb-2 text-center">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{asset('assets/uploads/timelines/'.$data->image_1)}}" class="img-fluid" alt="image_1">
                                        </div>
                                        <div class="col-md-4">
                                            <img src="{{asset('assets/uploads/timelines/'.$data->image_2)}}" class="img-fluid" alt="image_2">
                                        </div>
                                        <div class="col-md-4">
                                            <img src="{{asset('assets/uploads/timelines/'.$data->image_3)}}" class="img-fluid" alt="image_3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <a href="{{route('timelines.edit', $data->id)}}" class="btn btn-sm btn-success mr-1">Edit</a>
                                <a href="{{route('timelines.destroy', $data->id)}}" class="btn btn-sm btn-danger">Delete</a>
                            </div>                            
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main-panel ends -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Timeline</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('timelines.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="image_1">Image 1</label>
                        <input type="file" name="image_1" id="image_1" class="form-control-file" required>
                    </div>
                    <div class="form-group">
                        <label for="image_2">Image 2</label>
                        <input type="file" name="image_2" id="image_2" class="form-control-file" required>
                    </div>
                    <div class="form-group">
                        <label for="image_3">Image 3</label>
                        <input type="file" name="image_3" id="image_3" class="form-control-file" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .description {
        text-indent: 20px;
    }
</style>

@endsection


