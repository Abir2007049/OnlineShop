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
        <thead class="table-primary">q
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Cell</th>
                </tr>
            </thead>
            <tbody>
                @foreach($acc as $user)
                    @if($user->is_admin==0)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->cell}}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
</head>
<body>
    
</body>
</html>