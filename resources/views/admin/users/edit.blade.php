@extends('admin.layouts.main')

@section('title', 'Edit User')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <h1 class="h2">Edit User</h1>
        <a class="btn btn-warning" href="{{ url('admin/users') }}">
            < back</a>
    </div>
    <div class="container card my-3 p-3">
        <form method="post" action="{{ url('home' .$user->id. '/account') }}">
            @csrf
            @method('put')
            <div class="form-floating my-3">
                <input class="form-control" id="name" name="name" type="text" placeholder="Name" value="{{$user->name}}">
                <label for="name">Name</label>
            </div>
            <div class="form-floating my-3">
                <input class="form-control" id="email" name="email" type="text" placeholder="email" value="{{$user->email}}">
                <label for="email">Email</label>
            </div>
            <div class="form-floating my-3">
                <input class="form-control" id="password" name="password" type="text" placeholder="password" value="{{$user->password}}">
                <label for="password">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Save</button>
        </form>
    </div>

@endsection
