@extends('admin.layouts.main')

@section('title', 'Add Cat!')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <h1 class="h2">Add Cat</h1>
        <a class="btn btn-warning" href="{{ url('admin/categories') }}">
            < back</a>
    </div>
    <div class="container card my-3 p-3">
        <form method="post" action="{{ url('admin/categories') }}">
            @csrf
            <div class="form-floating my-3">
                <input class="form-control" id="name" name="name" type="text" placeholder="Name">
                <label for="name">Name</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Save</button>
        </form>
    </div>

@endsection
