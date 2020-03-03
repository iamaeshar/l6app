@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h2 class="h2">Edit Post</h2>
</div>

<form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" id="title" name="title" placeholder="Post Title"
			value="{{$post->title}}">
	</div>
	<div class="form-group">
		<label for="content">Post Content</label>
		<textarea rows="5" cols="20" class="form-control" id="content" name="content"
			placeholder="Category Content">{!! $post->content !!}</textarea>
	</div>
	<div class="form-group">
		<img src="{{asset('storage/'. $post->thumbnail) }}" alt="Category Thumbnail" height="50" />
		<label for="thumbnail">Thumbnail</label>
		<input type="file" class="form-control form-file-control" id="thumbnail" name="thumbnail" />
	</div>
	<div class="form-group">
		<label for="categories">Categories</label>
		<select class="form-control" name="categories[]" id="categories" multiple>
			<option value="0">Select Post Categories</option>
			@if(!$categories->isEmpty())
			@foreach($categories as $cats)
			<option @if(in_array($cats->id, $post->categories->pluck('id')->toArray())) {{'selected'}} @endif
				value="{{$cats->id}}">{{$cats->title}}
			</option>
			@endforeach
			@endif
		</select>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Update</button>
	</div>
	@endsection