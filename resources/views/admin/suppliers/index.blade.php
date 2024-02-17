@extends('layouts.admin')
@section('title', 'Supplier List')
@section('content')
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">Manage Supplier</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            {{-- <li class="breadcrumb-item"><a href="#">Manage Supplier</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">Manage Supplier</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Suppliers Data Table</h4>
              <div class="table-responsive">
                <table class="table text-center">
                  <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Membership</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($suppliers as $key => $supplier)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$supplier->users->name}}</td>
                        <td>{{$supplier->users->email}}</td>
                        <td>
                            @if($supplier->users->mstatus == 'Active')
                            <label class="badge badge-success" style="font-size: 75%;line-height: 1;padding: 0.2em 0.4em;">{{$supplier->users->mstatus}}</label>
                            @else
                            <label class="badge badge-danger" style="font-size: 75%;line-height: 1;padding: 0.2em 0.4em;">{{$supplier->users->mstatus}}</label>
                            @endif
                        </td>
                        <td>{{$supplier->payment}}</td>
                        <td>{{$supplier->status}}</td>
                        <td>
                          <a href="{{ url('admin/suppliers/edit', $supplier->id)}}" class="btn btn-primary"><i class="bi bi-eye"></i> View</a>
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
@endsection