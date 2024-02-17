@extends('layouts.sample')
@section('title', 'Calendar')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Event Status Legend</h4>
                        </div>
                        <div id="calendar"></div>
                        <div class="legend text-light">
                            <span class="badge bg-secondary">Book Placed</span>
                            <span class="badge bg-warning">Verified</span>
                            <span class="badge bg-success">Done</span>
                            <span class="badge bg-danger">Cancelled</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">Event Details</h5>
            </div>
            <div class="modal-body" id="orderModalBody"></div>
        </div>
    </div>
</div>

@endsection