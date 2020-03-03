@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h2 class="h2">Create New Post</h2>
</div>

<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" id="title" name="title" placeholder="Post Title">
	</div>
	<div class="form-group">
		<label for="content">Content</label>
		<textarea rows="5" cols="20" class="form-control" id="content" name="content"
			placeholder="Post Content"></textarea>
	</div>
	<div class="form-group">
		<label for="thumbnail">Thumbnail</label>
		<input type="file" class="form-control form-file-control" id="thumbnail" name="thumbnail" />
	</div>
	<div class="form-group">
		<label for="categories">Categories</label>
		<select class="form-control" name="categories[]" id="categories" multiple>
			<option value="0">Select Post Categories</option>
			@if(!$categories->isEmpty())
			@foreach($categories as $category)
			<option value="{{$category->id}}">{{$category->title}}</option>
			@endforeach
			@endif
		</select>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Add</button>
	</div>
	@endsection