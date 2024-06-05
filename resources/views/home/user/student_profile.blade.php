@extends('layouts.frontend')
@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div style="background-color:#02c0ce; color:whitesmoke;" class="card-header">
                <h3>update profile information</h3>
            </div>
            <div class="card-body">
                @if(session()->has('message'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
                <form action="{{ route('student.info.update') }}" method="POST">
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
                        <label for="">Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Name" value="{{ Auth::user()->address }}">
                        @error('address')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Phone</label>
                        <input type="text" name="phone" class="form-control" placeholder="Name" value="{{ Auth::user()->phone }}">
                        @error('phone')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea type="text" name="desp" class="form-control">{{ Auth::user()->desp }}</textarea>
                        @error('desp')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Exprience</label>
                        <input type="text" name="exprience" class="form-control" placeholder="exprience" value="{{ Auth::user()->exprience }}">
                        @error('exprience')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Language</label>
                        <input type="text" name="language" class="form-control" placeholder="language" value="{{ Auth::user()->language }}">
                        @error('language')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Session</label>
                        <input type="date" name="session" class="form-control" placeholder="language" value="{{ Auth::user()->session }}">
                        @error('session')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div style="background-color:#02c0ce; color:whitesmoke;" class="card-header">
                <h3>Update Password</h3>
            </div>
            <div class="card-body">
            @if(session('pass_update'))
                        <strong class="alert alert-success">{{session('pass_update')}}</strong>
             @endif
                <form action="{{route('student.pass.update')}}" method="POST">
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
            <div style="background-color:#02c0ce; color:whitesmoke;"  class="card-header">
                <h3>Update Profile Photo</h3>
            </div>
            <div class="card-body">
            @if(session('photo_update'))
                        <strong class="alert alert-success">{{session('photo_update')}}</strong>
                        @endif
                <form action="{{route('student.photo.update')}}" method="POST" enctype="multipart/form-data">
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
