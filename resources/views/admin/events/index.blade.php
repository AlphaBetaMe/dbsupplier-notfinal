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
<script>
    $(document).ready(function($) {
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: [
                @foreach($events as $event) {
                    title: '{{ $event->products->name }}',
                    start: '{{ $event->dateofevent }}',
                    orderId: '{{ $event->orders->id }}',
                    description: '{{ $event->orders->fname }} {{ $event->orders->lname }}',
                    status: '{{ $event->orders->status }}',
                    time: '{{ $event->timeofevent }}',
                    eventType: '{{ $event->typeofevent }}'
                },
                @endforeach
            ],
            eventClick: function(calEvent, jsEvent, view) {
                console.log('Event clicked:', calEvent);
                $('#orderModalLabel').text('Event Details');
                $('#orderModalBody').html('<p>Title: ' + calEvent.title + '</p>' +
                    '<p>Time: ' + calEvent.time + '</p>' +
                    '<p>Date: ' + moment(calEvent.start).format('MMMM D, YYYY') + '</p>' +
                    '<p>Client Name: ' + calEvent.description + '</p>' +
                    '<p>Status: ' + calEvent.status + '</p>' +
                    '<p>Event Type: ' + calEvent.eventType + '</p>'
                );

                $.ajax({
                    url: '/orders/' + calEvent.orderId,
                    type: 'GET',
                    success: function(data) {
                        $('#orderModalBody').append('<p>Additional Detail: ' + data.trackingNumber + '</p>');
                    },
                    error: function(error) {
                        console.error('Error fetching order details:', error);
                    }
                });

                $('#orderModal').modal('show');
            },
            eventRender: function(event, element) {
                var backgroundColor = '';

                switch (event.status) {
                    case 'Cancelled':
                        backgroundColor = 'red';
                        break;
                    case 'Done':
                        backgroundColor = 'green';
                        break;
                    case 'Verified':
                        backgroundColor = 'yellow';
                        break;
                    default:
                        backgroundColor = 'gray';
                        break;
                }

                element.css('background-color', backgroundColor);
                element.css('border-color', 'dark' + backgroundColor);
                element.css('font-size', '18px');
                element.css('color', 'black');
            }
        });
    });
</script>
@endsection