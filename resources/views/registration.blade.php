@extends('layout')
@section('title','registration')
@section('content')
<div class="container">
<form action="{{route('registration.post')}}" method="POST" class="ms-auto me-auto mt-3" style="width: 500px">
  @csrf 
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name">
    
  </div>
  <div class="mb-3">
    <label  class="form-label">Email address</label>
    <input type="email" class="form-control"  name="email">
    
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  <div class="mb-3">
    <label class="form-label">Cell</label>
    <input type="text" class="form-control" name="cell">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection