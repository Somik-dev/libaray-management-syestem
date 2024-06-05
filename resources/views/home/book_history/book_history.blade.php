@extends('layouts.frontend')
@section('content')
<div class="row">
    <div class="col-lg-12">
    <div class="card">
        <div style="background-color:#02c0ce; color:whitesmoke; " class="card-header">
            <h1>Borrow List</h1>
            </div>
    <div class="card-body">
        @if(session()->has('message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
    <table id="datatable" class="table table-bordered">
        <thead>
            <tr>
                <th>SL</th>
                <th>Book Name</th>
                <th>Book Author</th>
                <th>Book Status</th>
                <th>Image</th>
                <th>Cancel Request</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($data as $sl=>$book)
                <tr>
                    <td>{{ $sl+1 }}</td>
                    <td>{{ $book->rel_to_book->title }}</td>
                    <td>{{ $book->rel_to_book->auther_name }}</td>
                    <td>{{ $book->status }}</td>
                    <td>
                        <img style="width:90px; height=100px;" src="{{ asset('uploads/book') }}/{{ $book->rel_to_book->book_img }}" alt="">
                    </td>
                    <td>
                    @if ($book->status == 'Applied')
                    <a class="btn btn-primary btn-sm" href="{{ route('cancel.book',$book->id) }}">Cancel</a>
                    @else
                    <p class="btn btn-primary btn-sm">Not Allowed</p>
                    @endif

                    </td>
                </tr>
                @endforeach
                </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>

@endsection
