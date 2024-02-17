@extends('layouts.sample')

@section('content')
<div class="container-fluid">
    <div class="mt-2 py-2">
        <div class="card shadow-sm">
            <div class="card-header">
                POS Transaction
            </div>
            <div class="card-body">
                <div class="table table-responsive">
                    <div class="row">
                        <form method="GET">
                            <div class="input-group py-2 px-2 mb-3 dontPrint">
                                <input
                                    type="text"
                                    name="search"
                                    value="{{ request()->get('search') }}"
                                    class="form-control"
                                    placeholder="Search..."
                                    aria-label="Search"
                                    aria-describedby="button-addon2">
                                <button class="btn btn-success" type="submit" id="button-addon2">Search</button>
                                <a href="{{route('pos.transaction')}}" class="btn btn-info">Refresh</a>
                            </div>
                        </form>
                    </div>
                    <table class="table table-condense table-hover table-bordered">
                        <tr>
                            <th>Transaction/Order ID</th>
                            <th>Products</th>
                            <th>Quantity</th>
                            <th>Product Price</th>
                            <th>Customer Name</th>
                            <!-- <th>Action</th> -->
                        </tr>
                        @foreach($posTrans as $pos)
                        <tr>
                            <td>{{$pos->posOrder_id}}</td>
                            <td>{{$pos->product->name}}</td>
                            <td>{{$pos->posQuantity}}</td>
                            <td>{{$pos->posPrice}}</td>
                            <td>{{$pos->order->customerName}}</td>
                            <!-- <td>
                                {!! Form::open(['method' => 'DELETE','route' => ['pos.destroy', $pos->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td> -->
                        </tr>
                        @endforeach
                    </table>
                    <div class="pagination">
                        {{ $posTrans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection