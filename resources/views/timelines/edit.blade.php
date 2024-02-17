@extends('layouts.sample')
@section('title', 'Edit Timeline')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title">Edit Timeline</h4>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Post</button>
                        </div>
                        <form action="{{route('timelines.update', $timelines->id)}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" name="description" class="form-control" id="" value="{{$timelines->description}}" required>
                            </div>
                            <div class="form-group">
                                <label for="image_1">Image 1</label>
                                <input type="file" name="image_1" id="image_1" class="form-control-file" required>
                                {{-- {{asset('assets/uploads/timelines/'.$data->image_1)}} --}}
                                {{-- <img src="assets/uploads/timelines/{{$timelines->image_1}}" class="mt-2 img-fluid" width="250px"> --}}
                                <img src="{{ asset('assets/uploads/timelines/'.$timelines->image_1) }}" class="mt-2 mb-2 img-fluid">
                            </div>
                            <div class="form-group">
                                <label for="image_2">Image 2</label>
                                <input type="file" name="image_2" id="image_2" class="form-control-file" required>
                                <img src="{{ asset('assets/uploads/timelines/'.$timelines->image_2) }}" class="mt-2 mb-2 img-fluid">
                            </div>
                            <div class="form-group">
                                <label for="image_3">Image 3</label>
                                <input type="file" name="image_3" id="image_3" class="form-control-file" required>
                                <img src="{{ asset('assets/uploads/timelines/'.$timelines->image_3) }}" class="mt-2 mb-2 img-fluid">
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Comments</h4>
                        @if($timelines->comments->isEmpty())
                        <p class="text-center">No comments available</p>
                        @else
                        @foreach($timelines->comments as $comment)
                        <div class="card mb-3">
                            <div class="card-title">
                                <strong>{{ $comment->user->name }}:</strong>
                            </div>
                            <div class="card-body">
                                {{ $comment->comments }}
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .description {
        text-indent: 20px;
    }
</style>

@endsection
