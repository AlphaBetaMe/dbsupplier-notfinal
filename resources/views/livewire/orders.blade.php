
<div class="mt-2 py-2">

@if($message = Session::get('message'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif


   
        <div class="row">
            <div class="col-md-9">
                <div class="card shadow-sm">
                    
                    <div class="card-header">
                        POS | Cashier Panel View <br>

                    </div>

                    <div class="card-body">
                        
                        <form wire:submit.prevent="InsertProd">
                            <div class="mb-2">
                                <input type="text" wire:submit.prevent ="prod_code" wire:model="prod_code" class="form-control" placeholder="Scan/Enter Product Code.." autofocus>
                                <label>Select Product</label>
                                <select name="pro_code" wire:submit ="pro_code" wire:model="prod_code" class="form-select">
                                    <option>Choose product...</option>
                                    @foreach($products as $product)
                                    <option value="{{$product->prod_code}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- <div class="alert alert-success">{{$message}}</div> -->
                        </form>
                        @if(session()->has('info'))
                        <div class="alert alert-info">
                            {{ session('info') }}
                        </div>
                        @elseif(session()->has('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                        @elseif(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error')}}
                        </div>
                        @endif
                       
                        <div class="table table-responsive">
                          
                            <table class="table table-bordered table-hover">
                                
                                    <tr>

                                        <thead>
                                            <th>#</th>
                                            <!-- <th>Product Code</th> -->
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <!--<th>Discount (%)</th>-->
                                            <th colspan="6">Total</th>
                                            <!-- <th><a  href="#" class="btn btn-sm btn-success addbutton rounded-circle"><i class="fa fa-plus-circle"></i></a></th> -->
                                        </thead>
                                    </tr>
                        
                                <tbody class="addProduct">
                                    @foreach($productIncart as $key=> $cart)
                                    <tr>
                                        <td class="no">{{$key + 1}}</td>
                                        <td width="25%">
                                            <input type="text" value="{{$cart->product->name}}" class="form-control" name="" id="">
                                        </td>
                                        <td width="15%">
                                            <div class="row text-center">
                                                <!-- <div class="col-md-1 text-center">
                                                    <label for="" class="text-center"></label> -->
                                                    
                                                    <!-- <span class="" id="prod_qty">{{$cart->prod_qty}}</span> -->
                                                <!-- </div> -->
                                                <div class="col-md-2">
                                                    <button wire:click.prevent="subQuantity( {{$cart->id}} )" class="btn btn-sm btn-danger">-</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="prod_qty" class="form-control" value="{{$cart->prod_qty}}" id="prod_qty">
                                                </div>
                                                <div class="col-md-2">
                                                    <button wire:click.prevent="addQuantity( {{$cart->id}} )" class="btn btn-sm btn-success">+</button>
                                                </div>
                                            </div>    
                                        </td>
                                        <td>
                                            <input type="number" name="posPrice[]" id="posPrice" class="form-control posPrice" value="{{$cart->product->selling_price}}">
                                        </td>
                                        <td>
                                            <input type="hidden" name="posDiscount[]" id="posDiscount" class="form-control posDiscount" value="{{$cart->product->discount}}">
                                        </td>
                                         @php $total = 0 @endphp
                                         @php $total += $cart->prod_qty * $cart->product->selling_price @endphp
                                         
                                         @php $subtotal = 0 @endphp
                                         @php $subtotal += $total/100 * $cart->product->discount @endphp
                                         
                                        <td>
                                            <input type="number" name="posTotal_amount[]" id="posTotal" class="form-control totalVal" value="{{$total - $subtotal}}">
                                        </td>
                                        <td> 
                                            <a  href="" class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times" wire:click.prevent="removeProd( {{ $cart->id }} )"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-3">
               

                {!! Form::open(['route' => 'pos.store', 'method' => 'POST', 'onsubmit' => 'return confirmSubmit()']) !!}

                    @csrf
                    @foreach($productIncart as $key=> $cart)
                        <input type="hidden" value="{{$cart->product->id}}" class="form-control" name="product_id[]">
                        <input type="hidden" value="{{$cart->product->name}}" class="form-control" name="product_name[]">
                        <input type="hidden" name="posQuantity[]" value="{{$cart->prod_qty}}">
                        <input type="hidden" name="posPrice[]"  class="form-control posPrice" value="{{$cart->product->selling_price}}">
                        <input type="hidden" name="posDiscount[]"  class="form-control posDiscount" value="{{$cart->product->discount}}">
                        <input type="hidden" name="posTotal_amount[]" class="form-control totalVal" value="{{$total - $subtotal}}">
                    @endforeach
                    <div class="card shadow-sm px-2">
                        <div class="card-header">
                            <h5>Total: <b class="total">{{$productIncart->sum('product_price')}}</b></h5>
                            <input type="hidden" name="transaction_amount" value="{{$productIncart->sum('product_price')}}">
                        </div>
                        <div class="card-body px-2">
                            <!-- <div class="btn-group">
                                <button type="button" 
                                onclick="PrintReceiptContent('print')" 
                                class="btn btn-dark"><i class="fa fa-print"></i> Print Receipt
                                </button>
                            </div> -->
                            <div class="panel">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Customer Name</label>
                                            <input type="text" name="customerName" id="" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Phone Number</label>
                                            <input type="text" name="customerContact" id="" class="form-control" required>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <br>
                        <h3 class="text-center">Payment Method</h3>
                        <td>
                            <span class="radio-item px-2">
                                <input type="radio" name="paymentMethod" id="paymentMethod" class="true" value="cash" checked="checked">
                                <label>Cash</label>
                            </span>
                        </td>
                        <td>
                            <Label>Other Payment Method</Label>
                            <select name ="paymentMethod" class="form-select">
                                <option value="">--Select--</option>
                                @foreach($qrs as $qr)
                                <option value="{{$qr->payment_type}}">{{$qr->payment_type}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <label>Payment amount</label>
                            <input type="text" wire:model ="payment" class="form-control" name="payment" id="payment" required onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">
                            <!-- @error('payment') <span class="error">{{ $message }}</span> @enderror -->
                        </td>
                        <td>
                            <label>Change amount</label>
                            <input type="text" wire:model="change" class="form-control" name="change" id="change" required>
                            @error('change') <span class="error">{{ $message }}</span> @enderror
                        </td>
                        <hr>
                        <div class="row mb-2">
                        <div class="col">
                        <form onSubmit="if(!confirm('Is the form filled out correctly?')){return false;}">
                        <input type="submit" />
                        </form>


                        <!-- <button type="submit" class="btn btn-primary btn-block" >Submit</button> -->
                        </div>

                        </div>
                    </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
    
    <!-- Modal -->
<script>
    function confirmSubmit() {
    var result = confirm("Are you sure you want to finish this transaction?");
    if (result) {
        return true;
    } else {
        return false;
    }
}
</script>
