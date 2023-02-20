@extends('admin.layouts.main')

@section('title', 'Products')


@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Product</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a class="btn btn-sm btn-outline-primary" href="{{ url('admin/products/create') }}">
                <span class="align-text-bottom" data-feather="plus"></span>
                Add
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">CreatedAt</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{url('admin/products/'.$product->id)}}">Show</a>
                        <a class="btn btn-sm btn-secondary" href="{{ url('admin/products/' . $product->id . '/edit' ) }}">Edit</a>
                        <form class="d-inline" method="POST" action="{{url('admin/products/'.$product->id)}}">
                        <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                        @method('delete')
                        @csrf

                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
