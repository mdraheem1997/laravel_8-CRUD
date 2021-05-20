@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Admin') }}
                    
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <form action="/edit-admin" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="hidden_id" value="{{$member['id']}}">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="username" value="{{$member['username']}}">
                            @error('username')
                            <span class="text-danger">{{$message}}</span>
                            @enderror <br>
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
    </div>
</div>
@endsection

<?php /* 
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
                        
                        
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>
</html>
*/?>