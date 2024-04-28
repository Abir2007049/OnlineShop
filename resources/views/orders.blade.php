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
                <th scope="col">ProductId</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $user)
            <tr>
                <td>{{$user->ProductId}}</td>
                <td>{{$user->Email}}</td>
                <td>{{$user->Address}}</td>
                
                
                
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>

