@extends('layout')

@section('content')
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Branches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <span class="navbar-text">
    <div class="d-flex align-items-center">
      
        @guest
            <a class="nav-link" href="{{ route('login') }}">Login</a>
            <span class="mx-2">|</span> 
            <a class="nav-link" href="{{ route('registration') }}">Register</a>
        @else
            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
        @endguest
    </div>
</span>


            </div>
        </div>
    </nav>
@endsection