@extends('layouts.sample')
@section('content')

<div class="py-12 mx-3 m-4">
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
</div>

<div class="py-12 mx-3 m-4">
    {!! Form::model($projects, ['method' => 'PATCH','route' => ['projects.update', $projects->id]]) !!}
    <div class="card">
        <div class="card-header">
            <div class="pull-left">
                <h4>EDIT PROJECT DETAILS</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label>Project ID</label>
                        <input type="text" name="projectId" value="{{$projects->projectId}}" class="form-control" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Project Name</label>
                        <input type="text" name="projectName" value="{{$projects->projectName}}" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Project Details</label>
                        <input type="textarea" name="projectDetails" value="{{$projects->projectDetails}}" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Project Price</label>
                        <input type="text" name="projectPrice" value="{{$projects->projectPrice}}" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Project Lead</label>
                        <input type="text" name="user_id" value="{{$projects->user_id}}" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Project Start</label>
                        <input type="date" name="projectStart" value="{{$projects->projectStart}}" class="form-control">
                    </div>
                    <div class="col">
                        <label>Project End</label>
                        <input type="date" name="projectEnd" value="{{$projects->projectEnd}}" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Project Status</label>
                        <input type="text" name="projectStatus" value="{{$projects->projectStatus}}" class="form-control">
                    </div>
                </div>
                <hr>
                
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class ="btn btn-danger" href = "{{route('projects.index')}}">Cancel</a>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection