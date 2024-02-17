@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Dashboard </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-sm-6 grid-margin">
          <div class="card">
            <div class="card-body">
              <h5>Total Commision</h5>
              <div class="row">
                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                  <div class="d-flex d-sm-block d-md-flex align-items-center">
                    <h2 class="mb-0">Php {{number_format($commisions,2)}}</h2>
                    {{-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> --}}
                  </div>
                  {{-- <h6 class="text-muted font-weight-normal">11.38% Since last month</h6> --}}
                </div>
                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                  <i class="icon-lg mdi mdi-wallet text-success ml-auto"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 grid-margin">
          <div class="card">
            <div class="card-body">
              <h5>Total Number of User</h5>
              <div class="row">
                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                  <div class="d-flex d-sm-block d-md-flex align-items-center">
                    <h2 class="mb-0">{{$users}}</h2>
                    {{-- <p class="text-success ml-2 mb-0 font-weight-medium">+8.3%</p> --}}
                  </div>
                  {{-- <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6> --}}
                </div>
                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                  <i class="icon-lg mdi mdi-account-group text-danger ml-auto"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Supplier chart</h4>
              <canvas id="supplierPaymentChart" style="height:250px"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
@endsection