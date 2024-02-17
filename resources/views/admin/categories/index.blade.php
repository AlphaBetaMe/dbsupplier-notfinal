@extends('layouts.admin')
@section('title', 'Manage Categories')
@section('content')
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">Manage Categories</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Manage Categories</li>
          </ol>
        </nav>
      </div>
      <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="GET" id="liveSearchForm">
                        <div class="form-group">
                           
                            <div class="input-group">
                               <input
                        type="text"
                        name="search"
                        value="{{ request()->get('search') }}"
                        class="form-control mr-2"
                        placeholder="Search..."
                        aria-label="Search"
                        aria-describedby="button-addon2"
                        id="searchInput">
                                   <button class="btn btn-success" type="submit" title="Search Permissions" id="button-addon2">
                                       <span class="bi bi-search mr-2"></span>Search
                                   </button>
                                   <button class="btn btn-primary ml-2">
                                    <a href="{{ route('category.index')}}"><span class="bi bi-arrow-repeat text-light"></span></a>
                                   </button>
                            </div>
                        </div>
                       
                    </form>
                </div>
            </div>
            
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Category Lists</h4>
              {{-- <p class="card-description"> Add class <code>.table</code>
              </p> --}}
              <div class="table-responsive text-center">
                <table class="table mb-4">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Popular</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                        <tr>
                            <td><img src="{{asset('assets/uploads/category/'.$category->image)}}" width ="150px"></td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                                @if($category->status == '0')
                                    <span class="badge badge-success" style="font-size: 75%;line-height: 1;padding: 0.2em 0.4em;">Publish</span>
                                @else
                                    <span class="badge badge-danger" style="font-size: 75%;line-height: 1;padding: 0.2em 0.4em;">Not Publish</span>
                                @endif
                            </td>
                            <td>{{$category->popular}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('category.edit', $category->id)}}" class="btn btn-success mr-1" style="border-top-right-radius: 3px; border-bottom-right-radius:3px; width: 90px;"><i class="bi bi-pencil-square"></i>Edit</a>
                                    <form method="post" action="{{route('category.destroy',$category->id)}}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i>Delete</button>
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
                {{ $categories->links() }}
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
</div>

{{-- <script>
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
</script> --}}
@endsection
