<!DOCTYPE html>
<html lang="en">
@include('header')
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card-header">
                    <h3>Add Admins</h3>
                </div>
                <div class="card">
                    <div class="card-body">
                        
                        <form action="{{ route('products.update',$product)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{--<input type="hidden" name="hidden_id" value="{{$member['id']}}"> --}}
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="username" value="{{$product['slug']}}">
                            @error('username')
                            <span class="text-danger">{{$message}}</span>
                            @enderror <br>
                            <button class="btn btn-primary" name="save">Submit</button>
                            {{dd()}}
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$member['name']}}">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror <br>
                            <label for="pwd">Password</label>
                            <input type="password" class="form-control" name="pwd" value="{{$member['password']}}">
                            @error('pwd')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <button class="btn btn-primary" name="save">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>
</html>