<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>customer_crud</title>
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
      <a class="nav-link text-light" href="{{ route('customer.index') }}">Customers</a>
    </li>
  </ul>

</nav>
    @if($message = Session::get('success'))
    <div class="alert-success alert-block mt-3">
        <strong>{{ $message }}</strong>
    </div>
    @endif
     
    <div class="container">
        <div class="row-justify-content-center">
            <div class="col-sm-12">
                <div class="card mt-3 p-3">
                <form method="POST" action="{{ route('customer.store') }}" enctype="multipart/form-data">
    <!-- Your form fields go here -->


    
                    @csrf

                    <div class="from-group">
                        <label>User_Id</label>
                        <input type="number" class="form-control" 
                        id="user_id" name="user_id"
                        value="{{ old('user_id') }}"
                        />
                        @if($errors->has('user_id'))
                        <span class="text-danger">{{ $errors->first('user_id') }}</span>
                        @endif

                    </div>
                    <div class="from-group">
                        <label>Customer Name</label>
                        <input type="text" class="form-control" 
                        id="name" name="name" placeholder="Enter your name"
                        value="{{ old('name') }}"
                        />
                        @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif

                    </div>

                    <div class="from-group">
                        <label>Address</label>
                        <input type="address" class="form-control" id="address"
                         name="address" placeholder="Enter your address"
                         value="{{ old('address') }}"/>
                        @if($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif

                    </div>
                    
                    <div class="from-group">
                        <label>Email</label>
                        <input type="text" class="form-control" 
                        id="email" name="email" placeholder="Enter worker email"
                        value="{{ old('email') }}"
                        />
                        @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif

                    </div>
                    
                    
                    <div class="from-group">
                        <label>Phone Number</label>
                        <input type="tel" class="form-control" id="phone" 
                        name="phn_number" placeholder="Enter your phone number"
                        value="{{ old('phn_number') }}"
                        />
                        @if($errors->has('phn_number'))
                        <span class="text-danger">{{ $errors->first('phn_number') }}</span>
                        @endif

                    </div>
                    
                    <button type="submit" class="btn btn-dark mt-2">Submit</button>
                </form>
                </div>
                

            </div>

        </div>
    </div>
</body>
</html>