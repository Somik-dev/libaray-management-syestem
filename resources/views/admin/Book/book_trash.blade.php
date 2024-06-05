@extends('layouts.master')
@section('content')
<div class="row">
<div class="col-lg-10">
    <div class="card">
        <div  style="background-color:#02c0ce; color:whitesmoke;"  class="card-header">
            <h3>Trash list</h3>
        </div>
        <form action="" method="POST">
            @csrf
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>SL</th>
                    <th>Book Title</th>
                    <th>Athor Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Book Image</th>
                    <th>Action</th>
                </tr>
                @forelse ($trash_book as $sl=>$book )
                    <tr>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->auther_name }}</td>
                        <td>{{ $book->description }}</td>
                        <td>{{ $book->rel_to_category->cat_tittle }}</td>
                        <td>{{ $book->price }}</td>
                        <td>{{ $book->quantity }}</td>
                        <td><img width="50" src="{{ asset('uploads/book') }}/{{ $book->book_img }}" alt=""></td>
                        <td>
                            <div class="d-flex">
                                <a title="restore" href="{{ route('book.restore', $book->id) }}" class="btn btn-info shadow btn-xs sharp del_btn"><i class="fa fa-reply"></i></a>
                                &nbsp;
                                <a title="Delete" href="{{ route('book.hard.delete', $book->id) }}" class="btn btn-danger shadow btn-xs sharp del_btn"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No trash found</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </form>
    </div>
</div>
</div>
@endsection
