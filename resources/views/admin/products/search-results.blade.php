<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services Table</title>
</head>
<body>
@foreach($products as $product)
    <tr>
        <!-- Display your product data here as in your main table -->
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
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ route('products.edit', $product->id)}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                <a href="{{ route('products.destroy', $product->id)}}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
            </div>
        </td>
    </tr>
@endforeach
</body>
</html>
