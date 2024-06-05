
@extends('layouts.master')

@section('content')

<div class="col-lg-8">
    <div class="card">
        <div class="card-header">
            <h3>Trash list</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>SL</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
                @forelse ($trash_category as $sl=>$category )
                    <tr>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $category->cat_tittle }}</td>
                        <td>
                            <div class="d-flex">
                                <a title="restore" href="{{ route('category.restore', $category->id) }}" class="btn btn-info shadow btn-xs sharp del_btn"><i class="fa fa-reply"></i></a>
                                &nbsp;
                                <a title="Delete" href="{{ route('category.hard.delete', $category->id) }}" class="btn btn-danger shadow btn-xs sharp del_btn"><i class="fa fa-trash"></i></a>
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
    </div>
 </div>

@endsection
