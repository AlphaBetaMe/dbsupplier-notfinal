@extends('layouts.admin')
@section('title', 'Supplier List')
@section('content')
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Manage Supplier </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            {{-- <li class="breadcrumb-item"><a href="#">Manage Supplier</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">Supplier Details</li>
          </ol>
        </nav>
      </div>
      <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col mb-3">
                    <label for="">Membership Fee</label>
                    <img src= "{{ asset('assets/uploads/suppliers/'.$suppliers->membership)}}" width="200px">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ url('admin/suppliers/update', $suppliers->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Status</label>
                            <div class="input-group">
                                <select class="form-control" name="status">
                                    <option>{{$suppliers->status}}</option>
                                    <option value="Verified">Verified</option>
                                </select>
                                <button type="submit" class="btn btn-success ml-2"><i class="bi bi-save"></i>Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Requirements</h4>
              {{-- <p class="card-description"> Add class <code>.table</code>
              </p> --}}
              <div class="table-responsive text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Document</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Application Form</td>
                            <td><a href="{{ asset('assets/uploads/suppliers/'.$suppliers->application)}}" class="btn btn-success"><i class="bi bi-download"></i> Download</a></td>    
                        </tr>
                        <tr>
                            <td>Business Permit</td>
                            <td><a href="{{asset('assets/uploads/suppliers/'.$suppliers->buspermit)}}" class="btn btn-success"><i class="bi bi-download"></i> Download</a></td>
                        </tr>
                        <tr>
                            <td>DTI Certificate</td>
                            <td>  <a href="{{asset('assets/uploads/suppliers/'.$suppliers->dticert)}}" class="btn btn-success"><i class="bi bi-download"></i> Download</a></td>
                        </tr>
                        <tr>
                            <td>BIR Permit</td>
                            <td><a href="{{asset('assets/uploads/suppliers/'.$suppliers->birpermit)}}" class="btn btn-success"><i class="bi bi-download"></i> Download</a></td>
                        </tr>
                        <tr>
                            <td>Mayors Permit</td>
                            <td><a href="{{asset('assets/uploads/suppliers/'.$suppliers->mpermit)}}" class="btn btn-success"><i class="bi bi-download"></i> Download</a></td>
                        </tr>
                        <tr>
                            <td>Barangay Certificate</td>
                            <td><a href="{{asset('assets/uploads/suppliers/'.$suppliers->bcert)}}" class="btn btn-success"><i class="bi bi-download"></i> Download</a></td>
                        </tr>
                        <tr>
                            <td>Valid ID</td>
                            <td><a href="{{asset('assets/uploads/suppliers/'.$suppliers->valid)}}" class="btn btn-success"><i class="bi bi-download"></i> Download</a> </td>
                        </tr>
                        <tr>
                            <td>ID Picture</td>
                            <td><a href="{{asset('assets/uploads/suppliers/'.$suppliers->pic)}}" class="btn btn-success"><i class="bi bi-download"></i> Download</a> </td>
                        </tr>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>


    </div>
@endsection