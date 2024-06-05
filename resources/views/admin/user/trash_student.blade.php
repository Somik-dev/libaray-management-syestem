@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div style="background-color:#02c0ce;" class="card-header">
                <h2 style="color:whitesmoke">Trash List</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($users as $sl=>$user)
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('user.restore', $user->id) }}" class="btn btn-info shadow btn-xs sharp"><i class="fa fa-reply"></i></a>
                                <a href="{{ route('user.delete.hard', $user->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
         </div>
    </div>
</div>

@endsection
