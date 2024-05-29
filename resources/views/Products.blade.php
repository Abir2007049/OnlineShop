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
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Code</th>
                <th scope="col">image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Products as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->Name}}</td>
                <td>{{$user->Price}}</td>
                <td>{{$user->Code}}</td>
                <td>
                    @if($user->image)
                        <img src="{{  $user->Image }}" style="width:70px; height:70px;">
                    @else
                        <span>No Image</span>
                    @endif
                </td>
                <td><form action="{{ route('products.destroy', $user->id) }}" method="POST" style="display: inline-block;">
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

