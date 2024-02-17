@extends('layouts.sample')
@section('title', 'Create Payment Methods')
@section('content')
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create Payment Methods</h4>
                  {{-- <p class="card-description">
                    Payment Details
                  </p> --}}
                  <form action="{{ route('paymentQR.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Account Name</label>
                            <input type="text" class="form-control" name="name">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Number</label>
                            <input type="text" class="form-control" name="number">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Payment Type</label>
                            <input type="text" class="form-control" name="payment_type">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image">
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