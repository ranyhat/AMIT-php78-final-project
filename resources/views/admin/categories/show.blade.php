@extends('admin.layouts.main')

@section('title', 'Show category!')


@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

    <h1 class="h2">Show Category</h1>
    <a href="{{url('admin/categories')}}" class="btn btn-warning">
        < back</a>
</div>
<div class="container card my-3 p-3">
    <div class="form-floating my-3">
        <p for="name">ID</p>
        <p>{{$category->id}}</p>
    </div>
    <div class="form-floating my-3">
        <p for="name">Name</p>
        <p>{{$category->name}}</p>
    </div>
</div>

@endsection
