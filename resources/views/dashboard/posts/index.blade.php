@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Posts Section</h2>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{ route('posts.create') }}" class="btn btn-sm btn-outline-secondary">Add New</a>
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
                <th>Categories</th>
                <th>Slug</th>
                <th>Posted By</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if(!$posts->isEmpty())
            @foreach($posts as $key => $post)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$post->title}}</td>
                <td>
                    <img src="{{asset('storage/' . $post->thumbnail)}}" alt="Category Thumbnail" height="50px" />
                </td>
                <td>{{$post->categories->implode('title', ', ')}}</td>
                <td>{{$post->slug}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->updated_at}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{route('posts.show', $post->id)}}" class="btn btn-link">Show</a>

                        @can(['editPost', 'deletePost'], $post->user->id)
                        <a href="{{route('posts.edit', $post->id)}}" class="btn btn-link">Edit</a>
                        <form action="{{route('posts.destroy', $post->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-link">Delete</a>
                        </form>
                        @endcan

                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr class="text-center">
                <td colspan="9">No Posts found.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

@endsection