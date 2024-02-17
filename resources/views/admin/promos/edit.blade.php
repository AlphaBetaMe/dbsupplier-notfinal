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
<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            <h3>Edit Coupon</h3>
        </div>
        <form action="{{route('promos.update', $promos->id)}}" method="post">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <label for="">Coupon Code</label>
                        <input type="text" name="code" value="{{$promos->code}}" class="form-control" readonly>
                    </div>
                    <div class="col">
                        <label for="">Value</label>
                        <input type="text" name="value" value="{{$promos->value}}" class="form-control">
                    </div>
                </div>
                <!--<div class="row mt-3">-->
                <!--    <div class="col">-->
                <!--        <label for="">Status</label>-->
                <!--        <select class="form-select" name="status">-->
                <!--            <option>{{$promos->status}}</option>-->
                <!--            <option value="Available">Available</option>-->
                <!--            <option value="unavailable">Unavailable</option>-->
                <!--        </select>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-sm">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection