@extends('layouts.sample')
@section('content')
<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            <div class="form-group">
                <h3 class="float-start">Links</h3>
                <a href="{{ route('links.create') }} " class="btn btn-sm btn-primary float-end">+ Create Courier Link</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table table-responsive text-center">
                <table class="table table-condense table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>URL</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($links as $key => $link)
                            <tr>
                               
                                <td>{{ $key+1 }}</td>
                                <td>{{$link->name}}</td>
                                <td><a href="{{ $link->url }}" target="_blank">{{ $link->url }}</a></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('links.edit', $link) }}" class="btn btn-warning">Edit</a>

                                        <form action="{{ route('links.destroy', $link) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection