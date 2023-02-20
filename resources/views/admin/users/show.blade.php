@extends('admin.layouts.main')

@section('title', 'Show User')


@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

    <h1 class="h2">Show User</h1>
    <a href="{{url('admin/user')}}" class="btn btn-warning">
        < back</a>
</div>
<div class="container card my-3 p-3">
    <div class="form-floating my-3">
        <p for="id">ID</p>
        <p>{{$user->id}}</p>
    </div>
    <div class="form-floating my-3">
        <p for="name">Name</p>
        <p>{{$user->name}}</p>
    </div>
    <div class="form-floating my-3">
        <p for="email">Email</p>
        <p>{{$user->email}}</p>
    </div>
    <div class="form-floating my-3">
        <p for="password">Password</p>
        <p>{{$user->password}}</p>
    </div>
</div>

@endsection
