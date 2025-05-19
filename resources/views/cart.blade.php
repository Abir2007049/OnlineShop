@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Your Cart</h2>

    @if(count($cart) > 0)
        <ul class="list-group">
            @foreach($cart as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $item['Name'] ?? 'Unnamed Item' }} - {{ $item['Code'] ?? 'N/A' }}
                    <span class="badge bg-primary rounded-pill">{{ $item['Price'] ?? 0 }} ৳</span>
                </li>
            @endforeach
        </ul>
    @else
        <p>Your cart is empty.</p>
    @endif

    <div class="mt-3">
        <a href="{{ route('home') }}" class="btn btn-success">Continue Shopping</a>
    </div>
</div>
@endsection
