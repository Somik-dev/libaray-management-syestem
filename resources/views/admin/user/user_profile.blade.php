@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div style="background-color:#0acf97; color:whitesmoke;" class="card-header">
                <h3>update profile information</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('user.info.update') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ Auth::user()->name }}">
                        @error('name')
                        <strong class="text-danger">  {{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email Adress" value="{{ Auth::user()->email }}">
                        @error('email')
                       <strong class="text-danger"> {{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div style="background-color:#0acf97; color:whitesmoke;" class="card-header">
                <h3>Update Password</h3>
            </div>
            <div class="card-body">
            @if(session('pass_update'))
                        <strong class="alert alert-success">{{session('pass_update')}}</strong>
                        @endif
                <form action="{{route('user.pass.update')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="">Current password</label>
                        <input type="text" name="current_password" class="form-control" >
                        @error('current_password')
                        <strong class="text-danger">  {{ $message }}</strong>
                        @enderror

                        @if(session('current_pass'))
                        <strong class="text-danger">{{session('current_pass')}}</strong>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="">New password</label>
                        <input type="text" name="password" class="form-control">
                        @error('password')
                        <strong class="text-danger">  {{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Confirm password</label>
                        <input type="text" name="password_confirmation" class="form-control">
                        @error('password_confirmation')
                        <strong class="text-danger">  {{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div style="background-color:#0acf97; color:whitesmoke;"  class="card-header">
                <h3>Update Profile Photo</h3>
            </div>
            <div class="card-body">
            @if(session('photo_update'))
                        <strong class="alert alert-success">{{session('photo_update')}}</strong>
                        @endif
                <form action="{{route('user.photo.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="">Upload Photo</label>
                        <input type="file" name="photo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <span>(min width:200 min hight:300)</span>
                        @error('photo')
                        <strong class="text-danger">  {{ $message }}</strong>
                        @enderror
                        <div>
                            <img width="200" src="" id="blah" alt="">
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
