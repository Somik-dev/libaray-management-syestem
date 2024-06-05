
@extends('layouts.master')
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
            <th>User Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Book Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Book Image</th>
            <th>Change Status</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($borrow_book as $sl=>$book)
            <tr>
                <td>{{ $sl+1 }}</td>
                <td>{{ $book->rel_to_user->name }}</td>
                <td>{{ $book->rel_to_user->email }}</td>
                <td>{{ $book->rel_to_user->phone }}</td>
                <td>{{ $book->rel_to_book->title }}</td>
                <td>{{ $book->rel_to_book->price }}</td>
                <td>{{ $book->rel_to_book->quantity }}</td>
                <td>
                        @if ($book->status == 'Approved')
                        <button class="btn btn-success btn-sm">{{ $book->status }}</button>
                        @endif
                        @if ($book->status == 'Rejected')
                        <button class="btn btn-danger btn-sm">{{ $book->status }}</button>
                        @endif
                        @if ($book->status == 'Returned')
                        <button class="btn btn-info btn-sm">{{ $book->status }}</button>
                        @endif
                        @if ($book->status == 'Applied')
                        <button class="btn btn-warning btn-sm">{{ $book->status }}</button>
                        @endif
                </td>
                <td>
                    <img style="width:90px; height=100px;" src="{{ asset('uploads/book') }}/{{ $book->rel_to_book->book_img }}" alt="">
                </td>
                <td>
                    <div class="d-flex">
                    <a title="Approved" class="btn btn-success btn-sm" href="{{ route('approve.book',$book->id) }}"><i class="fa fa-check" aria-hidden="true"></i></a>
                    &nbsp;
                    <a title="Reject" class="btn btn-danger btn-sm" href="{{ route('reject.book',$book->id) }}"><i class="fa fa-ban" aria-hidden="true"></i></a>
                    &nbsp;
                    <a title="Return" class="btn btn-info btn-sm" href="{{ route('return.book',$book->id) }}"><i class="fa fa-undo" aria-hidden="true"></i></a>
                </div>
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
