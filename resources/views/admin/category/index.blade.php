@extends('layouts.sample')

@section('content')
<style>
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #D2E0FB;
    }
    .btn-primary,
    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary:focus,
    a.btn-primary,
    a.btn-primary:hover,
    a.btn-primary:active,
    a.btn-primary:focus {
        background-color: #000000;
        border-color: #000000;
        color: #fff; /* Set text color to white or any other color that contrasts well with the background */
    }

    .btn-danger,
    .btn-danger:hover,
    .btn-danger:active,
    .btn-danger:focus,
    .a.btn-danger,
    .a.btn-danger:hover,
    .a.btn-danger:active,
    .a.btn-danger:focus {
       background-color: #000000;
        border-color: #000000;
        color: #fff;  /* Set text color to white or any other color that contrasts well with the background */
    }
    
     .btn-success,
    .btn-success:hover,
    .btn-success:active,
    .btn-success:focus,
    .a.btn-success,
    .a.btn-success:hover,
    .a.btn-success:active,
    .a.btn-success:focus {
       background-color: #000000;
        border-color: #000000;
        color: #fff;  /* Set text color to white or any other color that contrasts well with the background */
    }
    
    .btn-info,
    .btn-info:hover,
    .btn-info:active,
    .btn-info:focus,
    .a.btn-info,
    .a.btn-info:hover,
    .a.btn-info:active,
    .a.btn-info:focus {
       background-color: #000000;
        border-color: #000000;
        color: #fff;  /* Set text color to white or any other color that contrasts well with the background */
    }
    .btn-danger,
.btn-danger:hover,
.btn-danger:active,
.btn-danger:focus {
    background-color: #000000;
        border-color: #0000000;
        color: #fff; 
}
</style>
<div class="container-fluid">
    <div class="mt-2 py-2">
        <div class="card shadow-sm">
            <div class="card-header">
                Category List
                <a href="{{route('category.create')}}" class="btn btn-success float-end">Add Category</a>
            </div>
            <form method="GET" id="liveSearchForm">
                <div class="input-group py-2 px-2 mb-3">
                    <input
                        type="text"
                        name="search"
                        value="{{ request()->get('search') }}"
                        class="form-control"
                        placeholder="Search..."
                        aria-label="Search"
                        aria-describedby="button-addon2"
                        id="searchInput">
                    <button class="btn btn-success" type="submit" id="button-addon2">Search</button>
                    <a href="{{ route('category.index')}}" class="btn btn-info">Refresh</a>
                </div>
            </form>
            <div class="card-body">
                <!-- <div class="container-fluid" id="resultContainer">
                    
                </div> -->
                <div class="table table-responsive">
                    <table class="table table-hover table-condense table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Popular</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @forelse($categories as $category)
                            <tr>
                                <td><img src="{{asset('assets/uploads/category/'.$category->image)}}" width ="150px"></td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td>{{$category->description}}</td>
                                <td>
                                    @if($category->status == '0')
                                        <span class="badge badge-success">Publish</span>
                                    @else
                                        <span class="badge badge-danger">Not Publish</span>
                                    @endif
                                </td>
                                <td>{{$category->popular}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('category.edit', $category->id)}}" class="btn btn-danger btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        <form method="post" action="{{route('category.destroy',$category->id)}}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">No record found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#searchInput').on('input', function () {
            var searchValue = $(this).val();

            $.ajax({
                url: '{{ route('category.search') }}',
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