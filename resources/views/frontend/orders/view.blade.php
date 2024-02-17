@extends('layouts.frontend')
@section('title', 'View Bookings')
@section('content')
<style>
    /* /* .btn.btn-secondary{
        background-color: #343a40;
    } */
            
    /* .btn-secondary:hover{
        background-color: #ffffff !important; 
        color: #000 !important; 
    } */
        
    /* .btn.btn-outline-secondary:hover {
        background-color: #343a40;
    } */
    
    /* .btn.btn-outline-secondary {
        color: #000 !important; 
            
    } */ 
     
    .table-striped tbody tr:nth-of-type(odd) {
        color: #000 !important; 
    }

    .supplier-card {
        width: 100%;
        max-width: 400px; 
        margin: 0 auto;
    }

    .supplier-image {
        width: 150px; 
        height: 150px; 
        object-fit: cover;
        border-radius: 50%; 
        margin-bottom: 1rem;
    }

    .supplier-details {
        text-align: left;
    }

    h4 {
        margin-top: 0;
    }

    .explore-btn {
        width: 100%;
        color: #000 !important; 
        background-color: #fff;
    }

    .explore-btn:hover {
        color: #fff !important;
        background-color: #343a40;
    }

    .navbar {
        margin: 0;
        padding: 8px 20px;    
    }

    .rounded-btn.full-width {
        width: 100%;
        display: block;
    }

    .navbar-nav {
        margin: 0;
    }

    .nav-link {
        text-decoration: none !important;
        color: #FFFFFF !important;
        transition: background-color 0.3s ease;
        font-size: 14px;
        padding: 10px;
    }

    #navbarNav {
        margin: 0;
    }

    #aliveLogo {
        margin-bottom: 0;
        margin-top: 0;
        margin-left: 3px;
        margin-right: 0;
    }

    #alive {
        margin-top: 1px;
    }

    .nav-link:hover {
      background-color: #555555;
      border-radius: 5px;
    }

    .rounded-btn {
      border-radius: 5px;
      display: inline-block;
      text-align: center;
      text-decoration: none;
      cursor: pointer;
      background-color: #ffffff;
      color: #000000 !important;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .rounded-btn:hover {
        background-color: grey;
        color: #ffffff !important;
    }

    .square-image {
        width: 100px;
        height: 100px;
        object-fit: cover; 
    }

    .custom {
        margin-left: 6px;
        margin-right: 6px;
    }

    .navbar-toggler {
        transition: background-color 0.3s ease;
    }

    .navbar-toggler:hover {
        background-color: #555555;
    }
</style>
<div class="container mt-5">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold">View Bookings</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label>First Name</label>
                                <div class="border p-2 mb-3">{{$orders->fname}}</div>
                                <label>Last Name</label>
                                <div class="border p-2 mb-3">{{$orders->lname}}</div>
                                <label>Email</label>
                                <div class="border p-2 mb-3">{{$orders->email}}</div>
                                <label>Contact Number</label>
                                <div class="border p-2 mb-3">{{$orders->phone}}</div>
                                <label>Shipping Address</label>
                                <div class="border p-2 mb-3">
                                    {{$orders->address1}},
                                    {{$orders->address2}},
                                    {{$orders->city}},
                                    {{$orders->state}},
                                    {{$orders->country}}
                                </div>
                                <label>Zip Code</label>
                                <div class="border p-2 mb-3">{{$orders->pincode}}</div>
                            </div>
                            <div class="col-md-6">
                                <div clas="table-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders->orderitems as $order)
                                            <tr>
                                                <td>{{$order->products->name}}</td>
                                                <td>{{$order->prod_qty}}</td>
                                                <td>{{$order->price}}</td>
                                                <td>
                                                    <img src="{{asset('assets/uploads/services/'.$order->products->image)}}" height="70px" width="70px" alt="Product Image">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row mt-3 mb-3">
                                    <div class="col">
                                        Date: {{$orders->dateofevent}}
                                    </div>
                                </div>
                                <div class="row mt-3 mb-3">
                                    <div class="col">
                                        Time: {{$orders->timeofevent}}
                                    </div>
                                </div>
                                <div class="mt-3 mb-3">
                                    <h6>Order Tracking Number: <span class="badge badge-warning" style="font-size: 15px;">{{ $orders->trackingNumber }}</span></h6>
                                </div>
                                <div class="row">
                                        <h6>Mode of Payment: <span class="badge badge-info" style="font-size: 15px;">{{$orders->payment_method}}</span></h6>
                                        <h4 class="fw-bold mt-5">Grand Total: &#8369;{{number_format($orders->total_price,2)}}</h4>
                                    </div>
                                    <div class="float-end mb-2 me-3" id="imgPop" style="margin-top: -26%;">
                                        <h6><strong>Proof of Payment</strong></h6>
                                        <img src= "{{asset('assets/uploads/paymentimage/'.$orders->image)}}"  width="200px" id="myImg" class="pop">
                                        <div id="myModal" class="modal">
                                            <span class="close">&times;</span>
                                            <img class="modal-content" id="img01">
                                            <div id="caption"></div>
                                        </div>
                                    </div>
                                </div>       
                                </div>
                                <div class="text-center">
                                   <h5 class="fw-bold">Booking Status: <span class="badge badge-success" style="font-size: 18px;">{{$orders->status}}</span></h5> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
</body>

@endsection