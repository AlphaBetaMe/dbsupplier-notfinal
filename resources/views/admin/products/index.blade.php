@extends('layouts.sample')
@section('title', 'Manage Services')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title">Services</h4>
                            <a href="{{ route('products.create')}}" class="btn btn-primary text-light">Add Services</a>
                        </div>
                        {{-- <p class="card-description">
                        Payment Details
                        </p> --}}
                        <form method="GET" id="liveSearchForm" class="d-flex align-items-center">
                            <input
                                type="text"
                                name="search"
                                value="{{ request()->get('search') }}"
                                class="form-control mr-2"
                                placeholder="Search..."
                                aria-label="Search"
                                aria-describedby="button-addon2"
                                id="searchInput">
                            <button class="btn btn-success" type="submit" id="button-addon2">Search</button>
                            <a href="{{route('orders.index')}}" class="btn btn-info ml-2">Refresh</a>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                @foreach($products as $product)
                                <tr>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{number_format($product->selling_price, 2, '.', ',')}}</td>
                                    <td>{{$product->discount}}</td>
                                    <td>
                                        @if($product->status == '0')
                                            <span class="badge badge-success">Publish</span>
                                        @else
                                            <span class="badge badge-danger">Not Publish</span>
                                        @endif
                                    </td>
                                    <td><img src="{{asset('assets/uploads/services/'.$product->image)}}" width="200px"></td>
                                    <td>
                                        <a href="{{ route('products.edit', $product->id)}}" class="btn btn-success btn-sm">Edit</a>
                                        <a href="{{ route('products.destroy', $product->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>
<!-- main-panel ends -->

<script>
    $(document).ready(function () {
        $('#searchInput').on('input', function () {
            var searchValue = $(this).val();

            $.ajax({
                url: '{{ route('orders.search') }}',
                type: 'GET',
                data: { search: searchValue },
                success: function (data) {
                    $('#tableBody').html(data);
                }
            });
        });
    });
</script>

@endsection
