<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service_details_crud</title>
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

      <a class="nav-link text-light" href="/service_details/index">Service_Details</a>
      
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
                <form method="POST" action="/service_details/store" enctype="multipart/form-data">
                    @csrf
                    
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
                        <label>Service_name</label>
                        <input type="text" class="form-control" id="service_name" 
                        name="service_name"value="{{ old('service_name') }}"></input>
                        @if($errors->has('service_name'))
                        <span class="text-danger">{{ $errors->first('service_name') }}</span>
                        @endif

                    </div>

                    <div class="from-group">
                        <label>Image</label>
                        <input type="file" class="form-control" 
                        id="image" name="image"
                        value="{{ old('image') }}"
                        />
                        @if($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <div class="from-group">
                        <label>Description</label>
                        <textarea type="text" class="form-control" row="4" id="description" 
                        name="description"value="{{ old('description') }}"></textarea>
                        @if($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif

                    </div>

                    <div class="from-group">
                        <label>Our_plan</label>
                        <textarea type="text" class="form-control" row="4" id="our_plan" 
                        name="our_plan"value="{{ old('our_plan') }}"></textarea>
                        @if($errors->has('our_plan'))
                        <span class="text-danger">{{ $errors->first('our_plan') }}</span>
                        @endif

                    </div>
                    

                    </div>
                    <button type="submit" class="btn btn-dark mt-2">Submit</button>
                </form>
                </div>
                

            </div>

        </div>
    </div>
</body>
</html>