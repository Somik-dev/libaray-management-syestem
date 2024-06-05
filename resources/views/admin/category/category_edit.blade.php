@extends('layouts.master')


@section('content')

<div class="col-lg-10 m-auto">
    <div class="card">
        <div class="card-header">
            <h3>Edit Category</h3>
        </div>
        <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
          <form action="{{ route('category.update') }}" method="POST">
            @csrf
            <div class="mb-3">
            <input type="hidden" name="category_id" value="{{ $category_info->id }}">
             <label for="" class="from-lebel">Category Name</label>
             <input type="text" name="cat_tittle" class="form-control" value="{{ $category_info->cat_tittle }}">
             @error('cat_tittle')
                 <strong class="text-danger">{{ $message }}</strong>
             @enderror
            </div>
            <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update Category</button>
            </div>
          </form>
        </div>
    </div>
</div>

@endsection
