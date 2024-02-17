@extends('layouts.sample')


@section('content')




<div class="py-12 mx-3 m-4">
    <div class="card">
        <div class="card-header">
            <div class="pull-left">
                <h2>Create New Permission</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('permissions.index') }}"> Back</a>
            </div>
        </div>
        <div class ="card-body">
        {!! Form::open(array('route' => 'permissions.store','method'=>'POST')) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Type new permission:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        {!! Form::close() !!}
        </div>
    </div>
</div>






@endsection