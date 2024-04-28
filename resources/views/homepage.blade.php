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

    #contact {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    #contact h3 {
        margin-bottom: 20px;
        color: #343a40; /* Dark gray text */
    }

    #contact p {
        margin-bottom: 10px;
        color: #555;
    }

    #about {
        padding: 20px;
        margin-top: 50px; /* Adjust as needed */
    }

    #about h3 {
        color: #343a40; /* Dark gray text */
    }

    #about p {
        color: #555;
    }

    /* Center the section */
    .section {
        text-align: center;
    }

</style>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Your Brand</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
            </ul>
            <span class="navbar-text">
                <div class="d-flex align-items-center">
                    @guest
                    <a class="nav-link" href="{{ route('login') }}" style="color:violet">Login</a>
                    <span class="mx-2">|</span>
                    <a class="nav-link" href="{{ route('registration') }}" style="color:violet">Register</a>
                    @else
                    <a class="nav-link" href="{{ route('logout') }}" style="color:red">Logout</a>
                    @endguest
                </div>
            </span>
        </div>
    </div>
</nav>

<br><br><br>

<div class="section">
    <h4>Female Section</h4>
    <div>
        @foreach($femaleProducts as $item)
        <div style="border:3px; background=aquamarine">
        <h6>{{$item->Name}}</h6>
        <p>{{$item->Price}}</p>
        <p>{{$item->Code}}</p>
        <!-- Add image display here -->
        <img src="{{ asset($item->image) }}" alt="{{ $item->Name }}" style="height: 150px; width: auto;">
        </div>
        @endforeach
    </div>
</div>

<br><br><br>

<div class="section">
    <h4>Male Section</h4>
    <div>
        @foreach($products as $item)
        <div>
        <h6>{{$item->Name}}</h6>
        <p>{{$item->Price}}</p>
        <p>{{$item->Code}}</p>
        <!-- Add image display here -->
        <img src="{{ asset($item->image) }}" alt="{{ $item->Name }}" style="height: 150px; width: auto;">
        </div>
        @endforeach
        
    </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<div id="about" class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div>
                <h3>About Us</h3>
                <P><b>Hello! Discover a new realm of online shopping!<br>
To make your journey easier we have come to you with NARAAZ,<br>the biggest online market place in Bangladesh!</p>
            </div>
        </div>
    </div>
</div>

<div id="contact" class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div style="background: aquamarine; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
                <h3 class="text-center"><img src="/.email.png" style="height:80px">Contact Us:</h3>
                <p class="text-center">Email: abirjghs1877@gmail.com</p>
                <p class="text-center">Cell: 01735828046</p>
                <p class="text-center">Address: Lalan Shah Hall, KUET</p>
            </div>
        </div>
    </div>
</div>

<!-- Add a link to track the URL -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <a href="{{ route('home') }}" class="btn btn-primary">Track URL</a>
        </div>
    </div>
</div>

@endsection
