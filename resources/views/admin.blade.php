<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        th {
            color: blue;
        }

        td {
            background: aquamarine;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: blue;
            border-color: blue;
        }

        .btn-primary:hover {
            background-color: darkblue;
            border-color: darkblue;
        }

        .card {
            margin-bottom: 20px;
        }

        .card-body {
            padding: 20px;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
        }

        @media (max-width: 768px) {
            .card {
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">ADMIN PANEL</h1>
        <!-- Navigation bars for Male and Female sections -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container-fluid">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#male">Male</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#female">Female</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="row" id="male">
            <!-- Form for adding male products -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Add Male Products</h3>
                        <form action="{{ route('send.product') }}" method="POST" enctype="multipart/form-data"> 
                            @csrf <!-- Add CSRF token for security -->
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price">
                            </div>
                            <div class="form-group">
                                <label for="code">Code</label>
                                <input type="text" class="form-control" id="code" name="code">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="btn-container">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="http://127.0.0.1:8000/see.product">See</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="female">
            <!-- Form for adding female products -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Add Female Products</h3>
                        <form action="{{ route('send.femproduct') }}" method="POST" enctype="multipart/form-data"> 
                            @csrf <!-- Add CSRF token for security -->
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price">
                            </div>
                            <div class="form-group">
                                <label for="code">Code</label>
                                <input type="text" class="form-control" id="code" name="code">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="btn-container">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- The rest of your HTML content -->
        <!-- Form for adding electronic products -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Add Electronic Products</h3>
                        <form action="{{ route('send.eproduct') }}" method="POST" enctype="multipart/form-data"> 
                            @csrf <!-- Add CSRF token for security -->
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price">
                            </div>
                            <div class="form-group">
                                <label for="code">Code</label>
                                <input type="text" class="form-control" id="code" name="code">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="btn-container">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <br><br>
        <h1>User Accounts:</h1>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($us as $user)
                    @if($user->is_admin==0)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
