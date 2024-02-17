@extends('layouts.frontend')
@section('title')
Order View
@endsection


@section('content')
<style>
    .bs4-order-tracking{
        margin-bottom: 30px;
        overflow: hidden;
        color: #878788;
        padding-left: 0px;
        margin-top: 30px
        }
    .bs4-order-tracking li{
        list-style-type: none;
        font-size: 13px;
        width: 25%;
        float: left;
        position: relative;
        font-weight: 400;
        color: #878788;
        text-align: center
            
    }
    .bs4-order-tracking li:first-child:before{
        margin-left: 15px !important;
        padding-left: 11px !important;
        text-align : left !important
    }
    .bs4-order-tracking li:last-child:before{
        margin-right: 5px !important;
        padding-right: 11px !important;
        text-align : right !important
        
    }
    .bs4-order-tracking li>div{
        color: #fff;
        width: 29px;
        text-align: center;
        line-height: 29px;
        display: block;
        font-size: 12px;
        background: #878788;
        border-radius: 50%;
        margin: auto
    }
        
    .bs4-order-tracking li:after{
        content: '';
        width: 150%;
        height: 2px;
        background: #878788;
        position: absolute;
        left: 0%;
        right: 0%;
        top: 15px;
        z-index: -1
        }
    .bs4-order-tracking li:first-child:after{
        left: 50%
            
        }
    .bs4-order-tracking li:last-child:after{
        left: 0%!important;
        width: 0% !important
        }
    .bs4-order-tracking li.active{
        font-weight: bold;
        color: #dc3545
        }
    .bs4-order-tracking li.active>div{
        background: #dc3545
        }
    .bs4-order-tracking li.active:after{
        background: #dc3545
        }
    .card-timeline{
        background-color: #fff;
        z-index: 0
        }
        #myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
<div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h4 class="text-white"> Bookings View
                        <a href="{{ url('orders') }}" class="btn btn-warning float-end">Back</a>
                        </h4>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>First Name</label>
                                <div class="border p-2">{{$orders->fname}}</div>
                                <label>Last Name</label>
                                <div class="border p-2">{{$orders->lname}}</div>
                                <label>Email</label>
                                <div class="border p-2">{{$orders->email}}</div>
                                <label>Contact Number</label>
                                <div class="border p-2">{{$orders->phone}}</div>
                                <label>Address</label>
                                <div class="border p-2">
                                    {{$orders->address1}},
                                    {{$orders->address2}},
                                    {{$orders->city}},
                                    {{$orders->state}}
                                </div>
                                <label>Zip Code</label>
                                <div class="border p-2">{{$orders->pincode}}</div>
                            </div>
                            <div class="col-md-6 ">
                                <div clas="table table-responsive">
                                <table class="table table-bordered">
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
                                                    <img src="{{asset('assets/uploads/services/'.$order->products->image)}}" width="50px" alt="Product Image">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col">
                                        Date:{{$orders->dateofevent}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        Time:{{$orders->timeofevent}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <h5>Payment Mode: <span class="badge badge-info">{{$orders->payment_method}}</span></h5>
                                        <h4>Grand Total:{{number_format($orders->total_price,2)}}</h4>
                                    </div>
                                    <div class="col" id="imgPop">
                                        <strong>Proof of Payment</strong>
                                        <img src= "{{asset('assets/uploads/paymentimage/'.$orders->image)}}" width="200px" id="myImg">
                                        <div id="myModal" class="modal">
                                            <span class="close">&times;</span>
                                            <img class="modal-content" id="img01">
                                            <div id="caption"></div>
                                        </div>
                                    </div>
                                    
                                </div>
                                    <div class="mt-3">
                                        <label>Order Status</label>
                                            <form action="{{url('update-OrderStatus/'.$orders->id)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <select class="form-select" aria-label="Default select" name="status">
                                                    <option value="Ordered Placed">Book Placed</option>
                                                    <option value="Verified">Verified</option>
                                                    <option value="Done">Done</option>
                                                    <option value="Cancelled">Cancelled</option>
                                                    <!-- <option  value="0" {{ $orders->status =='0'? 'selected':'' }}  >Pending</option>
                                                    <option value="1" {{ $orders->status =='1'? 'selected':'' }}  >Completed</option> -->
                                                </select>
                                                <div class="mt-2">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- <div class="card">
                            <div class="card-header">
                                <h5>Shipping Details</h5>
                            </div>
                            <div class="card-body">
                                BOOKING TRACKING NUMBER :<br><h5><span class="badge badge-warning">{{$orders->trackingNumber}}</span></h5>
                                <hr>
                                <div>
                                    Status <span class="badge badge-primary">{{$orders->status}}</span>
                                </div>
                                <div class="card card-timeline px-2 border-none"> 
                                    <ul class="bs4-order-tracking"> 
                                        @if($orders->status == 'Ordered Placed')
                                        <li class="step active"> 
                                        <div>
                                            <i class="fas fa-user"></i>
                                        </div> Book Placed 
                                        </li> 
                                        <li class="step"> 
                                        <div><i class="fas fa-bread-slice"></i></div> For
                                        </li>
                                        <li class="step"> 
                                            <div><i class="fas fa-truck"></i></div> Delivered 
                                        </li>
                                        <li class="step"> 
                                            <div><i class="fas fa-birthday-cake"></i></div> Cancelled 
                                        </li>  
                                        @elseif($orders->status == 'In Transit')
                                        <li class="step active"> 
                                        <div>
                                            <i class="fas fa-user"></i>
                                        </div> Order Placed 
                                        </li> 
                                        <li class="step active"> 
                                        <div><i class="fas fa-bread-slice"></i></div> In transit 
                                        </li> 
                                        <li class="step"> 
                                            <div><i class="fas fa-truck"></i></div> Delivered 
                                        </li> 
                                        <li class="step"> 
                                            <div><i class="fas fa-birthday-cake"></i></div> Cancelled 
                                        </li> 
                                        @elseif($orders->status == 'Delivered')
                                        <li class="step active"> 
                                        <div>
                                            <i class="fas fa-user"></i>
                                        </div> Order Placed 
                                        </li> 
                                        <li class="step active"> 
                                        <div><i class="fas fa-bread-slice"></i></div> In transit 
                                        </li> 
                                        <li class="step active"> 
                                            <div><i class="fas fa-truck"></i></div> Delivered 
                                        </li>
                                        <li class="step"> 
                                            <div><i class="fas fa-birthday-cake"></i></div> Cancelled 
                                        </li>  
                                        @elseif($orders->status == 'Cancelled')
                                        <li class="step active"> 
                                        <div>
                                            <i class="fas fa-user"></i>
                                        </div> Order Placed 
                                        </li> 
                                        <li class="step active"> 
                                        <div><i class="fas fa-bread-slice"></i></div> In transit 
                                        </li> 
                                        <li class="step active"> 
                                            <div><i class="fas fa-truck"></i></div> Delivered 
                                        </li>
                                        <li class="step active"> 
                                            <div><i class="fas fa-birthday-cake"></i></div> Cancelled 
                                        </li> 
                                        @endif
                                    </ul>
                                  
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
            </div> -->
        </div>
    </div>
    <script>
     $(function() {
		$('.pop').on('click', function() {
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal').modal('show');   
		});		
});
    </script>

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
@endsection