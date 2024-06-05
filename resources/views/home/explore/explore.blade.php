@extends('layouts.frontend')

@section('content')

<style>
    .hello{
        background: #0dcaf0 !important;
    }
    .menu-design a{
        padding: 10x 10px;
        color:white;
        transition: all linear .3s;
    }
    .menu-design a:hover{
        background: white;
        border-radius: 10px;
    }
</style>
<div style="margin: 30px"; class="row">
    <nav class="navbar navbar-expand-lg bg-body-tertiary hello">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               @foreach ($category as $cat)
                <li class="nav-item  menu-design">
                    <a class="nav-link df" href="{{ route('category.search',$cat->id) }}">{{ $cat->cat_tittle }}</span></a>
                </li>
               @endforeach
            </ul>
           <form action="{{ route('search') }}" method="GET" class="form-inline my-2 my-lg-0">
                @csrf
                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
      </form>
          </div>
        </div>
      </nav>
</div>
<div class="row">
    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
     @foreach ($student_book as $book)
                <div class="col-md-6 col-lg-3">
                        <div class="card m-b-30">
                            <img style="max-width:400px; height:400px;" class="card-img-top img-fluid" src="{{ asset('uploads/book') }}/{{ $book->book_img }}" alt="Card image cap">
                            <div class="card-body">
                                <h2 class="card-title">{{ $book->title }}</h2>
                                <h5 class="card-title">{{ $book->auther_name }}</h5>
                                <p class="card-text">{{ $book->rel_to_category->cat_tittle }}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Current Available : {{ $book->quantity }}</li>
                                <li class="list-group-item">Price : {{ $book->price }}</li>
                            </ul>
                            <div class="card-body">
                                <a style=" text-decoration: underline;" href="#" class="card-link text-underline">View Book Details</a>
                            </br></br>
                                <a class="btn btn-info btn-sm rounded" href="{{ route('borrow.book',$book->id) }}" class="text-custom">Apply To Borrow</a>
                            </div>
                        </div>
                    </div>

                    @endforeach
</div>
@endsection
