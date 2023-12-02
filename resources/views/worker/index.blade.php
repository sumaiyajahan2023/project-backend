<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker_crud</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark ">

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link text-light" href="/">Workers</a>
      <a class="nav-link text-light" href="/service/index">Services</a>
      <a class="nav-link text-light" href="/service_details/index">Service_Details</a>
      <a class="nav-link text-light" href="/category/index">Categories</a>
      <a class="nav-link text-light" href="{{ route('customer.index')}}">Customers</a>
      
    </li>
  </ul>

</nav>
    @if($message = Session::get('success'))
    <div class="alert-success alert-block mt-3">
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <div class="container">
      <div class="text-right">
        <a href="/worker/create" class="btn btn-dark mt-2">New worker</a>

      </div>
      <table class="table table-hover mt-3">
    <thead>
      <tr>
        <th>Sno.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phn_Number</th>
        <th>Category_ID</th>
        <th>Service_ID</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($workers as $worker)
      <tr>
      <td>{{  $loop->index+1 }}</td>
        <td>{{  $worker->name }}</td>
        <td>{{  $worker->email }}</td>
        <td>{{  $worker->phn_number}}</td>
        <td>{{  $worker->category_id }}</td>
        <td>{{  $worker->service_id}}</td>
        <td>{{  $worker->status }}</td>
        <td>
          <a href="worker/{{ $worker->id}}/edit" class="btn btn-dark btn_sm">Edit</a>
          <a href="worker/{{ $worker->id}}/delete" class="btn btn-danger btn_sm">Delete</a> 
          <a href="worker/{{ $worker->id}}/view" class="btn btn-dark btn_sm">view</a>  

        </td>
      </tr>
    </tbody>
    @endforeach
    </div>
</body>
</html>