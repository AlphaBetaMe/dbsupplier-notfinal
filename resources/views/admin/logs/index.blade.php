@extends('layouts.admin')
@section('title', 'Manage Permissions')
@section('content')
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">User Logs</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">User Logs</li>
          </ol>
        </nav>
      </div>
      <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="get">
                        <div class="form-group">
                            <label>Status</label>
                            <div class="input-group">
                                <input type ="search" name ="search" class="form-control mr-2" placeholder="Search Here ...">
                                   <button class="btn btn-success" type="submit" title="Search Permissions">
                                       <span class="bi bi-search mr-2"></span>Search
                                   </button>
                                   <button class="btn btn-primary ml-2">
                                    <a href="#"><span class="bi bi-arrow-repeat text-light"></span></a>
                                   </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">User Activity</h4>
              {{-- <p class="card-description"> Add class <code>.table</code>
              </p> --}}
              <div class="table-responsive text-center">
                <table class="table mb-4">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Activity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($audit_trails as $audit)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $audit->name}}</td>
                            <td>{{ $audit->created_at}}</td>
                            <td>{{ $audit->activity}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $audit_trails->render() !!}
              </div>
            </div>
          </div>
        </div>
    </div>
</div>


    </div>
@endsection