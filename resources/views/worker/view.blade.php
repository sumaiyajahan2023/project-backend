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
<nav class="navbar navbar-expand-sm bg-dark">

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link text-light" href="/">Workers</a>
    </li>
  </ul>

</nav>  
    <div class="container">
        <div class="row-justify-content-center">
            <div class="col-sm-12 mt-4">
                <div class="card mt-3 p-3">
                <p><b>Worker Name:</b>{{ $worker->name}}</p>
                <p><b>Worker Email:</b>{{ $worker->email}}</p>
                <p><b>Worker Phone Number:</b>{{ $worker->phn_number}}</p>
                <p><b>Worker Status:</b>{{ $worker->status}}</p>
                </div>            
            </div>
        </div>   
    </div>
</body>
</html>
