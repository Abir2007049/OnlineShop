@extends('layout')

@section('content')

<style>
    /* Background */
    body {
        background-color: #343a40; /* Dark background */
        color: #ffffff; /* White text color */
    }

    /* Navbar */
    .navbar {
        background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
       
    }

    .navbar-nav .nav-link:hover {
        color: #ffc107 !important; /* Yellow text on hover */
    }

    .navbar-nav .active > .nav-link {
        color: #ffc107 !important; /* Yellow text for active link */
    }

    /* Forms */
    form {
        background-color: orange; /* Vibrant purple background */
        padding: 20px; /* Add padding */
        border-radius: 10px; /* Rounded corners */
        margin-bottom: 20px; /* Add space between forms */
    }

    /* Cards */
    .card {
        background-color:#9C00B7; /* Dark blue background for cards */
        color: #ffffff; /* White text color */
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .card:hover {
        transform: translateY(-5px); /* Move card 5px up on hover */
    }
</style>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" style=" color:white" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" style=" color:white" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style=" color:white" href="#contact">Contact</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" style=" color:white" aria-expanded="false">
                        Products
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#male-section">Male</a></li>
                        <li><a class="dropdown-item" href="#female-section">Female</a></li>
                    </ul>
                </li>
            </ul>
            <span class="navbar-text">
                <div class="d-flex align-items-center">
                    @guest
                    <a class="nav-link" href="{{ route('login') }}" style="color:violet">Login</a>
                    <span class="mx-2">|</span>
                    <a class="nav-link" href="{{ route('registration') }}" style="color:violet">Register</a>
                    @else
                    <a class="nav-link" href="{{ route('logout') }}" style="color:red"><b>Logout</a>
                    @endguest
                </div>
            </span>
        </div>
    </div>
</nav>
<div style="align:center; color:orange">
<h1>Naraaz</h1>
</div>

<br><br><br>
@guest
    <p><b>Login to order</b></p>
@else
    <h6>Fill up to order:</h6>
    <form action="{{ route('send.order') }}" method="POST">
        @csrf
        <p>Address:</p><input name="address">
        <p>Email:</p><input name="email">
        <p>Code:</p><input  name="Code" >
        <button type="submit" class="btn btn-primary">Place Order</button>
    </form>
@endguest        

<div id="female-section" class="section">
    <h4>Female Section</h4>
    <div class="row">
        @foreach($femaleProducts as $item)
            <div class="col-md-4">
                <div class="card">
                    <h6>{{$item->Name}}</h6>
                    <img src="{{ asset($item->image) }}" alt="{{ $item->Name }}">
                    <p>Price:{{$item->Price}}</p>
                    <p>Code:{{$item->Code}}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

<br><br><br>

<div id="male-section" class="section">
    <h4>Male Section</h4>
    <div class="row">
        @foreach($products as $item)
            <div class="col-md-4">
                <div class="card">
                    <h6>{{$item->Name}}</h6>
                    <img src="{{ asset($item->image) }}" alt="{{ $item->Name }}">
                    <p>Price:{{$item->Price}}</p>
                    <p>Code:{{$item->Code}}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<div id="about" class="container mt-5" >
    <!-- About section content -->
    <h3>About Us</h3>
    <p>Hello! Discover a new realm of online shopping!<br>
    To make your journey easier we have come to you with NARAAZ, the biggest online market place in Bangladesh!</p>
</div>

<div id="contact" class="container mt-5" style="color:black">
    <!-- Contact section content -->
    <div style="background: aquamarine; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
        <h3 class="text-center"><img src="/.email.png" style="height:80px">Contact Us:</h3>
        <p class="text-center">Email: abirjghs1877@gmail.com</p>
        <p class="text-center">Cell: 01735828046</p>
        <p class="text-center">Address: Lalan Shah Hall, KUET</p>
    </div>
</div>

<!-- Add a link to track the URL -->
<div class="container mt-5">
    <!-- Link to track URL -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <a href="{{ route('home') }}" class="btn btn-primary">Go to home</a>
        </div>
    </div>
</div>

<script>
    // No JavaScript code needed for now
</script>

@endsection
