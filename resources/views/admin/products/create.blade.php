@extends('admin.layouts.main')

@section('title', 'Add Product')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <h1 class="h2">Add Product</h1>
        <a class="btn btn-warning" href="{{ url('admin/products') }}">
            < back</a>
    </div>
    <div class="container card my-3 p-3">
        <form method="post" action="{{ url('admin/products') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-floating my-3">
                <input class="form-control" id="name" name="name" type="text" placeholder="Name">
                <label for="name">Name</label>
            </div>
            <div class="form-floating my-3">
                <input class="form-control" id="category" name="category" type="text" placeholder="category">
                <label for="category">Category</label>
            </div>
            <div class="form-floating my-3">
                <input class="form-control" id="price" name="price" type="text" placeholder="price">
                <label for="price">Price</label>
            </div>
            <div>
                    Select image to upload:
                    <input type="file" class="form-control" id="image" name="image" aria-label="Image"
                                value="{{ old('image') }}">
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Save</button>
        </form>
    </div>

@endsection
