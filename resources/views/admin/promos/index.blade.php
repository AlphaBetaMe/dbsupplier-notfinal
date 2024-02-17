@extends('layouts.sample')
@section('content')
<style>
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #D2E0FB;
    }
    .btn-primary,
    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary:focus,
    a.btn-primary,
    a.btn-primary:hover,
    a.btn-primary:active,
    a.btn-primary:focus {
        background-color: #000000;
        border-color: #000000;
        color: #fff; /* Set text color to white or any other color that contrasts well with the background */
    }

    .btn-danger,
    .btn-danger:hover,
    .btn-danger:active,
    .btn-danger:focus,
    a.btn-danger,
    .a.btn-danger:hover,
    .a.btn-danger:active,
    .a.btn-danger:focus {
        background-color: #000000;
        border-color: #000000;
        color: #fff; /* Set text color to white or any other color that contrasts well with the background */
    }
</style>
<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            <h3 class="float-start">Event Voucher</h3>
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            + Add Voucher
            </button>
        </div>
        <div class="card-body">
            <div class="table table-responsive">
                <table class="table table-condense table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Code</th>
                            <th>Value</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($promos as $key => $promo)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$promo->code}}</td>
                            <td>{{$promo->value}}</td>
                            <td>
                                @if($promo->status == 'Available')
                                    <span class="badge badge-warning">{{$promo->status}}</span>
                                @else
                                    <span class="badge badge-danger">{{$promo->status}}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('promos.edit', $promo->id)}}" class="btn btn-danger btn-sm">Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['promos.destroy', $promo->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Voucher</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('promos.store')}}" method="Post">
            @csrf
            <div class="row">
                <div class="col">
                    <select name="type" class="form-select">
                        <option>--Select--</option>
                        <option value="Fixed">Fixed</option>
                        <!-- <option value="Percent">Percent</option> -->
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for=""> This is for Fixed Amount</label>
                    <input type ="text" name="value" class="form-control" value="0">
                </div>
                <!-- <div class="col">
                    <label for=""> This is for Percent(%)</label>
                    <input type ="text" name="percent_off" class="form-control" value=0>
                </div> -->
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection