@extends('layouts.frontend')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group pull-left">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Book</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">

                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
            </h4>
            <ul class="nav nav-pills navtab-bg nav-justified pull-in ">
                <li class="nav-item">
                    <a href="#home1" data-toggle="tab" aria-expanded="false" class="nav-link">
                        <i class="fa fa-book"></i>&nbsp;All Book
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#messages1" data-toggle="tab" aria-expanded="false" class="nav-link">
                        <i class="fa fa-group"></i>&nbsp;Popular
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#settings1" data-toggle="tab" aria-expanded="false" class="nav-link">
                        <i class="fa fa-clock-o"></i>&nbsp;Latest
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane show active" id="home1">
                    <div class="row">
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
                                <a style=" text-decoration: underline;" href="{{ route('book.details',$book->id) }}" class="card-link text-underline">View Book Details</a>
                            </br></br>
                                <a class="btn btn-info btn-sm rounded" href="{{ route('borrow.book',$book->id) }}" class="text-custom">Apply To Borrow</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                </div>
                <div class="tab-pane" id="messages1">
                    <div class="row">
                        @foreach ($popular_books as $book)
                        <div class="col-md-6 col-lg-3">
                                <div class="card m-b-30">
                                    <img style="max-width:400px; height:400px;" class="card-img-top img-fluid" src="{{ asset('uploads/book') }}/{{ $book->rel_to_book->book_img }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h2 class="card-title">{{ $book->rel_to_book->title }}</h2>
                                        <h5 class="card-title">{{ $book->rel_to_book->auther_name }}</h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Current Available : {{ $book->rel_to_book->quantity }}</li>
                                        <li class="list-group-item">Price : {{ $book->rel_to_book->price }}</li>
                                    </ul>
                                    <div class="card-body">
                                        <a style=" text-decoration: underline;" href="{{ route('book.details',$book->rel_to_book->id) }}" class="card-link text-underline">View Book Details</a>
                                    </br></br>
                                        <a class="btn btn-info btn-sm rounded" href="{{ route('borrow.book',$book->rel_to_book->id) }}" class="text-custom">Apply To Borrow</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </div>
                </div>
                <div class="tab-pane" id="settings1">
                    <div class="row">
                        @foreach ($latest_book as $book)
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
                                        <a style=" text-decoration: underline;" href="{{ route('book.details',$book->id) }}" class="card-link text-underline">View Book Details</a>
                                    </br></br>
                                        <a class="btn btn-info btn-sm rounded" href="{{ route('borrow.book',$book->id) }}" class="text-custom">Apply To Borrow</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
