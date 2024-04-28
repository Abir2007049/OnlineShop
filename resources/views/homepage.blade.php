@extends('layout')

@section('content')

<style>
    .navbar {
        background-color: #343a40; /* Dark gray background */
    }

    .navbar-brand,
    .navbar-nav .nav-link {
        color: #ffffff !important; /* White text */
    }

    .navbar-brand:hover,
    .navbar-nav .nav-link:hover {
        color: #ffc107 !important; /* Yellow text on hover */
    }

    .dropdown-menu {
        background-color: #343a40; /* Dark gray background for dropdown menu */
    }

    .dropdown-item {
        color: #ffffff !important; /* White text for dropdown items */
    }

    .dropdown-item:hover {
        background-color: #ffc107 !important; /* Yellow background on hover */
    }

    /* Center the section */
    .section {
        text-align: center;
    }

    /* Custom styles for male and female cards */
    .male-card,
    .female-card {
        transition: transform 0.3s; /* Add transition for smooth movement */
        cursor: pointer; /* Add pointer cursor on hover */
    }

    .male-card:hover,
    .female-card:hover {
        transform: translateY(-5px); /* Move card 5px up on hover */
    }

    .male-card {
        background-color: #007bff; /* Blue background for male cards */
        color: #ffffff; /* White text color */
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .female-card {
        background-color: #ff69b4; /* Pink background for female cards */
        color: #ffffff; /* White text color */
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    /* Adjust image size */
    .card img {
        height: 150px; /* Set height */
        width: 50%; /* Set width to 50% of the card */
        object-fit: cover; /* Maintain aspect ratio */
        margin: auto; /* Center the image horizontally */
        display: block; /* Ensure proper display */
    }

</style>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
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

<br><br><br>

<div id="female-section" class="section">
    <h4>Female Section</h4>
    <div class="row">
        @foreach($femaleProducts as $item)
        <div class="col-md-4">
            <div class="card female-card"> <!-- Added class "female-card" -->
                <h6>{{$item->Name}}</h6>
                <img src="{{ asset($item->image) }}" alt="{{ $item->Name }}">
                <p>Price:{{$item->Price}}</p>
                <p>Code:{{$item->Code}}</p>
                <!-- Adjusted image size -->
                
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
            <div class="card male-card"> <!-- Added class "male-card" -->
                <h6>{{$item->Name}}</h6>
                <img src="{{ asset($item->image) }}" alt="{{ $item->Name }}">
                <p>Price:{{$item->Price}}</p>
                <p>Code:{{$item->Code}}</p>
                <!-- Adjusted image size -->
                
            </div>
        </div>
        @endforeach
    </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<div id="about" class="container mt-5">
    <!-- About section content -->
    <h3>About Us</h3>
    <P><b>Hello! Discover a new realm of online shopping!<br>
    To make your journey easier we have come to you with NARAAZ, the biggest online market place in Bangladesh!</p>
</div>

<div id="contact" class="container mt-5">
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
            <a href="{{ route('home') }}" class="btn btn-primary">Track URL</a>
        </div>
    </div>
</div>

@endsection
