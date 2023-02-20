@extends('admin.layouts.main')

@section('title', 'Categories!')


@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Category</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a class="btn btn-sm btn-outline-primary" href="{{ url('admin/categories/create') }}">
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
                    <th scope="col">CreatedAt</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{url('admin/categories/'.$category->id)}}">Show</a>
                        <a class="btn btn-sm btn-secondary" href="{{ url('admin/categories/' . $category->id . '/edit' ) }}">Edit</a>
                        <form class="d-inline" method="POST" action="{{url('admin/categories/'.$category->id)}}">
                        <input type="submit" value="Delete">
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
