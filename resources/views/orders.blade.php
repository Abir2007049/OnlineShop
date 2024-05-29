<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
<table class="table table-striped table-bordered">
    <thead class="table-primary">
        <tr>
            <th scope="col">ProductCode</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->ProductCode }}</td>
            <td>{{ $order->Email }}</td>
            <td>{{ $order->Address }}</td>
            <td>
               
                @if($order->delivery !== 'delivered')
                <form action="{{ route('order.delivered', ['id' => $order->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-success">Deliver</button>
                </form>
                @endif
            </td>
            <td>{{ $order->DeliveryStatus }}</td>
            </td>
                <td><form action="{{ route('order.destroy', $order->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
                </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
</body>
</html>

