<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@foreach($products as $product)
    <p>{{$product->name}}</p>
    <p>{{$product->price}}</p>
    <p>{{$product->code}}</p>
@endforeach

</body>
</html>