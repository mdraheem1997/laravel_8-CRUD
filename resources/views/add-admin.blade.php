@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Admin') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="admin" method="POST" enctype="multipart/form-data" id="admin-form">
                            @csrf
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="username" id="username" value="{{old('username')}}">
                            @error('username')
                            <span class="text-danger">{{$message}}</span>
                            @enderror <br>
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror <br>
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{old('email')}}">
                            @error('email')
                            <span>{{$message}}</span>
                            @enderror <br>
                            <label for="pwd">Password</label>
                            <input type="password" class="form-control" name="pwd" value="{{old('pwd')}}">
                            @error('pwd')
                            <span class="text-danger">{{$message}}</span>
                            @enderror <br>
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror <br>
                            <button class="btn btn-primary" name="save">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script>
    $(document).ready(function(){
        $('#admin-form').validate({
            rules: {
                    username: "required",
                    name: "required",
                    pwd: {
                        required:true,
                        minlength:5
                    },
                    image: "required",
                    email: "required",
                    
                },
                messages: {
                    username: "Please Fill Username",
                    name: "Please Fill Name",
                    email: "Please Fill Email",
                    pwd: {
                        required:'Please Fill Password',
                        minlength: "Password must be at least 5 characters"
                    },
                    image: "Please Select Image",
                    
                }

        });
    });
</script>
<style>
    label.error {
         color: red;
         font-size: 14px;
    }
</style>
@endsection

