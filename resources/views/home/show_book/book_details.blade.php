@extends('layouts.frontend')
@section('content')

<div class="row">
    @foreach ($student_book as $book)
<div class="col-lg-8 m-auto">
    <div class="card mb-3">
    <img style="max-width:600px; height:400px;"  class="card-img-top" src="{{ asset('uploads/book') }}/{{ $book->book_img }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{ $book->rel_to_category->cat_tittle }}</h5>
          <p>{{ $book->auther_name }}</p>
          <p class="card-text">{!! $book->description !!}</p>
          <p class="card-text"><small class="text-muted">{{ $book->created_at->diffforhumans() }}</small></p>
        </div>
</div>
@endforeach
</div>



@endsection
