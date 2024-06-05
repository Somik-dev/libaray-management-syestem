@extends('layouts.master')
@section('content')

<div class="row">
    <div class="col-lg-12">
    <div class="card">
            <div style="background-color:#02c0ce;" class="card-header">
                <h2 style="color:whitesmoke">Student List <span class="float-end">Total:{{ $total_user }}</span></h2>
            </div>
            <div class="card-body">
                <h4 class="header-title">Student List</h4>
                <table id="datatable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $sl=>$user)
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('delete', $user->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-header d-flex justify-content-between">
                <a href="{{ route('trash') }}" class="btn btn-info">Trash list</a>
            </div>
            <!-- end card body-->
        </div> <!-- end card -->
    </div>
</div>

@endsection
