@extends('layouts.sample')
@section('content')
<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            Supplier Details
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <label for="">Membership Fee</label>
                    <img src= "{{asset('assets/uploads/suppliers/'.$suppliers->membership)}}" width="200px">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form action="{{route('suppliers.update', $suppliers->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <label>Status</label>
                        <select name="status" class="form-select">
                            <option>{{$suppliers->status}}</option>
                            <option value="Verified">Verified</option>
                        </select>
                        <br>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
            <hr>
            <h4>Requirments</h4>
            <div class="table table-responsive">
                <table class="table table-hover table-condense table-bordered">
                    <tr>
                        <td><label for="">Application Form</label></td>
                        <td><a href="{{asset('assets/uploads/suppliers/'.$suppliers->application)}}" class="btn btn-success"><span><i class="bi bi-download"></i>  Download</span></a></td>
                        
                    </tr>
                    <tr>
                        <td><label for="">Business Permit</label></td>
                        <td><a href="{{asset('assets/uploads/suppliers/'.$suppliers->buspermit)}}" class="btn btn-success"><span><i class="bi bi-download"></i>  Download</span></a></td>
                    </tr>
                    <tr>
                        <td><label for="">DTI Certificate</label></td>
                        <td>  <a href="{{asset('assets/uploads/suppliers/'.$suppliers->dticert)}}" class="btn btn-success"><span><i class="bi bi-download"></i>  Download</span></a></td>
                    </tr>
                    <tr>
                        <td><label for="">BIR Permit</label></td>
                        <td><a href="{{asset('assets/uploads/suppliers/'.$suppliers->birpermit)}}" class="btn btn-success"><span><i class="bi bi-download"></i>  Download</span></a></td>
                    </tr>
                    <tr>
                        <td><label for="">Mayors Permit</label></td>
                        <td><a href="{{asset('assets/uploads/suppliers/'.$suppliers->mpermit)}}" class="btn btn-success"><span><i class="bi bi-download"></i>  Download</span></a></td>
                    </tr>
                    <tr>
                        <td><label for="">Barangay Certificate</label></td>
                        <td><a href="{{asset('assets/uploads/suppliers/'.$suppliers->bcert)}}" class="btn btn-success"><span><i class="bi bi-download"></i>  Download</span></a></td>
                    </tr>
                    <tr>
                        <td><label for="">Valid ID</label></td>
                        <td><a href="{{asset('assets/uploads/suppliers/'.$suppliers->valid)}}" class="btn btn-success"><span><i class="bi bi-download"></i>  Download</span></a> </td>
                    </tr>
                    <tr>
                        <td><label for="">ID Picture</label></td>
                        <td><a href="{{asset('assets/uploads/suppliers/'.$suppliers->pic)}}" class="btn btn-success"><span><i class="bi bi-download"></i>  Download</span></a> </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection