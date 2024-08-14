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
        <!-- Navigation bars for Male, Female sections and Products dropdown -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container-fluid">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#male">Male</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#female">Female</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Products
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('show.product') }}">Male Products</a></li>
                            <li><a class="dropdown-item" href="{{ route('show.femproduct') }}">Female Products</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Show.Acc') }}">Accounts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('see.order') }}">Orders</a>
                    </li>
                </ul>
                <!-- Logout navigation bar -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <br><br><br>

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
                                <label for="FibreType">FibreType</label>
                                <input type="text" class="form-control" id="FibreType" name="FibreType">
                            </div>
                            <div class="form-group">
                                <label for="Size">Size</label>
                                <input type="text" class="form-control" id="Size" name="Size">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="btn-container">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="#see">See</a>
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
                                <label for="code">Code</label>
                                <input type="text" class="form-control" id="code" name="code">
                            </div>
                           
                            
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price">
                            </div>
                            <div class="form-group">
                                <label for="FibreType">FibreType</label>
                                <input type="text" class="form-control" id="FibreType" name="FibreType">
                            </div>
                            <div class="form-group">
                                <label for="Size">Size</label>
                                <input type="text" class="form-control" id="Size" name="Size">
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

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
