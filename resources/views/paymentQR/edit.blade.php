@extends('layouts.sample')
@section('title', 'Update Payment Methods')
@section('content')
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Payment Methods</h4>
                  {{-- <p class="card-description">
                    Update Payment Details
                  </p> --}}
                  <form action ="{{ route('paymentQR.update', $qrs->id)}}" method="post" enctype="multipart/form-data">
                      @method('PUT')
                      @csrf
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Account Name</label>
                            <input type="text" class="form-control" name="name" value="{{$qrs->name}}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Number</label>
                            <input type="text" class="form-control" name="number" value="{{$qrs->number}}">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Payment Type</label>
                            <input type="text" class="form-control" name="payment_type" value="{{$qrs->payment_type}}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="mb-2">Image</label>
                            <img class="mt-4" src = "{{ asset('assets/uploads/payments/'.$qrs->image) }}" width ="500px" height="350px">
                            <input type="file" class="form-control mt-2" name="image">
                          </div>
                        </div>
                      </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    {{-- <button class="btn btn-light">Cancel</button> --}}
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- main-panel ends -->
@endsection