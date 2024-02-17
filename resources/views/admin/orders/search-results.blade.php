<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Table</title>
</head>
<body>
    @foreach($orders as $order)
        <tr>
            <!-- Display your order data here as in your main table -->
            <td>{{date('d-m-y', strtotime($order->created_at))}}</td>
            <td>{{$order->fname}} {{$order->lname}}</td>
            <td>{{$order->trackingNumber}}</td>
            <td>{{$order->total_price}}</td>
            <td>{{$order->status}}</td>
            <td>
                <a href="{{url('admin/viewOrder/'.$order->id)}}" class="btn btn-primary"><i class="bi bi-eye"></i></a>
            </td>
        </tr>
    @endforeach
</body>
</html>
