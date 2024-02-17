@extends('layouts.sample')
@section('content')
<div class="container-fluid mt-3">
@if(count($errors) > 0)
        @foreach($errors->all() as $error)
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endforeach
    @endif
    <h4>Returns</h4>
    
    <div class="card mb-3">

        
        <form action="{{route('returns.store')}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <label for="">Product</label>
                        <select name="product_id" class="form-select">
                        @foreach($products as $product)    
                        <option value="{{$product->id}}">{{$product->slug}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">Customer Name</label>
                        <input type="text" name="clientName" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">Quantity</label>
                        <input type="number" name="quantity" class="form-control" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">
                    </div>
                    <div class="col">
                        <label for="">Reason for return:</label>
                        <input type="text" name="reason" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">Price</label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">PHP</span>
                        <input type="text" class="form-control" name="price"  aria-describedby="basic-addon1" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">
                        </div>
                    </div>
                    <div class="col">
                        <label for="">Total Price</label>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">PHP</span>
                        <input type="text" class="form-control" name="totalPrice"  aria-describedby="basic-addon1" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
    <h4>Return List</h4>
    <hr>
    <form method="GET">
            <div class="input-group py-2 px-2 mb-3">
                <input
                    type="text"
                    name="search"
                    value="{{ request()->get('search') }}"
                    class="form-control"
                    placeholder="Search..."
                    aria-label="Search"
                    aria-describedby="button-addon2">
                <button class="btn btn-success" type="submit" id="button-addon2">Search</button>
                <a href="{{ route('returns.index')}}" class="btn btn-info">Refresh</a>
            </div>
            </form>
    <div class="card mt-3">
        <div class="card-body">
            <div class="table table-responsive">
                <table class="table table-condense table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Date</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Reason</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th>Customer Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($returns as $key => $item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->products->slug}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->reason}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->totalPrice}}</td>
                            <td>{{$item->clientName}}</td>
                            <td>
                                {!! Form::open(['method' => 'DELETE','route' => ['returns.destroy', $item->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination">
                        {{ $returns->links() }}
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection