@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Category Section</h2>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{ route('categories.create') }}" class="btn btn-sm btn-outline-secondary">Add New</a>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Thumbnail</th>
                <th>Children</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if(!$categories->isEmpty())
            @foreach($categories as $key => $category)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$category->title}}</td>
                <td>
                    <img src="{{asset('storage/' . $category->thumbnail)}}" alt="Category Thumbnail" height="50px" />
                </td>
                <td>
                    @if (!$category->children->isEmpty())
                    {{$category->children->implode('title', ', ')}}
                    @else
                    <p>No Children category</p>
                    @endif
                </td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{route('categories.show', $category->id)}}" class="btn btn-link">Show</a>
                        <a href="{{route('categories.edit', $category->id)}}" class="btn btn-link">Edit</a>
                        <form action="{{route('categories.destroy', $category->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-link">Delete</a>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr class="text-center">
                <td colspan="7">No Category found.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

@endsection