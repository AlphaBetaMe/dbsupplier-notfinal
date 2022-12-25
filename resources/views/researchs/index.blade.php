@extends('layouts.sample')
@section('content')
<div class="container-fluid">
    <div class="mt-2 py-2">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
    </div>
    <div class="mt-2 py-2">
        @if($errors->any())
        <div class="alert alert-danger">
            <strong>Wwhoops</strong> There were som problems in the inputs!
            <ul>
                @foreach($errors->all as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>

<div class="container-fluid">
    <div class="mt-2 py-2">
        <div class="card">
            <div class="card-header">
                <strong class="lead d-inline">List of Research</strong>
                <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#exampleModal"><span class="bi bi-plus-circle-dotted">&nbsp Add new research</span></button>
                <br><br>
                <form method="GET">
                    <div class="input-group mb-3">
                        <input
                            type="text"
                            name="search"
                            value="{{ request()->get('search') }}"
                            class="form-control"
                            placeholder="Search..."
                            aria-label="Search"
                            aria-describedby="button-addon2">
                        <button class="btn btn-success" type="submit" id="button-addon2">Search</button>
                        <a href="{{ route('researchs.index')}}" class="btn btn-info">Refresh</a>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table table-condense table-bordered table-hover text-center">
                        <tr>
                            <thead>
                                <th>Research Name</th>
                                <th>Description</th>
                                <th>Author/s</th>
                                <th>Status</th>
                                <th>File</th>
                                <th>Action</th>
                            </thead>
                        </tr>
                        @foreach($researchs as $file)
                        <tr>
                            <td>{{$file->researchTitle}}</td>
                            <td>{{$file->researchDescription}}</td>
                            <td>{{$file->author}}</td>
                            <td>{{$file->researchStatus}}</td>
                            <td>{{$file->file}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a href="{{ route('download',$file->file) }}" class="btn btn-info btn-action">Download</a>
                                    <a href="{{ asset('/laraview/#../assets/'.$file->file) }}" class="btn btn-warning btn-action">Preview</a>
                                    <a href="{{route('researchs.edit', $file->id)}}" class="btn btn-success btn-action btn-lock">Edit</a>
                                    <a href="{{route('researchs.destroy', $file->id)}}" class="btn btn-danger btn-action btn-lock">Delete</a>
                                    
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new research</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action ="{{route('researchs.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="researchTitle" class="col-form-label">Research Title:</label>
                        <input type="text" name="researchTitle" required  class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="researchDescription" class="col-form-label">Research Description:</label>
                        <textarea name="researchDescription" id="" cols="30" rows="3" required  class="form-control"></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="author" class="col-form-label">Author:</label>
                        <input type="text" required  name="author" class="form-control">
                    </div>

                    <div class="mb-2">
                        <label for="file" class="col-form-label">File:</label>
                        <input type="file" required  class="form-control" name="file">
                    </div>
                    <div class="mb-2">
                        <label for="status" class="col-form-label">Status:</label>
                        <select name="researchStatus" id="" required class="form-control">
                            <option value="Ongoing">Ongoing</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="meta_title" required class="col-form-label">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title">
                    </div>
                    <div class="mb-2">
                        <label for="" class="col-form-label">Meta Keywords</label>
                        <textarea name="meta_keywords" id="" cols="30" rows="2" required class="form-control"></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="" class="col-form-label">Meta Description</label>
                        <textarea name="meta_description" id="" cols="30" rows="2" required class="form-control"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection