
@extends('layouts.master')
@section('content')

<div class="row">
<div class="col-lg-12">
<div class="card">
<div style="background-color:#02c0ce; color:whitesmoke;" class="card-header">
<h1>Book List</h1>
</div>
<div class="card-box table-responsive">
    <h4 class="m-t-0 header-title">Default Example</h4>
    <p class="text-muted font-14 m-b-30">
        DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>.
    </p>

    <table id="datatable" class="table table-bordered">
        <thead>
        <tr>
            <th>SL</th>
            <th>Book Title</th>
            <th>Athor Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Book Image</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($book_data as $sl=>$book)
        <tr>
            <td>{{ $sl+1 }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->auther_name }}</td>
            <td>{{ $book->rel_to_category->cat_tittle }}</td>
            <td>{{ $book->price }}</td>
            <td>{{ $book->quantity }}</td>
            <td>
                <img style="width:120px; height=120px;" src="{{ asset('uploads/book') }}/{{ $book->book_img }}" alt="">
            </td>
            <td>
                <div class="d-flex">
                    <a href="{{ route('book.edit',$book->id) }}" class="btn btn-info shadow btn-xs sharp del_btn"><i class="fa fa-pencil"></i></a>
                    &nbsp;
                    <a href="{{ route('book.soft.delete',$book->id) }}" class="btn btn-danger shadow btn-xs sharp del_btn"><i class="fa fa-trash"></i></a>
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
