@extends('layouts.sample')
@section('title', 'Payment Method Lists')
@section('content')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Payment Methods</h4>
                  {{-- <p class="card-description">
                    Payment Details
                  </p> --}}
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                            <th>Account Name</th>
                            <th>Number</th>
                            <th>Payment Type</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($qrs as $qr)
                        <tr>
                            <td>{{$qr->name}}</td>
                            <td>{{$qr->number}}</td>
                            <td>{{$qr->payment_type}}</td>
                            <td><img src="{{ asset('assets/uploads/payments/'.$qr->image)}}" width="100px"></td>
                            <td>
                                <a href="{{route('paymentQR.edit', $qr->id)}}" class="btn btn-warning btn-sm text-light">Update</a>
                                <a href="{{ route('paymentQR.destroy', $qr->id) }}" class="btn btn-danger btn-sm show-alert-delete-box"
                                    onclick="event.preventDefault();
                                    document.getElementById('delete-form-{{ $qr->id }}').submit();">
                                    Delete
                                </a>
                                <form id="delete-form-{{ $qr->id }}" action="{{ route('paymentQR.destroy', $qr->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- main-panel ends -->
@endsection
