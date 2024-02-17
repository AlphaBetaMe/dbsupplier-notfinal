@extends('layouts.sample')

@section('content')

<div class="container-fluid">
    <div class="mt-2 py-2">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        POS | Cashier Panel View
                    </div>
                    <div class="card-body">
                    <input id="barcodeInput" type="text" autofocus>
                        <div class="table table-responsive">
                            <table class="table table-bordered table-left">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <!-- <th>Product Code</th> -->
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Discount (%)</th>
                                        <th>Total</th>
                                        <th><a  href="#" class="btn btn-sm btn-success addbutton rounded-circle"><i class="fa fa-plus-circle"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody class="addProduct">

                                    <tr>
                                        <td>1</td>
                                        <!-- <td><input type="number" name="prod_code" class="form-control" id="prod-code"></td> -->
                                        <td>
                                            <select name="id[]" id="id" class="form-select product_id">
                                            <option>Select a product</option>
                                            @foreach($products as $product)
                                                <option data-price ="{{$product->selling_price}}"value="{{$product->id}}">{{$product->name}}</option>
                                            @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="posQuantity[]" id="posQuantity" class="form-control posQuantity">
                                        </td>
                                        <td>
                                            <input type="number" name="posPrice[]" id="posPrice" class="form-control posPrice">
                                        </td>
                                        <td>
                                            <input type="number" name="posDiscount[]" id="posDiscount" class="form-control posDiscount">
                                        </td>
                                        <td>
                                            <input type="number" name="posTotal_amount[]" id="posTotal" class="form-control totalVal">
                                        </td>
                                        <td>
                                            <a  href="#" class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5>Total: <b class="total">0.00</b></h5>
                    </div>
                    <div class="card-body">
                        <div class="panel">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Customer Name</label>
                                        <div class="col-md-6">
                                        <input type="text" name="customername" id="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Customer Address</label>
                                        <div class="col-md-6">
                                        <input type="text" name="customeradd" id="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection

@section('script')
<script>
//add row
    $('.addbutton').on('click', function(){
        var posprod = $('.product_id').html();
        var numberofrow = ($('.addProduct tr').length - 0) + 1;
        var tr = '<tr><td class ="no">' + numberofrow + '</td>' + 
                '<td><select class="form-select product_id" name="id[]">' + posprod + '</select></td>' +
                '<td> <input type="number" name="posQuantity[]" class="form-control posQuantity"></td>'+
                '<td> <input type="number" name="posPrice[]" class="form-control posPrice"></td>'+
                '<td> <input type="number" name="posDiscount[]" class="form-control posDiscount"></td>'+
                '<td> <input type="number" name="posTotal_amount[]" class="form-control totalVal"></td>'+
                '<td> <a class="btn btn-sm btn-danger removebutton rounded-circle"><i class="fa fa-times-circle"></i></a></td>';
                $('.addProduct').append(tr);
    });
//remove a row
    $('.addProduct').delegate('.removebutton', 'click', function(){
        $(this).parent().parent().remove();
    });


    function totalAmount(){
        var total = 0;
        $('.totalVal').each(function(i, e){
            var amount = $(this).val()-0;
            total +=amount;
        });

        $('.total').html(total);
    }

    $('.addProduct').delegate('.product_id', 'change', function(){
        var tr = $(this).parent().parent();
        var price = tr.find('.product_id option:selected').attr('data-price');
        tr.find('.posPrice').val(price);
        var qty = tr.find('.posQuantity').val() - 0;
        var dis = tr.find('.posDiscount').val()-0;
        var price = tr.find('.posPrice').val()-0;
        var total_amount = (qty * price) - ((qty * price * dis) / 100);
        tr.find('.totalVal').val(total_amount);
        totalAmount();


    });

    $('.addProduct').delegate('.posQuantity, .posDiscount', 'keyup', function(){
        var tr = $(this).parent().parent();
        var qty = tr.find('.posQuantity').val() - 0;
        var dis = tr.find('.posDiscount').val()-0;
        var price = tr.find('.posPrice').val()-0;
        var total_amount = (qty * price) - ((qty * price * dis) / 100);
        tr.find('.totalVal').val(total_amount);
        totalAmount();

    });


</script>
@endsection