@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div style="background-color:#02c0ce; color:whitesmoke;" class="card-header">
                <h3>Edit Book</h3>
            </div>
            <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
              <form action="{{ route('book.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="book_id" value="{{ $book_info->id }}">
                <div class="mb-3">
                 <label for="" class="from-lebel">Book Name</label>
                 <input type="text" name="title" value="{{ $book_info->title }}" class="form-control">
                 @error('title')
                     <strong class="text-danger">{{ $message }}</strong>
                 @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="from-lebel">Athor Name</label>
                    <input type="text" name="auther_name" value="{{ $book_info->auther_name }}" class="form-control">
                    @error('auther_name')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="from-lebel">Description</label>
                    <textarea type="text" name="description" class="form-control" id="summernote">{{ $book_info->description }}</textarea>
                    @error('description')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="" class="from-lebel">Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($data as $category)
                            <option value="{{ $category->id }}" {{ $book_info->category_id == $category->id?'selected':'' }}  >{{ $category->cat_tittle }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                   <div class="mb-3">
                    <label for="" class="from-lebel">Price</label>
                    <input type="number" name="price" value="{{ $book_info->price }}" class="form-control">
                    @error('price')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                   </div>
                   <div class="mb-3">
                    <label for="" class="from-lebel">Quantity</label>
                    <input type="number" name="quantity" value="{{ $book_info->quantity }}" class="form-control">
                    @error('quantity')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                   </div>
                   <div class="mb-3">
                    <label for="" class="from-lebel">Book Image</label>
                    <input  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" type="file" class="form-control" name="book_img">
                    <div class="my-2">
                        <img width="200" id="blah" src="{{ asset('book') }}/{{ $book_info->book_img }}" alt="">
                    </div>
                    @error('book_img')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                   </div>
                <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update Book</button>
                </div>
              </form>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('footer_script')
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
      });
</script>
@endsection
