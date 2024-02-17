@extends('layouts.sample')
@section('content')
<div class="mt-2 py-2">
    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif
</div>
<div class="container-fluid mt-3">
    <div class="card shadow">
        <div class="card-body">
            <h3>Stock In</h3>
            <form action="{{route('stocks.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <select name="product_id" class="form-select">
                            @foreach($products as $data)
                                <option value="{{$data->name}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Stock In</label>
                        <input type="number" name="quantity" class="form-control">
                    </div>
                    <div class="col">
                        <label>Remarks</label>
                        <select name="remarks" class="form-select">
                            <option>--Select--</option>
                            <option value="Good Condition">Good Condition</option>
                            <option value="Damage/Dents">Damage/Dents</option>
                        </select>
                      
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
            
<hr>
            <h4>Transaction History</h4>
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
                    <a href="{{ route('stocks.index')}}" class="btn btn-info">Refresh</a>
                </div>
            </form>
            <div class="row">
                <div class="col">
                    <div class="table table-responsive">
                        <table class="table table-condense table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Remarks</th>
                                    <th>Updated by</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stocks as $key => $data)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$data->product_id}}</td>
                                    <td>{{$data->quantity}}</td>
                                    <td>{{$data->remarks}}</td>
                                    <td>{{$data->users->name}} {{$data->users->lname}}</td>
                                    <td>{{$data->created_at}}</td>
                                    <td>
                                    {!! Form::open(['method' => 'DELETE','route' => ['stocks.destroy', $data->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination">
                        {{ $stocks->links() }}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection