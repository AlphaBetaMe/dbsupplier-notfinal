<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Table</title>
</head>
<body>

@forelse($categories as $category)

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Description</th>
            <!-- <th>Price</th> -->
            <th>Price</th>
            <th>Discount</th>
            
            <th>Status</th>
            <th>Image</th>
            <th width="200px">Action</th>
        </tr>
    </thead>
    <tbody>
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
    </tbody>
</table>

@empty
    <p>No records found</p>
@endforelse

</body>
</html>
