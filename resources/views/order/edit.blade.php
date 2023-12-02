<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service_crud</title>
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
      <a class="nav-link text-light" href="/service/index">Services</a>
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
                    <h3 class="text-muted">Service Edit #{{$service->title}}</h3>
                    <form method="POST" action="/{{ $service->id }}/update">
                    @csrf
                    @method('PUT')
                    
                    <div class="from-group">
                        <label>Title</label>
                        <input type="text" class="form-control" 
                        id="title" name="title"
                        value="{{ $service->title }}"
                        />
                        @if($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif

                    </div>
                    <div class="from-group">
                        <label>Image</label>
                        <input type="file" class="form-control" 
                        id="image" name="image"
                        value="{{ $service->image  }}"
                        />
                        @if($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <div class="from-group">
                        <label>Status</label>
                        <textarea type="text" class="form-control" row="4" id="status" 
                        name="status">value="{{ $service->status  }}"</textarea>
                        @if($errors->has('status'))
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                        @endif

                    </div>
                    <div class="from-group">
                        <label>Category_Id</label>
                        <input type="number" class="form-control" 
                        id="category_id" name="category_id"
                        value="{{ $service->category_id }}"
                        />
                        @if($errors->has('category_id'))
                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                        @endif

                    </div>
                    
                    <button type="submit" class="btn btn-dark mt-2">Update</button>
                </form>
                </div>
                

            </div>

        </div>
    </div>
</body>
</html>
