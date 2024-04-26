<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1>ADMIN PANEL<h1>
    <h3>Add Products:</h3>
    
  
    <form action="{{ route('send.product') }}" method="POST" style="margin: 20px"> 
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
  
    <button type="submit" class="btn btn-primary">Submit</button>
   
</form>



<br><br>
<h1>User Accounts:</h1>
<table class="table" >
  <thead>
    <tr>
      <th scope="col" style="color:blue" ><i>ID</i></th>
      <th scope="col" style="color:red" ><i>Name</i></th>
      <th scope="col" style="color:green" ><i>Email</i></th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($us as $user)
  @if($user->is_admin==0)

    
    <tr >
      <td style="background:aquamarine"><b>{{$user->id}}</td>
      <td style="background:aquamarine"><b>{{$user->name}}</td>
      <td style="background:aquamarine"><b>{{$user->email}}</td>
      
    </tr>
   @endif 
@endforeach

    
  </tbody>
</table>
    

</body>
</html>