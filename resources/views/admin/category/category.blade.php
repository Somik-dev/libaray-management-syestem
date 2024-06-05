@extends('layouts.master')

@section('content')
<div class="row">
<div class="col-lg-8">
    <div class="card">
        <div class="card-header">
            <h3>Category list</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>SL</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
                @foreach ($categories as $sl=>$category )
                    <tr>
                        <td>{{ $categories->firstitem()+$sl }}</td>
                        <td>{{ $category->cat_tittle }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info shadow btn-xs sharp del_btn"><i class="fa fa-pencil"></i></a>
                                &nbsp;
                                <a href="{{ route('category.soft.delete', $category->id) }}" class="btn btn-danger shadow btn-xs sharp del_btn"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $categories->links() }}
            <a href="{{ route('category.trash') }}" class="btn btn-primary" type="submit">Trash list</a>
        </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <h3>Add New Category</h3>
        </div>
        <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
          <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="mb-3">
             <label for="" class="from-lebel">Category Name</label>
             <input type="text" name="cat_tittle" class="form-control">
             @error('cat_tittle')
                 <strong class="text-danger">{{ $message }}</strong>
             @enderror
            </div>
            <div class="mb-3">
            <button type="submit" class="btn btn-primary">Add Category</button>
            </div>
          </form>
        </div>
    </div>
 </div>
</div>
@endsection
