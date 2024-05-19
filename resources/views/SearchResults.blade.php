@extends('layout')

@section('content')

<style>
    body {
        background-color: rgb(255, 234, 227);
        color: black;
    }

    /* Navbar */
    .navbar {
        background-color: rgba(0, 0, 0, 0.5);
    }

    .navbar-nav .nav-link:hover {
        color: #ffc107 !important;
    }

    .navbar-nav .active > .nav-link {
        color: #ffc107 !important;
    }

    /* Forms */
    form {
        background-color: rgb(255, 203, 203);
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    /* Cards */
    .card {
        background-color: rgb(18, 20, 129);
        color: #ffffff;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 20px;
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    /* About and Contact Us Sections */
    .section-container {
        background: rgb(255, 177, 177);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s, transform 0.3s;
    }

    .section-container:hover {
        background-color: rgb(255, 150, 150);
        transform: scale(1.02);
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

<div style="text-align:center; color:rgb(18, 20, 129)">
    <h1>বস্ত্রগৃহ</h1>
</div>

<h1>Search</h1>
<form action="{{ route('search.perform') }}" method="POST">
    @csrf
    <input type="text" name="query" placeholder="Enter search term...">
    <button type="submit">Search</button>
</form>

<br><br><br>
@guest
    <p><b>Login to order</b></p>
@else
    <h6>Fill up to order:</h6>
    <form action="{{ route('send.order') }}" method="POST">
        @csrf
        <p>Address:</p><input name="address">
        <p>Email:</p><input name="email">
        <p>Code:</p><input name="Code">
        <button type="submit" class="btn btn-primary">Place Order</button>
    </form>
@endguest        

  

<div id="female-section" class="section">
    <h4>Female Searched products</h4>
    <div class="row">
        @foreach($searchFemProducts as $item)
            <div class="col-md-4">
                <div class="card">
                    <h6>{{$item->Name}}</h6>
                    <img src="{{ asset($item->Image) }}" alt="{{ $item->Name }}">
                    <p>Price:{{$item->Price}}</p>
                    <p>Code:{{$item->Code}}</p>
                </div>
            </div>
        @endforeach
    </div>
</div> 

<br><br><br>

<div id="male-section" class="section">
    <h4>male Searched Products</h4>
    <div class="row">
        @foreach($searchProducts as $item)
            <div class="col-md-4">
                <div class="card">
                    <h6>{{$item->Name}}</h6>
                    <img src="{{ asset($item->Image) }}" alt="{{ $item->Name }}">
                    <p>Price:{{$item->Price}}</p>
                    <p>Code:{{$item->Code}}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<div id="about" class="container mt-5 section-container">
    <h3>About Us</h3>
    <p>Hello! Discover a new realm of online shopping!<br>
    To make your journey easier we have come to you with Bostro Griho, the biggest online market place in Bangladesh!</p>
</div>

<div id="contact" class="container mt-5 section-container">
    <h3 class="text-center"><img src="{{ asset('images/email.png') }}" style="height:80px" alt="Email Icon"> Contact Us:</h3>
    <p class="text-center">Email: abirjghs1877@gmail.com</p>
    <p class="text-center">Cell: 01735828046</p>
    <p class="text-center">Address: Lalan Shah Hall, KUET</p>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <a href="{{ route('home') }}" class="btn btn-primary">Go to home</a>
        </div>
    </div>
</div>
<footer>
    <p>&copy; 2024 Bostro Griho(Abir-49,KUET CSE). All Rights Reserved.</p>
</footer>

<script>
    // Add any additional JavaScript here
</script>

@endsection
