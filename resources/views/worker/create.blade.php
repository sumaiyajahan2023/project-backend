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
    @if($message = Session::get('success'))
    <div class="alert-success alert-block mt-3">
        <strong>{{ $message }}</strong>
    </div>
    @endif
     
    <div class="container">
        <div class="row-justify-content-center">
            <div class="col-sm-12">
                <div class="card mt-3 p-3">
                <form method="POST" action="/worker/store" enctype="multipart/form-data">
                    @csrf
                    <div class="from-group">
                        <label>Worker Name</label>
                        <input type="text" class="form-control" 
                        id="name" name="name" placeholder="Enter your name"
                        value="{{ old('name') }}"
                        />
                        @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif

                    </div>
                    <div class="from-group">
                        <label>Worker_CV</label>
                        <input type="file" class="form-control" 
                        id="image" name="image"
                        value=""
                        />
                        @if($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
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
                        <label>password</label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="Enter worker password"value="{{ old('password') }}"/>
                        @if($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
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
                    <div class="from-group">
                        <label>Category_Id</label>
                        <input type="number" class="form-control" 
                        id="category_id" name="category_id"
                        value="{{ old('category_id') }}"
                        />
                        @if($errors->has('category_id'))
                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                        @endif

                    </div>
                    <div class="from-group">
                        <label>Service_Id</label>
                        <input type="number" class="form-control" 
                        id="service_id" name="service_id"
                        value="{{ old('service_id') }}"
                        />
                        @if($errors->has('service_id'))
                        <span class="text-danger">{{ $errors->first('service_id') }}</span>
                        @endif

                    </div>
                    <div class="from-group">
                            <label >Status</label>
                            <select name="status" class="form-control" id="status" required>
                                <option value="Attached">Attached</option>
                                <option value="Free">Free</option>
                            </select>
                        </div>
                    <button type="submit" class="btn btn-dark mt-2">Submit</button>
                </form>
                </div>
                

            </div>

        </div>
    </div>
</body>
</html>