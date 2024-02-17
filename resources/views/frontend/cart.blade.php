@extends('layouts.frontend')
@section('title', 'My Cart')
@section('content')
{{-- <div class="container mt-3">
    <div class="card">
        <div class="card-body">
            <h3>My Cart</h3>
        </div>
    </div>
</div> --}} 

<h1 class="fw-bold text-center mt-5" style="color: #343a40">My Cart</h1>

<!-- Display flash messages -->
@if(session('success'))
    <div class="alert alert-success" style="margin: 0 110px;">
        {{ session('success') }}
    </div>
@elseif(session('error'))
    <div class="alert alert-danger" style="margin: 0 110px;">
        {{ session('error') }}
    </div>
@endif

<div class="container my-4">
    <div class="card shadow-sm productData">
        @if($carts->count()>0)
        <div class="card-body">
            @php $total = 0; @endphp

            <div class="table-responsive">
                <table class="table text-center mt-2">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Image</th>
                            <th>Supplier</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carts as $cart)
                            <tr class="productData text-center">
                                <td>
                                    <input class="form-check-input changeQtyCheckbox mt-4" type="checkbox" name="selected" id="flexCheckDefault">
                                    <input type="hidden" name="prod_id" class="prod_id" value="{{$cart->prod_id}}">
                                </td>
                                <td>
                                    <img src="{{asset('assets/uploads/services/'.$cart->products->image)}}" height="70px" width="70px" alt="Image Here">
                                </td>
                                <td>
                                    <h6 class="mt-4">{{$cart->products->users->supplierName}}</h6>
                                </td>
                                <td>
                                    <h6 class="mt-4">{{$cart->products->name}}</h6>
                                </td>
                                <td>
                                    <h6 class="price_prod mt-4">&#8369; {{number_format($cart->products->selling_price, 2)}}</h6>
                                </td>
                                <td>
                                    <div class="input-group mx-auto" style="width:130px; margin-top:14px;">
                                        <button class="input-group-text changeQty decrement-button">-</button>
                                        <input type="text" name="quantity" value="{{$cart->prod_qty}}" class="form-control input-qty text-center"/>
                                        <input type="hidden" name="" class="prodprice" value="{{$cart->products->selling_price}}">
                                        <button class="input-group-text changeQty increment-button">+</button>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="total_price mt-4">&#8369; {{number_format($cart->products->selling_price * $cart->prod_qty, 2)}}</h6>
                                </td>
                                <td>
                                    <form action="{{ route('cart.remove', ['id' => $cart->id, 'prod_id' => $cart->prod_id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mt-3"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                    
                                </td>
                        
                            </tr>
                            @php $total += $cart->products->selling_price * $cart->prod_qty ; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <span class="container">
                <p class="pull-right mb-0 me-4 fw-bold">Cart Total: &#8369; {{number_format($total,2)}}</p>
            </span>
        </div>
    
        <div class="card-footer d-flex justify-content-between align-items-center flex-wrap">
            <h5 class="mt-2">Total Price: &#8369; <span id="selectedTotal"></span></h5>
            <div>
                <a href="{{url('checkout')}}" class="btn btn-outline-dark ms-2" id="proceedButton" disabled>Proceed Booking</a>
                <a href="{{ url()->previous() }}" class="btn btn-outline-dark ms-2">Back</a>
                {{-- <a href="{{ url('/') }}" class="btn btn-outline-dark ms-2">Home</a> --}}
            </div>
        </div>
        
        @else
        <div class="card-body text-center shadow-sm">
            {{-- <h3>Your Cart is Empty</h3> --}}
            <i class="bi bi-cart-x display-1 text-danger"></i>
            <p class="lead text-muted mt-3">Oops! It seems like your cart is empty.</p>
            <a href="{{url('category')}}" class="btn btn-outline-primary">Continue Shopping</a>
        </div>
        @endif
    </div>
</div>


<script>
    $(document).ready(function() {
        // Handle checkbox change event
        $('input[name="selected"]').change(function() {
            var prodId = $(this).closest('.productData').find('.prod_id').val();
            var isChecked = $(this).prop('checked');

            // Send AJAX request to update the database
            $.ajax({
                type: 'POST',
                url: '/update-cart', // Replace with your update route
                data: {
                    prodId: prodId,
                    isChecked: isChecked,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Handle success (if needed)
                    console.log(response);
                    updateTotalPrice(); // Update total price after the checkbox is changed
                },
                error: function(error) {
                    // Handle error (if needed)
                    console.error('Error updating database:', error);
                }
            });
        });
    });

    $(document).ready(function () {
        // Function to update total price based on selected products
        function updateTotalPrice() {
            var total = 0;

            $('.changeQtyCheckbox:checked').each(function () {
                var $row = $(this).closest('.productData');
                var price = parseFloat($row.find('.prodprice').val());
                var quantity = parseInt($row.find('.input-qty').val());
                total += price * quantity;
            });

            $('#selectedTotal').text(total.toFixed(2));
            // Enable or disable the "Proceed Booking" button based on checkbox status
            $('#proceedButton').prop('disabled', total <= 0);
        }

        // Handle checkbox change event
        $('.changeQtyCheckbox').change(function () {
            updateTotalPrice();
        });

        // Handle quantity change event
        $('.changeQty').click(function () {
            updateTotalPrice();
        });

        // Initial calculation on page load
        updateTotalPrice();
    });
</script>

@endsection
<style>
    .btn.btn-secondary{
        background-color: #343a40;
    }
            
    .btn-secondary:hover{
        background-color: #ffffff !important; 
        color: #000 !important; 
    }
        
    .btn.btn-outline-secondary:hover {
        background-color: #343a40;
    }
    
    .btn.btn-outline-secondary {
        color: #000 !important; 
            
    }
     
    .table-striped tbody tr:nth-of-type(odd) {
        color: #000 !important; 
    }

    .supplier-card {
        width: 100%;
        max-width: 400px; 
        margin: 0 auto;
    }

    .card-body {
        text-align: center;
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
        color: #000; 
    }

    .explore-btn:hover {
        color: #fff !important;
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