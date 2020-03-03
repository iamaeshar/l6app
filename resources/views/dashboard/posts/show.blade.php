@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Show Post Section</h2>
</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Title</th>
                <th>Thumbnail</th>
                <th>Categories</th>
                <th>Slug</th>
                <th>Posted By</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
        </thead>
        <tbody>
            @if($post)
            <tr>
                <td>{{$post->title}}</td>
                <td>
                    <img src="{{asset('storage/' . $post->thumbnail)}}" alt="Category Thumbnail" height="50px" />
                </td>
                <td>{{$post->categories->implode('title', ', ')}}</td>
                <td>{{$post->slug}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->updated_at}}</td>
            </tr>
            @else
            <tr class="text-center">
                <td colspan="7">No Post found.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

@endsection