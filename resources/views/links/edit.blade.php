@extends('layouts.sample')
@section('content')
<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            Edit Courier Link
        </div>
        <form action="{{route('links.update', $link->id)}}" method="post">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <input type="text" name="name" class="form-control" value="{{$link->name}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">
                            Paste Link Here:
                        </label>
                        <input type="text" name="url" class="form-control" value="{{$link->url}}">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection