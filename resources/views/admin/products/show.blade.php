@extends('admin.layouts.main')

@section('title', 'Show Product')


@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

    <h1 class="h2">Show Product</h1>
    <a href="{{url('admin/products')}}" class="btn btn-warning">
        < back</a>
</div>
<div class="container card my-3 p-3">
    <div class="form-floating my-3">
        <p for="name">ID</p>
        <p>{{$product->id}}</p>
    </div>
    <div class="form-floating my-3">
        <p for="name">Name</p>
        <p>{{$product->name}}</p>
    </div>
    <div class="form-floating my-3">
        <p for="category">Category</p>
        <p>{{$product->category}}</p>
    </div>
    <div class="form-floating my-3">
        <p for="price">Price</p>
        <p>{{$product->price}}</p>
    </div>
    <div class="form-floating my-3">
        <p for="image">Image</p>
        <img class="img-thumbnail m-1" width="95%" src="{{ url('storage/' . $product->image) }}" alt="{{ $product->name }}">
    </div>
</div>

@endsection
